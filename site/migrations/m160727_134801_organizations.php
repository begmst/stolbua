<?php

use yii\db\Migration;

class m160727_134801_organizations extends Migration
{
    public function safeUp()
    {
        $this->createTable('organizations', [
            'id'            => $this->primaryKey()->unsigned(),
            'title'         => $this->string(255),
        ]);

        $this->addColumn('points', 'ref_organization_id', $this->integer()->notNull()->unsigned()->after('ref_user_id'));
        $this->addForeignKey('fk_organization_id', 'points', 'ref_organization_id', 'organizations', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_organization_id', 'points');
        $this->dropColumn('points', 'ref_organization_id');
        $this->dropTable('organizations');
    }
}
