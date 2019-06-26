<?php
//$conexión = new MongoClient( "mongodb+srv://AdminAV:soporte123$@clusterav-qx4cd.mongodb.net/CRM_DB?retryWrites=true&w=majority" ); // conectar a un host remoto (puerto predeterminado: 27017)

require 'vendor/autoload.php';
$m = new MongoDB\Client("mongodb+srv://AdminAV:soporte123$@clusterav-qx4cd.mongodb.net/CRM_DB?retryWrites=true&w=majority");

/*
$db=$m->mongodbphp;

$book= $db->book;

$book->insertOne([
    'username' => 'admin',
    'email' => 'admin@example.com',
    'name' => 'Admin User',
]);

$data_book=$book->find();
foreach($data_book as $b){
    echo "<div>".$b['username']." email:".$b['email']."</div>";
}

  
$book->deleteMany(["username" => "admin"]);


$updateresult=$book->updateOne(
    ['username'=>'admin2'],['$set' =>['username'=>'adminupdateado']]
);
printf("Matched %d DOcuments \n",$updateresult->getMatchedCount());
printf("Modified %d DOcuments \n",$updateresult->getModifiedCount());

*/
?>