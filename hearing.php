<?php

$DevCatId=$_POST["DevCatId"];
$CatName=$_POST["CatName"];
$Descri=$_POST["Descri"];
$Available=$_POST["Available"];

$HdMake=$_POST["HdMake"];
$HdModel=$_POST["HdModel"];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "w1742228_mysqldb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO w1742228_device (w1742228_deviceCatalogId,w1742228_deviceCatalogName,w1742228_deviceDescrip,w1742228_availabilityStatus)
VALUES ($DevCatId,'$CatName', '$Descri', '$Available');";
$sql .= "INSERT INTO w1742228_hearing_device (w1742228_hdMake,w1742228_hdModel,w1742228_deviceCatalogId)
VALUES ('$HdMake', '$HdModel',$DevCatId)";

if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>