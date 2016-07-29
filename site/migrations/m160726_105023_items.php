<?php

use yii\db\Migration;
use yii\db\Expression;

class m160726_105023_items extends Migration
{
    public function safeUp()
    {
        $this->createTable('points', [
            'id'            => $this->primaryKey()->unsigned(),
            'ref_user_id'   => $this->integer()->notNull()->unsigned(),
            'title'         => $this->string(255)->notNull(),
            'latitute'      => $this->decimal(10, 6)->notNull(),
            'longitute'     => $this->decimal(10, 6)->notNull(),
            'city'          => $this->string(255)->notNull(),
            'street'        => $this->string(255)->notNull(),
            'house_no'      => $this->integer()->unsigned(),
            'address'       => $this->string(255)->notNull(),
            'added_date'    => $this->dateTime()->notNull()->defaultValue(new Expression('NOW()')),
        ]);

        $this->createIndex('idx_user_id', 'points', 'ref_user_id');
        $this->addForeignKey('fk_user_id', 'points', 'ref_user_id', 'users', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_user_id', 'points');
        $this->dropTable('points');
    }

}
