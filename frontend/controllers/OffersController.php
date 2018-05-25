<?php
namespace frontend\controllers;

use common\models\Offers;
use Yii;

use yii\web\Controller;
use yii\web\NotFoundHttpException;


/**
 * Site controller
 */
class OffersController extends Controller
{
    public function actionIndex()
    {
        $offers=Offers::find()->all();
        return $this->render('all',['offers'=>$offers]);
    }

    public function actionOne($url)
    {
        if ($offers=Offers::find()->andWhere(['id'=>$url])->one()) {
        return $this->render('one',['offers'=>$offers]);}
        throw new NotFoundHttpException("Ups, no such offer!");
    }

}