<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\DatePicker;
use kartik\daterange\DateRangePicker;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use app\components\CustomPagination;
/* @var $this yii\web\View */
/* @var $searchModel app\models\InfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Thông tin DNS Đơn Vị';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	<div class="row">
		 <div class="col-xs-12 col-md-8">
				
		  </div>
		   <div class="col-xs-6 col-md-4">
			 <div style='float:right'>
				<?php $gridColumns = [
							'IP',
							'MAC',
							'Domain',
							'SL',
							'Info',
							'NgayTongHop',
							// [
								// 'attribute'=>'Id_Donvi',
								// 'value'=>'idDonvis.ten_donvi',
							// ],
							// [
								// 'attribute'=>'Id_Dvth',
								// 'value'=>'idDonvis.ten_donvi',
							// ],
					];

					// Renders a export dropdown menu
					echo ExportMenu::widget([
						'dataProvider' => $dataProvider,
						'columns' => $gridColumns,
						'showConfirmAlert' => false
					]);
					?>
			</div>
		  </div>
	</div>
    
	
	
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'IP',
            'MAC',
            'Domain',
            'SL',
			'Info',
			[
				'attribute'=>'Id_Donvi',
				'value'=>'idDonvis.ten_donvi',
				'visible'=> (!Yii::$app->user->isGuest && Yii::$app->user->identity->rules == 0)? true : false,
			],
            
          
			[
			 'attribute'=>'NgayTongHop',
			 'label'=>'Ngày tổng hợp',
			 'format'=>'text',
			 'filter'=> '<div class="drp-container input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>'.
			  DateRangePicker::widget([
				 'name'  => 'InfoSearch[NgayTongHop]',
				 'pluginOptions'=>[ 
						  'locale'=>[
						  'separator'=>'to',
						  ],
				  'opens'=>'right'
					  ] 
				  ]) . '</div>',
			'content'=>function($data){
					   return Yii::$app->formatter->asDatetime($data['NgayTongHop'], "php:d-M-Y");
			   }
			],
			[
				'attribute'=>'Id_Dvth',
				'value'=>'idDonviths.ten_donvi',
				'visible'=> (!Yii::$app->user->isGuest && Yii::$app->user->identity->rules == 0)? true : false,
			],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]); ?>
	
	<div id="custom-pagination">
		<?php
			echo CustomPagination::widget([
				'pagination' => $pages,
			]);
		?>
	</div>
</div>
