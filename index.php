<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exo complet lecture SQL.</title>
</head>
<body>
<?php
require './Classes/DB.php';
$conn = DB::getInstance();

$search = $conn->prepare("SELECT id, lastName, firstName FROM clients");
$result = $search->execute();
if($result){
        echo "liste des utilisateurs :<br>";
    foreach($search->fetchAll() AS $clients) {
        echo "<span>";
        echo $clients['id'] . " " . $clients['lastName'] . " " . $clients['firstName'] . "<br>";
        echo "</span>";
    }
}
echo "<br>";

$search = $conn->prepare("SELECT type FROM showtypes");
$result = $search->execute();
if($result){
    echo "liste des spectacles :<br>";
    foreach($search->fetchAll() AS $showtypes) {
        echo "<span>";
        echo $showtypes['type'] . "<br>";
        echo "</span>";
    }
}
echo "<br>";

$search = $conn->prepare("SELECT * FROM clients LIMIT 20");
$result = $search->execute();
if($result){
    echo "liste des 20 premiers clients :<br>";
    foreach($search->fetchAll() AS $clients) {
        echo "<span>";
        echo $clients['id'] ." ". $clients['lastName'] ." ". $clients['firstName'] ."<br>";
        echo "</span>";
    }
}
echo "<br>";

$search = $conn->prepare("SELECT * FROM clients WHERE card=1");
$result = $search->execute();
if($result){
    echo "liste des clients possédant une carte de fidélité :<br>";
    foreach($search->fetchAll() AS $clients) {
        echo "<span>";
        echo  $clients['lastName'] ." ". $clients['firstName'] ."<br>";
        echo "</span>";
    }
}
echo "<br>";

$search = $conn->prepare("SELECT * FROM clients WHERE lastName LIKE 'M%' ORDER BY firstName ASC");
$result = $search->execute();
if($result){
    echo "liste des clients dont le nom commence par M :<br>";
    foreach($search->fetchAll() AS $clients) {
        echo "<span>";
        echo  $clients['firstName'] ."<br>";
        echo $clients['lastName'] ."<br>";
        echo "</span>";
    }
}
echo "<br>";

?>

</body>
</html>
