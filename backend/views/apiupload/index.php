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
//$city='kiev';


echo Html::beginForm('apiupload/uploadedlist','get',[]);

echo Html::input('text','api_key',$api_key_updated,['size'=>40]);
echo '<br>';
echo Html::input('text','category',$category,['size'=>2]);
echo '<br>';
echo Html::input('text','realty_type',$realty_type,['size'=>2]);
echo '<br>';
echo Html::input('text','operation_type',$operation_type,['size'=>2]);
echo Html::input('text','state_id',$state_id,['size'=>2]);
echo Html::input('text','city_id',$city_id,['size'=>2]);
echo '<br>';

echo Html::submitButton('Show categories');

echo Html::endForm();

?>