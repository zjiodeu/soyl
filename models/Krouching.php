<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "krouching".
 *
 * @property integer $id
 * @property string $fio
 * @property string $email
 * @property string $tel
 * @property string $goal
 */
class Krouching extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'krouching';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fio', 'email', 'tel', 'goal'], 'required'],
            [['fio', 'email', 'tel', 'goal'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'Fio',
            'email' => 'Email',
            'tel' => 'Tel',
            'goal' => 'Goal',
        ];
    }
}
