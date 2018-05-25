<?php
/**
 * Created by PhpStorm.
 * User: denismoroz
 * Date: 25.05.18
 * Time: 6:19
 * @var $offers common\models\offers
 */




?>


<div class="row">
    <div class="col-lg-12">
        <?php foreach ($offers as $offer) { ?>
            <h3><?= $offer->flats_number." rooms in <i>".$offer->city."</i> for <b>".$offer->price.
                "</b> UAH"?></h3>
            <p><?= $offer->address; ?>
            <?= \yii\bootstrap\Html::a('details',['offers/one','url'=>$offer->id],
                    ['class'=>'btn btn-success']) ?>

            </p>
        <? } ?>
    </div>
