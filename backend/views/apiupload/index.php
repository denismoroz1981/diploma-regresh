<?php
/* @var $this yii\web\View */
//use \yii\widgets\ActiveForm;
use yii\helpers\Html;

?>
<h1>DOM.RIA API upload page</h1>

<p><b>developer's api_key:</b> <i><?= print_r($api_key) ?></i></p>

<?php

$api_key_updated = $api_key; // dev's API
$category=1; // Квартиры (Flats)
$realty_type=2; // Квартира (Flat)
$operation_type=1; //Продажа (Sales)
$state_id=10; //Kiev region
$city_id=10; //Kiev
$id = 11111111;
//$city='kiev';


echo Html::beginForm('uploadedlist','get',[]);
echo Html::label('api_key:');
echo Html::input('text','api_key',$api_key_updated,['size'=>40]);
echo '<br>';
echo '<br>';
echo Html::label('category:');
echo Html::input('text','category',$category,['size'=>2]);
echo Html::label('realty type:');
echo Html::input('text','realty_type',$realty_type,['size'=>2]);
echo Html::label('operation type:');
echo Html::input('text','operation_type',$operation_type,['size'=>2]);
echo '<br>';
echo Html::submitButton('Show offer\'s categories',['name'=>'btn_cat','value'=>'categories']);
echo '<br>';
echo '<br>';
echo Html::label('state id:');
echo Html::input('text','state_id',$state_id,['size'=>2]);
echo Html::label('city id:');
echo Html::input('text','city_id',$city_id,['size'=>2]);
echo '<br>';
echo Html::submitButton('Upload offers',['name'=>'btn_offer','value'=>'offers']);
echo '<br>';
echo '<br>';
echo Html::label('offer id:');
echo Html::input('text','id',$id,['size'=>10]);
echo '<br>';
echo Html::submitButton('Info by id',['name'=>'btn_id','value'=>'id']);
echo Html::endForm();

?>