<?php
$host = "mysql";
$user = "root";
$pass = "root";
$db = "etxebizitza";

$con = mysqli_connect($host, $user, $pass, $db);

if (!$con) {
  die("La conexión a la base de datos falló: " . mysqli_connect_error());
}

$mota = $_POST["mota"];
$barrutia = $_POST["lekua"];
$helbidea = $_POST["helbidea"];
$logelaKopurua = $_POST["logelak"];
$prezioa = $_POST["prezioa"];
$tamaina = $_POST["tamaina"];
$gehigarriak = implode(", ", $_POST["estrak"]);
$oharrak = $_POST["oharrak"];

$sql = "INSERT INTO `etxebizitza` (`mota`, `barrutia`, `helbidea`, `logelaKopurua`, `prezioa`, `tamaina`, `gehigarriak`, `oharrak`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($con, $sql);

mysqli_stmt_bind_param($stmt, "sssiidss", $mota, $barrutia, $helbidea, $logelaKopurua, $prezioa, $tamaina, $gehigarriak, $oharrak);

$ejekutatua = mysqli_stmt_execute($stmt);

if ($ejekutatua) {
  echo "<p>Datuak ondo gorde dira</p>";
} else {
  echo "<p>Errorea datuak ez dira gorde</p>";
}

mysqli_stmt_close($stmt);
mysqli_close($con);
?>