<?php
//
//use yii\httpclient\Client;
//
//$client = new Client();
//$response = $client->createRequest()
//->setMethod('post')
//    ->setUrl('https://api.projectoxford.ai/face/v1.0/detect?returnFaceId=true&subscription-key=58f5d9bbbc2c4e15be44f5d4ce29c0d0')
//    ->addHeaders(['content-type' => 'application/json'])
//    ->setContent('{url:"https://s3-us-west-2.amazonaws.com/fotowebhd/unique_file_name"}')
//    ->send();
//if ($response->isOk) {
//echo $response->content;
//}
//?>

<?php
//
//use yii\httpclient\Client;
//
//$client = new Client();
//$response = $client->createRequest()
//->setMethod('post')
//    ->setUrl('https://api.projectoxford.ai/face/v1.0/verify?subscription-key=58f5d9bbbc2c4e15be44f5d4ce29c0d0')
//    ->addHeaders(['content-type' => 'application/json'])
//    ->setContent('{"faceId1":"d2b4f206-60ce-4c92-86fb-eb194b9547bd",
//    "faceId2":"0f3f011c-6622-487d-9cde-58308b861c9f"
//    }')
//    ->send();
//if ($response->isOk) {
//echo $response->content;
//}
//?>
<?php //use yii\helpers\Url;
//
//echo \yii\helpers\Html::a("prueba",[Url::to('/fotos/logo.png')],['class'=>'btn btn-default']);
//
//?>
<?php
//
//use yii\httpclient\Client;
//
//$client = new Client();
//$response = $client->createRequest()
//->setMethod('post')
//    ->setUrl('https://api.projectoxford.ai/face/v1.0/group?subscription-key=58f5d9bbbc2c4e15be44f5d4ce29c0d0')
//    ->addHeaders(['content-type' => 'application/json'])
//    ->setContent('{"faceIds":[
//        "d56943e0-26c1-495c-8780-c8a74cd661ae",
//        "51819660-9888-4f1e-b90a-03b9c9bf9215",
//        "87ce35dd-86f3-4c3e-b1e0-736d04050261",
//        "381bc369-7910-4c84-b05b-4fe89e998d34",
//        "82edfebd-cf0d-4d30-98d2-27eb617cfd37",
//        "a8b65129-6deb-45b7-867a-46e77a1879bd",
//        "66595d92-6fa1-44fa-aade-c6b79b02413c",
//        "0f3f011c-6622-487d-9cde-58308b861c9f"
//    ]}')
//    ->send();
//if ($response->isOk) {
// print_r(json_decode($response->content));
//}
//?>

<?php

//$json='[
//  {
//    "faceId": "9af33f29-ff1a-4422-925f-dfd0ce0465a3",
//    "faceRectangle": {
//      "top": 155,
//      "left": 477,
//      "width": 232,
//      "height": 232
//    }
//  },
//  {
//    "faceId": "058abffe-3701-4599-8eb2-c30e79a7bca5",
//    "faceRectangle": {
//      "top": 283,
//      "left": 299,
//      "width": 211,
//      "height": 211
//    }
//  },
//  {
//    "faceId": "8c99c2ca-f2e5-4746-99d1-12979b32eca8",
//    "faceRectangle": {
//      "top": 211,
//      "left": 785,
//      "width": 181,
//      "height": 181
//    }
//  },
//  {
//    "faceId": "5e6e6bb2-cf90-44a2-89bf-4f78fe1925f6",
//    "faceRectangle": {
//      "top": 492,
//      "left": 174,
//      "width": 176,
//      "height": 176
//    }
//  }
//]';
//$json2='[
//  {
//      "faceId": "7bbc5016-70c5-41c6-a13e-6e0f4750da48",
//    "faceRectangle": {
//      "top": 161,
//      "left": 226,
//      "width": 212,
//      "height": 212
//    }
//  }
//]';
//$json3='{
//    "error":{
//        "code": "Unspecified",
//        "message": "Access denied due to invalid subscription key. Make sure you are subscribed to an API you are trying to call and provide the right key."
//    }
//}';
//$json4='';
//$Jsos=json_decode($json2,true);
//
//foreach ($Jsos as $js){
//
//    print_r($js["faceId"]);
//}
//echo "<h1>String</h1><br>";
//echo $json2;
////unaSolaCara($Jsos);
//function  unaSolaCara($Jsos)
//{
//    if ($Jsos==null){
//        echo "no hay caras";
//        return;
//    }
//    $i = 0;
//    foreach ($Jsos as $js) {
//        $i++;
//        if ($i > 1) {
//            echo "tiene mas de una cara";
//            return;
//        }
//        if (!isset($js["faceId"])) {
//            echo "error";
//            return;
//        }
//    }
//    echo "una sola cara";
//    return;
//}
//?>
<!---->
<?php
////echo date("Ymd").time();

//?>
