<?php

namespace backend\controllers;

use common\models\Offers;
use Yii;

//define("API_KEY","tK5DsVHHZCjHlv81j9LiiQiiUWNryTQ1kmiXc5pZ");

//function for pretty printing of JSON format

class ApiUpload {

    private $path;
    private $params;
    private $button;
    private $items_per_request;
    private $items_per_day;
    private $title;
    private $isCommon;
    private $apiDb = [
        "btn_cat"=>[
            "path"=>"https://developers.ria.com/dom/options?",
            "items_per_request"=>NULL,
            "items_per_day"=>8000,
            "title" =>"Realty categories from DOM.RIA",
            "isCommon"=>true
        ],
        "btn_id"=>[
            "path"=>"https://developers.ria.com/dom/info/",
            "items_per_request"=>1,
            "items_per_day"=>8000,
            "title" =>"Realty categories from DOM.RIA",
            "isCommon"=>false

        ],
        "btn_offer"=>[
            "path"=>"https://developers.ria.com/dom/search?",
            "items_per_request"=>100,
            "items_per_day"=>8000,
            "title" =>"Realty categories from DOM.RIA",
            "isCommon"=>true
        ]
    ];

    public function __construct(array $params)
    {
        $this->params = $params;
        $this->button = $this->params["button"];
        $this->path = $this->apiDb[$this->button]["path"];
        $this->items_per_request = $this->apiDb[$this->button]["items_per_request"];
        $this->items_per_day = $this->apiDb[$this->button]["items_per_day"];
        $this->title = $this->apiDb[$this->button]["title"];
        $this->isCommon = $this->apiDb[$this->button]["isCommon"];
    }



    private function getDataCommon() {

        foreach ($this->params as $k => $v){
            $this->path .="$k"."="."$v"."&";
        }
        $data = json_decode(file_get_contents($this->path),true);
        if (empty($data["count"])) {return ["uploadedlist"=>$data,"title"=>$this->title];}
        if(count($data["items"])>=$data["count"]) {
            return ["uploadedlist" => $data, "title" => $this->title];
        }
        if(count($data["items"])<$data["count"]) {
            $iter = ceil($data["count"]/$this->items_per_request);
            for ($i=1;$i<=$iter;$i++) {
                $path_iter=$this->path.="page=".$i;

            $data_iter = json_decode(file_get_contents($path_iter),true);
            $data = array_push($data["items"],$data_iter["items"]);}
            return ["uploadedlist" => $data, "title" => $this->title];
        }
    }

    public function getData() {
        if ($this->isCommon) { return $this->getDataCommon();}
        if ($this->button == "btn_id") {
            $path = "https://developers.ria.com/dom/info/".print_r($this->params["id"],1).
                "?";
            $data = json_decode(file_get_contents($path),true);
            return $data;
        }
    }



}



class ApiuploadController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
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

        /*


        $get_from_user = $request->get();
        if (!empty($get_from_user["btn_cat"])) {
            $title="Realty categories from DOM.RIA";
            $path = "https://developers.ria.com/dom/options?";
            $ul = new ApiUpload($path,$get_from_user);
            $uploadedlist = $ul->getData();
        }

        if (!empty($get_from_user["btn_id"])) {
            $title="Info for offer with id -".print_r($get_from_user["id"],1)."- from DOM.RIA";
            $path = "https://developers.ria.com/dom/info/".print_r($get_from_user["id"],1).
                "?";
            $ul = new ApiUpload($path,$get_from_user);
            $uploadedlist = $ul->getData();
        }

        if (!empty($get_from_user["btn_offer"])) {
            $title="Realty offer ids from DOM.RIA";
            $path = "https://developers.ria.com/dom/search?";
            $ul = new ApiUpload($path,$get_from_user);
            $uploadedlist = $ul->getData();
        }*/
        $request=Yii::$app->request->get();
        $ul = new ApiUpload($request);
        $uploadedlist=$ul->getData();

        return $this->render('index',
            $uploadedlist);

    }
    public function actionSavetodb() { // save data uploaded from API to DB
        //$offers=Offers::find();
        $model = new Offers();
        //$model->id = 1


    }
}

