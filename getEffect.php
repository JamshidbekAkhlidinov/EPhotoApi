<?php

use jamshidbekakhlidinov\EPhoto360;

require_once 'vendor/autoload.php';

if(isset($_GET['code'])){
    $data = EPhoto360::getEffect($_GET['code']);
    print_r(json_encode($data));
}else{
    $result = [
        'message'=>'Error page',
        'admin'=>'http://t.me/JamshidbekAkhlidinov'
     ];
    print_r(json_encode($result));
}



?>