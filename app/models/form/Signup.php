<?php
namespace app\models\form;

use Yii;
use yii\easyii\modules\rbac\models\User;
use yii\easyii\modules\rbac\models\Assignment;
use yii\easyii\helpers\SMSValidator;
use yii\base\Model;

/**
 * Signup form
 */
class Signup extends Model
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
            ['mobile', 'unique', 'targetClass' => 'yii\easyii\modules\rbac\models\User', 'message' => '该手机号已经被使用。'],
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

            ['password', 'required'],
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

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->mobile;
            $user->mobile = $this->mobile;
            $user->name = $this->name;
            $user->sex = $this->sex;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                $model = new Assignment($user->id);
                $success = $model->assign(['user']);

                return $user;
            }
        }

        return null;
    }
}
