<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Greetings!</h1>

        <p class="lead">You are at the best site with appartments for sale ads!</p>

        <!--<p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">
        Get started with Yii</a></p> -->
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-8">
                <?php for ($i=0;$i<2;$i++)
                { ?>
                <h3><?= $offers[$i]->flats_number." rooms in <i>".$offers[$i]->city."</i> for <b>".
                    $offers[$i]->price.
                    "</b> UAH"?></h3>
                <p><?= $offers[$i]->address; ?></p>
                <? } ?>
                <p><a class="btn btn-lg btn-success" href="offers">
                        see other offers</a></p>
            </div>

            <div class="col-lg-4">
                <h2>Guest book</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
