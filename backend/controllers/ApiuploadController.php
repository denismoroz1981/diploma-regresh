<?php

namespace backend\controllers;

use Yii;

define("API_KEY","tK5DsVHHZCjHlv81j9LiiQiiUWNryTQ1kmiXc5pZ");

//function for pretty printing of JSON format




class ApiuploadController extends \yii\web\Controller
{
    public function actionIndex()
    {
        /*    $get_from_user = $_GET;
            $path = "https://developers.ria.com/dom/options?";
            foreach ($get_from_user as $k => $v){
                $path .="$k"."="."$v"."&";


            }
            header('Content-Type: application/json');
            echo prettyPrint(file_get_contents($path));

           */

        return $this->render('index', ["api_key" => API_KEY]);
    }

    public function actionUploadedlist() {



        function toCsv($array) {
            $f = fopen("admin.csv","w");

            foreach ($array["characteristics_values"] as $k => $v) {
                $array["char_".$k] = $v;

            }

            foreach ($array["priceArr"] as $k => $v) {
                $array["price_".$k] = $v;

            }



            fputcsv($f,array_keys($array));
            fputcsv($f,$array);
            fclose($f);

        }

        echo 'Uploaded json from RIA.DOM';

        $request=Yii::$app->request;


        $get_from_user = $request->get();
        if (!empty($get_from_user["btn_cat"])) {
            $title="Realty categories from DOM.RIA";
            $path = "https://developers.ria.com/dom/options?";
        }
        if (!empty($get_from_user["btn_offer"])) {
            $title="Realty offer ids from DOM.RIA";
            $path = "https://developers.ria.com/dom/search?";
        }
        if (!empty($get_from_user["btn_id"])) {
            $title="Info for offer with id -".print_r($get_from_user["id"],1)."- from DOM.RIA";
            $path = "https://developers.ria.com/dom/info/".print_r($get_from_user["id"],1)."?";
        }
        foreach ($get_from_user as $k => $v){
            $path .="$k"."="."$v"."&";


        }

        $uploadedlist = json_decode(file_get_contents($path),true);
        return $this->render('uploadedlist',
            ['uploadedlist'=>$uploadedlist,"title"=>$title]);

    }
}

