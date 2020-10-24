<?php
include "libs/db_connect.php";

$days = [];

if (!$conn->connect_error) {
    $sql = "SELECT days.name FROM days;";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result))
    {
        $days[] = $row['name'];
    }

    $json = json_encode($days, JSON_UNESCAPED_UNICODE);
    echo $json;
}
else {
    die("Connection failed: " . $conn->connect_error);
}

$conn->close();