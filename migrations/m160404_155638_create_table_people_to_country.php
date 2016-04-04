<?php

use yii\db\Schema;
use yii\db\Migration;

class m160404_155638_create_table_people_to_country extends Migration
{
    public function up()
    {
        $this->createTable('people_city',[

        'id' => $this->primaryKey(10),
        'people_id' => $this->integer(10),
        'city_id' => $this->integer(10),
    ]);

        $this->addForeignKey('fk_people_to_people','people_city','people_id','people','id');
        $this->addForeignKey('fk_city_to_city','people_city','city_id','city','id');
    }

    public function down()
    {

        $this->dropTable('people_city');
    }

}
