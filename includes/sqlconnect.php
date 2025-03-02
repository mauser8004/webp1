<?php
try {
// Kapcsolódás
$pdo = new PDO('mysql:host=localhost;dbname=webp1db', 'webp1db',
'J3grvN7YjfVtBGwD2RxzdS',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
$pdo->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
$utasitas = "Select id, csaladi_nev From felhasznalok Where id<10";
$eredm = $pdo->query($utasitas);
}
catch (PDOException $e) {
echo "Hiba: ".$e->getMessage();
}
?>
