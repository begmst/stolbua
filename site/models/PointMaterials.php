<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "point_materials".
 *
 * @property integer $id
 * @property string $title
 *
 * @property Points[] $points
 */
class PointMaterials extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'point_materials';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPoints()
    {
        return $this->hasMany(Points::className(), ['ref_point_material_id' => 'id']);
    }
}
