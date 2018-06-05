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

            <h3><?= $model->rooms_count." rooms in <i>".$model->city_name."</i> for <b>".$model->price.
                "</b> UAH"?></h3>
            <p><?= $model->street_name; ?>
            <?= \yii\bootstrap\Html::a('details',['offers/one','url'=>$model->admin_id],
                    ['class'=>'btn btn-success']) ?>

            </p>

    </div>