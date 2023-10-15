<?php
$id=$_GET['id'];
$con=mysqli_connect("localhost","root","","test");

$name=$_POST['name'];
$bname=$_POST['bname'];
$acc=$_POST['acc'];
$ifsc=$_POST['ifsc'];

$update="update bank set name='$name',bname='$bname',acc='$acc',ifsc='$ifsc' where id=$id";
if(mysqli_query($con,$update))
{
    $arr=array();
    $data['status']="success";
    $data['msg']="Data updated";
    array_push($arr,$data);
    echo json_encode($arr);
}
else
{
    $arr=array();
    $data['status']="error";
    $data['msg']="Data not updated";
    array_push($arr,$data);
    echo json_encode($arr);
}
?>
