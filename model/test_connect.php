<?php
function connect(){
    $dburl = "mysql:host=localhost;dbname=project1" ;
    $username = "root";
    $password = "";
    try{
        $conn = new PDO($dburl,$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMOR, PDO::ERRMODE_EXCEPTION)
    }
}
?>