<?php

use yii\db\Schema;
use yii\db\Migration;

class m151208_093749_fill_table_authors extends Migration
{
    const TABLE = 'authors';

    public function up()
    {
        $this->insert(self::TABLE,['firstname' => 'David', 'lastname' =>'Endrew']);
        $this->insert(self::TABLE,['firstname' => 'Willaim', 'lastname' =>'Styron']);
        $this->insert(self::TABLE,['firstname' => 'Robert', 'lastname' =>'Shekley']);
        $this->insert(self::TABLE,['firstname' => 'Stephen', 'lastname' =>'King']);
    }

    public function down()
    {
        $this->delete(self::TABLE);
    }
}
