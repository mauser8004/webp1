<?php session_start(); ?>
<?php if(file_exists('./logicals/'.$keres['fajl'].'.php')) { include("./logicals/{$keres['fajl']}.php"); } ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $ablakcim['cim'] . ( (isset($ablakcim['mottó'])) ? ('|' . $ablakcim['mottó']) : '' ) ?></title>
	<link rel="stylesheet" href="./styles/stilus.css" type="text/css">
	<?php if(file_exists('./styles/'.$keres['fajl'].'.css')) { ?><link rel="stylesheet" href="./styles/<?= $keres['fajl']?>.css" type="text/css"><?php } ?>
</head>
<body>
	<header>
		<img src="./images/<?=$fejlec['kepforras']?>" alt="<?=$fejlec['kepalt']?>">
		<h1><?= $fejlec['cim'] ?></h1>
		<?php if (isset($fejlec['motto'])) { ?><h2><?= $fejlec['motto'] ?></h2><?php } ?>
		<?php if(isset($_SESSION['login'])) { ?>Bejelentkezve: <strong><?= $_SESSION['csn']." ".$_SESSION['un']." (".$_SESSION['login'].")" ?></strong><?php } ?>
	</header>
    <div id="wrapper">
        <aside id="nav">
            <nav>
                <ul>
					<?php foreach ($oldalak as $url => $oldal) { ?>
						<?php if(! isset($_SESSION['login']) && $oldal['menun'][0] || isset($_SESSION['login']) && $oldal['menun'][1]) { ?>
							<li<?= (($oldal == $keres) ? ' class="active"' : '') ?>>
							<a href="<?= ($url == '/') ? '.' : $url ?>">
							<?= $oldal['szoveg'] ?></a>
							</li>
						<?php } ?>
					<?php } ?>
                </ul>
            </nav>
        </aside>
        <div id="content">
            <?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
        </div>
    </div>
    <footer>
//////////////////
<?php
if(isset($_POST['lname']) && isset($_POST['passwd'])) {
    try {
        // Kapcsolódás
        $dbh = new PDO('mysql:host=localhost;dbname=webp1db', 'webp1db', 'J3grvN7YjfVtBGwD2RxzdS',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

        // Felhsználó keresése
        $sqlSelect = "select id, csaladinev, utonev from users where lnmae = :bejelentkezes and passwd = sha512(:passwd)";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':bejelentkezes' => $_POST['lname'], ':passwd' => $_POST['passwd']));
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $_SESSION['csn'] = $row['csaladinev']; $_SESSION['un'] = $row['utonev']; $_SESSION['login'] = $_POST['lname'];
        }
    }
    catch (PDOException $e) {
        $errormessage = "Hiba: ".$e->getMessage();
    }
}
else {
    header("Location: .");
}
?>
////////////////////////////////
        <?php if(isset($lablec['copyright'])) { ?>&copy;&nbsp;<?= $lablec['copyright'] ?> <?php } ?>
		&nbsp;
        <?php if(isset($lablec['ceg'])) { ?><?= $lablec['ceg']; ?><?php } ?>
    </footer>
</body>
</html>
