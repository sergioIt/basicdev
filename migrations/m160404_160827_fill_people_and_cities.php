<?php

use yii\db\Schema;
use yii\db\Migration;

class m160404_160827_fill_people_and_cities extends Migration
{
    public function up()
    {
        $people = [
            'Маша',
            'Ваня',
            'Оля',
            'Женя',
            'Вася',
            'Коля',
            'Олег',

        ];

        $city = [
            'Петербург',
            'Сочи',
            'Москва',
            'Красноярск',
            'Budapest',
            'Roma',
            'Элиста',
        ];


        foreach($people as $name){

            $this->insert('people',['name'=>$name]);
        }

     foreach($city as $name){

            $this->insert('city',['name'=>$name]);
        }


    }

    public function down()
    {

        $this->delete('people');
        $this->delete('city');
    }

}
