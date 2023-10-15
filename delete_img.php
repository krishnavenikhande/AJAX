<?php
$id=$_GET['id'];
$con=mysqli_connect("localhost","root","","test");
$sql="delete from img_upload where id=$id";
if(mysqli_query($con,$sql))
{
    echo "<script>alert('Data Deleted')
    window.location.href='image_form.php';
    </script>";
}



?>