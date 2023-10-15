<?php
$id=$_GET['id'];
$con=mysqli_connect("localhost","root","","test");
$sql="delete from bank where id=$id";


if(mysqli_query($con,$sql))
{
    echo "<script>alert('Data Deleted')
    window.location.href='bankAPI.php';</script>";
}


?>