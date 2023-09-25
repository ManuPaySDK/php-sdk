<?php


require_once("Md5Signature.php");


$param = [
    "firstname"=> "cy",
    "lastname"=> "harper",
    "city"=>      "guangzhou",
    "phone"=>     "4401000001",
    "email"=>     "ck789@gmail.com",
    "country"=>   "IN",
    "address"=>   "foshan district",
    "state"=>     "mh",
    "postcode"=>  "232001",
];

//这样指定namespace
$md5Signature= new \ManuPaySDK\PhpSDK\Utils\Md5Signature('odgiudguidguiygd');


//生成sign
$sign = $md5Signature->generate($param);
printf("%s\n",$sign);


//验证sign
if(!$md5Signature->verify($param, $sign)){
    $res =  $md5Signature->getErrorMessage();
    //echo($res);
}