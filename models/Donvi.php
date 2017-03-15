<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_donvi".
 *
 * @property integer $id_donvi
 * @property string $ten_donvi
 */
class Donvi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_donvi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten_donvi'], 'required'],
            [['ten_donvi'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_donvi' => 'Id đơn vị',
            'ten_donvi' => 'Tên đơn vị',
        ];
    }
	
	/**
     * @return \yii\db\ActiveQuery
     */
    public function getInfo()
    {
        return $this->hasOne(Info::className(), ['Id_Donvi' => 'id_donvi']);
    }
}
