<?php
namespace frontend\controllers;

use common\models\Offers;
use Yii;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


/**
 * Site controller
 */
class OffersController extends Controller
{
    public function actionIndex()
    {
        $offers=Offers::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $offers,
            'pagination' => [
                'pageSize'=> 10,
                //'defaultPageSize'=> 10,
            ],
            'sort'=> [
                'defaultOrder'=>[
                    'rooms_count'=>SORT_DESC
                ]
            ],

        ]);

        return $this->render('all',['dataProvider'=>$dataProvider]);
    }

    public function actionOne($url)
    {
        if ($offers=Offers::find()->andWhere(['admin_id'=>$url])->one()) {
        return $this->render('one',['offers'=>$offers]);}
        throw new NotFoundHttpException("Ups, no such offer!");
    }

}