<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "auth_role_auth".
 *角色权限表
 * @property integer $id
 * @property integer $role_id
 * @property integer $auth_id
 */
class AuthRoleAuth extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_role_auth';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id', 'auth_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Role ID',
            'auth_id' => 'Auth ID',
        ];
    }
}
