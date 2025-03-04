<?php
try {
// Kapcsolódás
$pdo = new PDO('mysql:host=localhost;dbname=webp1db', 'webp1db',
'J3grvN7YjfVtBGwD2RxzdS',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
$pdo->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
$utasitas = "Select * From users Where id<10";
$eredm = $pdo->query($utasitas);
}
catch (PDOException $e) {
echo "Hiba: ".$e->getMessage();
}
echo hash('sha512', 'X94T7Duxn6RFy3CY2ZqjQP');
?>
