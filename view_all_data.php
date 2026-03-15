<?php
$host = "db-mysql-demolink.k.db.ondigitalocean.com";
$user = "doadmin";
$pass = "demopassword"; 
$db   = "defaultdb";
$port = 25060;
$ssl_ca = "/var/www/html/ca-certificate.crt";


$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, $ssl_ca, NULL, NULL);
if (!mysqli_real_connect($conn, $host, $user, $pass, $db, $port, NULL, MYSQLI_CLIENT_SSL)) {
    die("Connect Error: " . mysqli_connect_error());
}

$sql = "SELECT * FROM userdata ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

$data = array();

while($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);

mysqli_close($conn);
?>