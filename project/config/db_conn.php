<?php
//mysqli or pdo for objects
//00conncetions



$conn=mysqli_connect('localhost','shau','test1234','simplephp');
//00check connection
if(!$conn){
    echo "connection error: ".mysqli_connect_error();
}



?>