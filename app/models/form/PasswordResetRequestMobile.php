<?php
namespace app\models\form;

use Yii;
use yii\easyii\modules\rbac\models\User;
use yii\easyii\models\Setting;
use yii\base\Model;

/**
 * Password reset request form
 */
class PasswordResetRequestMobile extends Model
{
    public $mobile;
    public $smscode;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['mobile', 'filter', 'filter' => 'trim'],
            ['mobile', 'required'],
            ['mobile','match','pattern'=>'/^1[0-9]{10}$/','message'=>'{attribute}必须为1开头的11位纯数字'],
            ['mobile', 'exist',
                'targetClass' => 'yii\easyii\modules\rbac\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'There is no user with such mobile.'
            ],

            ['smscode', 'required'],
            ['smscode','integer','max' => 999999],
            ['smscode', 'yii\easyii\helpers\SMSValidator'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'mobile' => '手机号',
            'smscode' => '验证码',
        ];
    }

    public function setToken()
    {
        /* @var $user User */
        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'mobile' => $this->mobile,
        ]);

        if ($user) {
            if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
                $user->generatePasswordResetToken();
            }

            if($user->save()){
                return $user;
            }
        }

        return null;
    }
}
