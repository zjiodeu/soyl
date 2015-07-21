<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books_subcr".
 *
 * @property integer $id
 * @property integer $book_id
 * @property string $fio
 * @property string $email
 * @property string $sing
 * @property string $pay
 */
class BooksSubcr extends \yii\db\ActiveRecord
{
	public $hiddenId;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books_subcr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book_id', 'fio', 'email', 'sing', 'pay', 'hiddenId'], 'required'],
            [['book_id'], 'integer'],
            [['fio', 'email', 'sing', 'pay'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_id' => 'Book ID',
            'fio' => 'Fio',
            'email' => 'Email',
            'sing' => 'Sing',
            'pay' => 'Pay',
        ];
    }
}
