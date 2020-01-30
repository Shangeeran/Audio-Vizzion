<?php

$DevCatId=$_POST["DevCatId"];
$CatName=$_POST["CatName"];
$Descri=$_POST["Descri"];
$Available=$_POST["Available"];

$FrBrand=$_POST["FrBrand"];
$FrModel=$_POST["FrModel"];
$SeriNb=$_POST["SeriNb"];
$VisType=$_POST["VisType"];
$LenTint=$_POST["LenTint"];
$LenLev=$_POST["LenLev"];

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
$sql .= "INSERT INTO w1742228_visual_device (w1742228_frBrand,w1742228_frModel,w1742228_lensSerialNb,w1742228_lensVisionType,w1742228_lensTint,w1742228_lensThinnessLevel,w1742228_deviceCatalogId)
VALUES ('$FrBrand', '$FrModel', '$SeriNb', '$VisType', '$LenTint', '$LenLev', $DevCatId)";

if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>