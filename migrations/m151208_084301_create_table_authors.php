<?php

use yii\db\Migration;

class m151208_084301_create_table_authors extends Migration
{
    const TABLE_AUTHORS = 'authors';

    public function up()
    {
        echo 'creating table authors';

        $this->createTable(self::TABLE_AUTHORS, [
            'id' => $this->primaryKey(10),
            'firstname' => $this->string(100)->notNull(),
            'lastname' => $this->string(100)->notNull(),
        ]);
    }

    public function down()
    {
        echo 'dropping table authors';

        $this->dropTable(self::TABLE_AUTHORS);
    }
}
