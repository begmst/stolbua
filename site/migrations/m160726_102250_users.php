<?php

use yii\db\Migration;
use yii\db\Expression;

class m160726_102250_users extends Migration
{
    public function safeUp()
    {
        $this->createTable('users', [
            'id'            => $this->primaryKey()->unsigned(),
            'email'         => $this->string(255)->notNull()->unique(),
            'password'      => $this->string(255)->notNull(),
            'added_date'    => $this->dateTime()->notNull()->defaultValue(new Expression('NOW()')),
        ]);

        $this->createIndex('idx_email', 'users', ['email(3)']);
    }

    public function safeDown()
    {
        $this->dropTable('users');
    }

}
