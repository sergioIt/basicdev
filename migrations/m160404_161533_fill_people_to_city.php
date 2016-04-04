<?php

use yii\db\Schema;
use yii\db\Migration;
use yii\db\Query;

class m160404_161533_fill_people_to_city extends Migration
{
    public function up()
    {

        $people_to_city = [

            'Маша'=> [1,2],
            'Ваня' => [1,2,3,4,5],
            'Оля'=> [4,5],
            'Женя'=> [2,3],
            'Вася'=> [],
            'Коля' => [6],
            'Олег' => [3],
        ];


        foreach($people_to_city as $name=>$cities){

            $query = new Query;
// compose the query
            $query->select('id')
                ->from('people');
            $query->andFilterWhere(     ['like', 'name', $name]);


            $row = $query->one();

            var_dump($row);

            if(! empty( $cities)){

                foreach($cities as $cityId){
                    $this->insert('people_city',['people_id' => $row['id'], 'city_id' => $cityId]);

                }
            }


        }
    }

    public function down()
    {

        return true;
    }


}
