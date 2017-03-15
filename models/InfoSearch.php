<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use app\models\Info;

/**
 * InfoSearch represents the model behind the search form about `app\models\Info`.
 */
class InfoSearch extends Info
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'IP', 'SL'], 'integer'],
            [['MAC', 'Domain', 'NgayTongHop' ,'Id_Donvi', 'Id_Dvth','Info'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
	
        $query = Info::find();
		
        // add conditions that should always apply here
		
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

		$query->joinWith('idDonvis');
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'IP' => $this->IP,
            'SL' => $this->SL,
           // 'ngay_tonghop' => $this->ngay_tonghop,
        ]);
		
		if(!empty($this->NgayTongHop) && strpos($this->NgayTongHop, 'to') !== false) {
			list($start_date, $end_date) = explode('to', $this->NgayTongHop); 
			$query->andFilterWhere(['between', 'datadns.NgayTongHop', $start_date,$end_date]); 
		}
		
        $query->andFilterWhere(['like', 'MAC', $this->MAC])
            ->andFilterWhere(['like', 'Domain', $this->Domain])
			->andFilterWhere(['like', 'Info', $this->Info])
			->andFilterWhere(['like', 'tbl_donvi.ten_donvi', $this->Id_Donvi])
			->andFilterWhere(['like', 'tbl_donvi.ten_donvi', $this->Id_Dvth]);
		if(Yii::$app->user->identity->rules != 0){
			$crIddv = Yii::$app->user->identity->id_donvi;	
			$query->andFilterWhere(['like', 'datadns.Id_Donvi', $crIddv]);
		}
		$countQuery = clone $query;
		$pages = new Pagination(['totalCount' => $countQuery->count()]);
		$data = array(
			'dataProvider'=> $dataProvider,
			'pages' => $pages
		);
        return $data;
    }
}
