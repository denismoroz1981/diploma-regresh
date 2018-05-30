<?php
/**
 * Created by PhpStorm.
 * User: denismoroz
 * Date: 25.05.18
 * Time: 6:19
 * @var $this yii\web\View
 * @var $dataProvider \yii\data\ActiveDataProvider
 */

use \yii\widgets\ListView;
$offers1 = $dataProvider->getModels();



?>

<div>
        <?php echo ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_one',
                ]);
        ?>
</div>
