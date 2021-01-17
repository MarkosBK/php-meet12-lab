<?php
include_once("functions.php");
$link = connect();
$createDbQuery = "CREATE TABLE Users(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    login varchar(30) UNIQUE,
    pass varchar(128),
    email varchar(64)
   ) default charset='utf8'";

mysqli_query($link, $createDbQuery);
$error = mysqli_errno($link);
if ($error) {
    echo "<h3 align='center' style='color: red'>Query: " . $error . "</h3>";
    exit();
}

echo "<h3 align='center' style='color: green'>База создана успешно!</h3>";