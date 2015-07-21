<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property integer $id
 * @property string $gr
 * @property string $title
 * @property string $content
 * @property string $img_path
 */
class Articles extends \yii\db\ActiveRecord
{

	public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['gr'], 'required'],
            [['gr', 'title', 'content', 'img_path'], 'string'],
			[['file'], 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gr' => 'Категория',
            'title' => 'Название статьи',
            'content' => 'Текст',
            'img_path' => 'Картинка',
            'file' => 'Картинка',
        ];
    }
}
