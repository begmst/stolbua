<?php

use yii\db\Migration;

class m160726_111055_item_materials extends Migration
{
    public function safeUp()
    {
        $this->createTable('point_materials', [
            'id'            => $this->primaryKey()->unsigned(),
            'title'         => $this->string(255),
        ]);

        $this->insert('point_materials', [
            'title' => 'Деревянные опоры',
        ]);
        $this->insert('point_materials', [
            'title' => 'Железобетонные опоры',
        ]);
        $this->insert('point_materials', [
            'title' => 'Металлические опоры',
        ]);

        $this->addColumn('points', 'ref_point_material_id', $this->integer()->notNull()->unsigned()->after('ref_user_id'));
        $this->addForeignKey('fk_point_material_id', 'points', 'ref_point_material_id', 'point_materials', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_point_material_id', 'points');
        $this->dropColumn('points', 'ref_point_material_id');
        $this->dropTable('point_materials');
    }

}
