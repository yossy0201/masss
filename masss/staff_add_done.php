<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>

<?php

try
{

$staff_name = $_POST['name'];
$staff_pass = $_POST['pass'];

$staff_name = htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
$staff_pass = htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');

$dsn = 'mysql:dbname=shop;host=localhost';
$user = 'root';
$password = 'yossy0201';
$dbh = new PDO($dsn,$user,$password);
$dbh->set_Attribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'INSERT INTO mst_staff(name,password) VALUES(?,?)';
$stmt = $dbh->prepare($sql);
$data[] = $staff_name;
$data[] = $staff_pass;
$stmt->execute($data);

$dbh = null;

print $staff_name;
print'さんを追加しました。<br/>';

}
catch(Exception $e)
{
  print'ただいま障害により大変ご迷惑をおかけしております。';
  exit();
}

?>

<a href = "staff_list.php">戻る</a>

</body>
</html>