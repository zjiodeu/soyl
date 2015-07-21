<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property integer $id
 * @property integer $isactive
 * @property string $date
 * @property string $subject
 * @property string $name
 * @property string $photo_path
 * @property string $video
 * @property string $text
 */
class Reviews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['isactive', 'dt', 'subject', 'name', 'text'], 'required'],
            [['isactive'], 'integer'],
            [['dt'], 'safe'],
            [['subject', 'name', 'photo_path', 'video', 'text'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'isactive' => 'Isactive',
            'dt' => 'Date',
            'subject' => 'Subject',
            'name' => 'Name',
            'photo_path' => 'Photo Path',
            'video' => 'Video',
            'text' => 'Text',
        ];
    }
}
