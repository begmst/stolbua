<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property integer $id
 * @property integer $ref_point_id
 * @property string $filename
 * @property string $added_date
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref_point_id', 'filename'], 'required'],
            [['ref_point_id'], 'integer'],
            [['added_date'], 'safe'],
            [['filename'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ref_point_id' => 'Ref Point ID',
            'filename' => 'Filename',
            'added_date' => 'Added Date',
        ];
    }
}
