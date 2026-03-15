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

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Get the user from DB
    $sql = "SELECT * FROM admin WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        // Verify the encrypted password
        if ($password == $row['password']) {
            echo "Login Success";
        } else {
            echo "Wrong Password";
        }
    } else {
        echo "User Not Found";
    }
} else {
    echo "Missing Data";
}

mysqli_close($conn);
?>