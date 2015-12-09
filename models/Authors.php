<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 08.12.15
 * Time: 13:23
 */

namespace app\models;

use yii\db\ActiveRecord;

class Authors extends ActiveRecord {

    public static function tableName()
    {
        return 'authors';
    }
    public function rules()
    {
        return [
            [['na', 'lastname'], 'required'],
            [['firstname', 'lastname'], 'string', 'max' => 100]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'firstname' => 'Имя',
            'lastname' => 'Фамилия',
        ];
    }

    public function getBooks()
    {
        return $this->hasMany(Books::className(), ['author_id' => 'id']);
    }


}