<?php
// (A) CONNECT TO DATABASE - CHANGE SETTINGS TO YOUR OWN!
$dbHost = "localhost";
$dbName = "student_portal";
$dbChar = "utf8";
$dbUser = "root";
$dbPass = "";
// $conn = mysqli_connect("localhost","root","","student_portal");
try {
  $pdo = new PDO(
    "mysql:host=".$dbHost.";dbname=".$dbName.";charset=".$dbChar,
    $dbUser, $dbPass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
  );
} catch (Exception $ex) { exit($ex->getMessage()); }

// (B) READ UPLOADED CSV
$fh = fopen($_FILES["upcsv"]["tmp_name"], "r");
if ($fh === false) { exit("Failed to open uploaded CSV file"); }

// (C) IMPORT ROW BY ROW
while (($row = fgetcsv($fh)) !== false) {
  try {
    // print_r($row);
    $stmt = $pdo->prepare("INSERT INTO subject (Sub_code, Sub_name, Sub_description, Teacher, Sub_level, day, time_sched, Units) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->execute([$row[0], $row[1]]);
  } catch (Exception $ex) { echo $ex->getmessage(); }
}
fclose($fh);
echo "DONE.";
