<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partners".
 *
 * @property integer $id
 * @property string $name
 * @property string $tel
 * @property string $age
 * @property string $email
 * @property string $skype
 * @property string $city
 * @property string $work
 */
class Partners extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partners';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'tel', 'age', 'city', 'work'], 'required', 'message' => '{attribute}'],
            [['name', 'tel', 'age', 'email', 'skype', 'city', 'work'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'tel' => 'Телефон',
            'age' => 'Возраст',
            'email' => 'Email',
            'skype' => 'Skype',
            'city' => 'Город',
            'work' => 'Сфера работы',
        ];
    }
}
