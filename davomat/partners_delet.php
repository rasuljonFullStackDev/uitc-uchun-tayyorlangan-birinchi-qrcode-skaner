<?php 
include "conn.php";
$id = $_GET["delet"];
$sql = "DELETE FROM `partners` WHERE id='$id'";
$res = mysqli_query($con,$sql);
if($res){
    header("location:partners.php ");
    echo "sucsees";
} else {
    echo " erorr";
}
?>