<?php

use yii\db\Migration;
use yii\db\Expression;

class m160727_140656_images extends Migration
{
    public function safeUp()
    {
        $this->createTable('images', [
            'id'            => $this->primaryKey()->unsigned(),
            'ref_point_id'  => $this->integer()->unsigned()->notNull(),
            'filename'      => $this->string(255)->notNull(),
            'added_date'    => $this->dateTime()->notNull()->defaultValue(new Expression('NOW()')),
        ]);

        $this->createIndex('idx_point_id', 'images', 'ref_point_id');
    }

    public function safeDown()
    {
        $this->dropTable('images');
    }
}
