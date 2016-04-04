<?php

use yii\db\Schema;
use yii\db\Migration;

class m160404_155236_create_tablepeople extends Migration
{
    public function up()
    {

        $this->createTable('people',[

            'id' => $this->primaryKey(10),
            'name' => $this->string(100)->notNull(),
        ]);

        $this->createTable('city', [
            'id' => $this->primaryKey(10),
            'name' => $this->string(100)->notNull(),
        ]);
    }

    public function down()
    {

        $this->dropTable('people');
        $this->dropTable('city');
        return true;
    }


}
