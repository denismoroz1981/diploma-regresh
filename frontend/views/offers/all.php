<?php
/**
 * Created by PhpStorm.
 * User: denismoroz
 * Date: 25.05.18
 * Time: 6:19
 * @var $this yii\web\View
 * @var $dataProvider \yii\data\ActiveDataProvider
 *@var $searchModel common\models\OffersSearch */


use \yii\widgets\ListView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;






?>
<div class="search-form">
    <?php $form = ActiveForm::begin(['method' => 'get']); ?>
    <?= Html::label("Filters:") ?>
    <?= $form->field($searchModel, 'rooms_count') ?>




        <?= Html::submitButton('Apply', ['class' => 'btn btn-success']) ?>


    <?php ActiveForm::end(); ?>
</div>



<div>
        <?php echo ListView::widget([
                'dataProvider' => $dataProvider,
                //'searchModel' => $searchModel,
                'itemView' => '_one',
                ]);
        ?>
</div>
