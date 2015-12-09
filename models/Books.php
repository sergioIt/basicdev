<?php

namespace app\models;
use yii\db\ActiveRecord;

//use Yii;

/**
 * This is the model class for table "books".
 *
 * @property integer $id
 * @property string $name
 * @property string $date_create
 * @property string $date_update
 * @property string $date_publish
 * @property integer $author_id
 *
 * @property Authors $author
 */
class Books extends ActiveRecord
{
/*    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }*/

    public function relations()
    {
        return array(
            /*'author' => array(self::BELONGS_TO, 'WeldingRoad', 'road_id'),
            'team' => array(self::BELONGS_TO, 'WeldingTeam', 'team_id'),
            'user' => array(self::HAS_MANY, 'WeldingWeldUser', 'weld_id'),*/
        );

    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

    public function validate()
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'date_publish', 'author_id'], 'required'],
            //[['date_create', 'date_update', 'date_publish'], 'safe'],
            //[['author_id'], 'integer'],
            [['name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'date_create' => 'Добавлено',
            'date_update' => 'Обновлено',
            'date_publish' => 'Дата публикации',
            'author_id' => 'Автор',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Authors::className(), ['id' => 'author_id']);
    }


}