<?php

use yii\db\Schema;
use yii\db\Migration;

class m151208_091254_add_fk_books_to_authors extends Migration
{
    public function up()
    {
        $this->addForeignKey('books_to_authors', 'books', 'author_id', 'authors', 'id',
            'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropForeignKey('books_to_authors','books');
    }

}
