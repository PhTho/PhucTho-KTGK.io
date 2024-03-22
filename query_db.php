<?php

require_once "db_connect.php";


$sql = "SELECT * FROM nhanvien";
$result = $conn->query($sql);


$employees = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $employees[] = $row;
    }
}

$conn->close();
?>