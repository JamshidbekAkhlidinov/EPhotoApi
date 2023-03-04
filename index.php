<?php

use jamshidbekakhlidinov\EPhoto360;

require_once 'vendor/autoload.php';


if(isset($_GET['code']) && (isset($_GET['name1']) || isset($_GET['photo1']))){

   $text = []; $photo = []; $code = $_GET['code'];
   if(isset($_GET['name1'])){
      $text[] = $_GET['name1'];
   }
   if(isset($_GET['name2'])){
      $text[] = $_GET['name2'];
   }
   if(isset($_GET['photo1'])){
      $name = 'img/'.rand(10000,99999).'.'.strrev(explode('.',strrev($_GET['photo1']))[0]);
      file_put_contents($name, file_get_contents($_GET['photo1']));
      $photo[] = $name;
   }
   if(isset($_GET['photo2'])){
      $name = 'img/'.rand(10000,99999).'.'.strrev(explode('.',strrev($_GET['photo2']))[0]);
      file_put_contents($name, file_get_contents($_GET['photo2']));
      $photo[] = $name;
   }
   $result = EPhoto360::create($code, [
      'text' => $text,
      'image' => $photo,
       'radio0' => [
           'radio' => 'f469ed11-98c3-4b29-997e-68e9460faf6b', // Call EPhoto360::getEffect() method to see the list of filter.
       ]
      ]);

      foreach($photo as $p){
         if(file_exists($p)){
            unlink($p);
         }
      }
   
      // file_put_contents($result['image_code'],file_get_contents($result['image']));
   
}else{
   $result = [
      'message'=>'Error page',
      'admin'=>'http://t.me/JamshidbekAkhlidinov'
   ];
}

print json_encode($result);


?>