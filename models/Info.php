<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "datadns".
 *
 * @property integer $id
 * @property integer $IP
 * @property string $MAC
 * @property string $Domain
 * @property integer $so_luong
 * @property integer $Id_donvi
 * @property string $ngay_tonghop
 * @property integer $id_donvi_tonghop
 * @property integer $id_user
 */
class Info extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'datadns';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IP', 'MAC', 'Domain', 'SL', 'Id_Donvi', 'NgayTongHop', 'Id_Dvth'], 'required'],
            [['SL'], 'integer'],
            [['NgayTongHop','Info'], 'safe'],
			[['IP'], 'string', 'max' => 20],
            [['MAC'], 'string', 'max' => 100],
            [['Domain'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'IP' => 'IP',
            'MAC' => 'MAC',
            'Domain' => 'Domain',
            'SL' => 'Số lượng',
			'Info' => ' Thông tin',
            'Id_Donvi' => 'Mã Đơn vị',
            'NgayTongHop' => 'Ngày tổng hợp',
            'Id_Dvth' => 'Mã Đơn vị tổng hợp',
        ];
    }
	
	
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDonvis()
    {
        return $this->hasOne(Donvi::className(), ['id_donvi' => 'Id_Donvi']);
    }
	
	public function getIdDonviths()
    {
        return $this->hasOne(Donvi::className(), ['id_donvi' => 'Id_Dvth']);
    }
}
