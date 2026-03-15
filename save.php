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

$setup_sql = "CREATE TABLE IF NOT EXISTS userdata (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name TEXT,
    age INT,
    gender TEXT,
    email TEXT,
    contact_number BIGINT
)";
mysqli_query($conn, $setup_sql);


if (isset($_POST['name'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact_number = mysqli_real_escape_string($conn, $_POST['contact_number']);

    $sql = "INSERT INTO userdata (name, age, gender, email, contact_number) 
            VALUES ('$name', '$age', '$gender', '$email', '$contact_number')";

    if (mysqli_query($conn, $sql)) {
        echo "Success";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Waiting for data...";
}

mysqli_close($conn);
?>