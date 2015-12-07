<?php

use yii\db\Schema;
use yii\db\Migration;

class m151207_152604_create_table_books extends Migration
{
    public function up()
    {
        echo 'creating table books';

        $this->createTable('books', [
            'id' => $this->primaryKey(10),
            'name' => $this->string(100)->notNull(),
            'date_create' => $this->dateTime()->notNull(),
            'date_update' => $this->dateTime()->notNull(),
            'date_publish' => $this->dateTime()->notNull(),
            'author_id' => $this->integer(10)->notNull()
        ]);


    }

    public function down()
    {
        echo 'dropping table books';
        $this->dropTable('books');
    }

}
