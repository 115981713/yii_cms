<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "auth".
 *权限表
 * @property integer $id
 * @property string $auth
 * @property string $auth_name
 * @property integer $pid
 * @property integer $sort
 */
class Auth extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'sort'], 'integer'],
            [['auth', 'auth_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'auth' => 'Auth',
            'auth_name' => 'Auth Name',
            'pid' => 'Pid',
            'sort' => 'Sort',
        ];
    }
}
