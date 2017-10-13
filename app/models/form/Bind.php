<?php
namespace app\models\form;

use Yii;
use yii\easyii\modules\rbac\models\User;
use yii\easyii\modules\rbac\models\Assignment;
use yii\easyii\helpers\SMSValidator;
use yii\easyii\helpers\Mail;
use yii\base\Model;
use yii\easyii\models\Setting;
use yii\helpers\Url;

/**
 * Bind form
 */
class Bind extends Model
{
    public $mobile;
    public $smscode;
    public $email;
    public $name;
    public $sex;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['mobile', 'filter', 'filter' => 'trim'],
            ['mobile', 'required'],
            //['username', 'string', 'min' => 2, 'max' => 255],
            ['mobile', 'string', 'min' => 11, 'max' => 11],
            ['mobile','match','pattern'=>'/^1[0-9]{10}$/','message'=>'{attribute}必须为1开头的11位纯数字'],

            ['smscode', 'required'],
            ['smscode','integer','max' => 999999],
            ['smscode', SMSValidator::className()],
            
            ['name', 'filter', 'filter' => 'trim'],
            [['name','sex'], 'required'],

            //['email', 'filter', 'filter' => 'trim'],
            //['email', 'required'],
            //['email', 'email'],
            //['email', 'unique', 'targetClass' => 'yii\easyii\modules\rbac\models\User', 'message' => 'This email address has already been taken.'],

            //['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function attributeLabels()
    {
        return [
            'mobile' => '手机号',
            'smscode' => '验证码',
            'name' => '姓名',
            'sex' => '性别',
            'email' => 'Email',
            'password' => '密码',
        ];
    }

    public function bind($openid,$access_token,$refresh_token,$headimgurl='')
    {
        if ($this->validate()) {
            $user_check = User::find()->where(['mobile'=>$this->mobile])->one();
            if ($user_check){
                $user_check->openid = $openid;
                $user_check->access_token = $access_token;
                $user_check->refresh_token = $refresh_token;
                $user_check->image = $headimgurl;
                $user_check->update();

                return $user_check;
            }
            else{
                $user = new User();
                $user->username = $this->mobile;
                $user->mobile = $this->mobile;
                $user->name = $this->name;
                $user->sex = $this->sex;
                $user->openid = $openid;
                $user->access_token = $access_token;
                $user->refresh_token = $refresh_token;
                $user->image = $headimgurl;
                $user->setPassword($this->password || $this->smscode);
                $user->generateAuthKey();
                if ($user->save()) {
                    $model = new Assignment($user->id);
                    $success = $model->assign(['user']);
    
                    self::mailAdmin($user);
    
                    return $user;
                }
            }
        }

        return null;
    }

    public function mailAdmin($user)
    {
        return Mail::send(
            Setting::get('admin_email'),
            '新用户注册',
            '@app/mail/newReg',
            ['user' => $user, 'link' => Url::to(['/admin/'], true)]
        );
    }

    public function formatErrors()
    {
        $result = '';
        foreach($this->getErrors() as $attribute => $errors) {
            $result .= implode(" ", $errors)."\n";
        }
        return $result;
    }
}
