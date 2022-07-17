<?php
$conn = new mysqli('localhost', 'root', '', 'apsi');
if($conn->connect_error){
    die('connection failed : '.$conn->connect_error);
}

?>