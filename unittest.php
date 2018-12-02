<?php
include "vendor/autoload.php";
use SimpleCrud\SimpleCrud;

$dsn = "mysql:host=localhost;dbname=wedev_test" ;
$username = "root";
$password = "";


$pdo = new PDO($dsn, $username, $password);

$db = new SimpleCrud($pdo);

/*$posts = $db->tbl_user
    ->select()
    ->run();

foreach ($posts as $post) {
    echo $post->name;
}*/


/*$tbl_user = $db->tbl_user->create([
    'name' => 'Mr. Bilal',
    'age' => 29,
    'date_of_year' => '1989-12-20',
    'is_employee' => 1,
    'created_at' => new Datetime('now'),
    'nickname' => 'Bilal'
]);

$tbl_user->save();*/



$updateQuery = $db->tbl_user->update();

$updateQuery
    ->data(['name' => 'New Bilal'])
    ->where('id = :id', [':id' => 8])
    ->limit(1);

echo $updateQuery; //UPDATE `post` ...

//execute the query and returns a PDOStatement with the result
$statement = $updateQuery();