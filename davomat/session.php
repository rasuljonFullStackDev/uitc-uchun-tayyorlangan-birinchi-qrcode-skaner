<?php

session_start();

if(isset($_SESSION["user_id"])){
    // echo $_SESSION["user_id"];
} else{
    header("Location:login.php");

}



?>