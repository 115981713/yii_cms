<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article_tags".
 *
 * @property integer $id
 * @property string $tag_name
 * @property integer $post_num
 */
class ArticleTags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_num'], 'integer'],
            [['tag_name'], 'string', 'max' => 255],
            [['tag_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag_name' => '标签名称',
            'post_num' => '文章数量',
        ];
    }
}
