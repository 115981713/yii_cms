<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email_validate_token
 * @property string $email
 * @property integer $role
 * @property integer $status
 * @property string $avatar
 * @property integer $vip_lv
 * @property integer $created_at
 * @property integer $updated_at
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username',  'email'], 'required'],
            ['email','email'],
            [['role', 'status', 'vip_lv', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email_validate_token', 'email', 'avatar'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '管理员名称',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email_validate_token' => 'Email Validate Token',
            'email' => 'Email',
            'role' => '角色',
            'status' => '状态',
            'avatar' => '头像',
            'vip_lv' => 'Vip 等级',
            'created_at' => '新建时间',
            'updated_at' => '编辑时间',
        ];
    }
}
