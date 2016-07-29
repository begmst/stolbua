<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "points".
 *
 * @property integer $id
 * @property integer $ref_user_id
 * @property integer $ref_organization_id
 * @property integer $ref_point_material_id
 * @property string $title
 * @property string $latitute
 * @property string $longitute
 * @property string $added_date
 *
 * @property Organizations $refOrganization
 * @property PointMaterials $refPointMaterial
 * @property Users $refUser
 */
class Points extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'points';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref_user_id', 'ref_organization_id', 'ref_point_material_id', 'title', 'latitute', 'longitute'], 'required'],
            [['ref_user_id', 'ref_organization_id', 'ref_point_material_id'], 'integer'],
            [['latitute', 'longitute'], 'number'],
            [['added_date'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['ref_organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organizations::className(), 'targetAttribute' => ['ref_organization_id' => 'id']],
            [['ref_point_material_id'], 'exist', 'skipOnError' => true, 'targetClass' => PointMaterials::className(), 'targetAttribute' => ['ref_point_material_id' => 'id']],
            [['ref_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['ref_user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ref_user_id' => 'Ref User ID',
            'ref_organization_id' => 'Ref Organization ID',
            'ref_point_material_id' => 'Ref Point Material ID',
            'title' => 'Title',
            'latitute' => 'Latitute',
            'longitute' => 'Longitute',
            'added_date' => 'Added Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefOrganization()
    {
        return $this->hasOne(Organizations::className(), ['id' => 'ref_organization_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefPointMaterial()
    {
        return $this->hasOne(PointMaterials::className(), ['id' => 'ref_point_material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'ref_user_id']);
    }
}
