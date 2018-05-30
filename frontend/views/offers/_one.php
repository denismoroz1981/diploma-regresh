<?php
/**
 * Created by PhpStorm.
 * User: denismoroz
 * Date: 29.05.18
 * Time: 19:47
 */
?>

<div class="row">
    <div class="col-lg-12">

            <h3><?= $model->flats_number." rooms in <i>".$model->city."</i> for <b>".$model->price.
                "</b> UAH"?></h3>
            <p><?= $model->address; ?>
            <?= \yii\bootstrap\Html::a('details',['offers/one','url'=>$model->id],
                    ['class'=>'btn btn-success']) ?>

            </p>

    </div>