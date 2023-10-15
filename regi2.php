<?php
$con=mysqli_connect("localhost","root","","test");
$name=$_POST['name'];
$email=$_POST['email'];
$degree=$_POST['degree'];
$contact=$_POST['contact'];
$address=$_POST['address'];

$sql="insert into register(name,email,degree,contact,address)values('$name','$email','$degree','$contact','$address')";
if(mysqli_query($con,$sql))
{
    $arr=array();
    $data['status']="success";
    $data['msg']="Data Insert";
    array_push($arr,$data);
    echo json_encode($arr);
}
else
{
   $arr=array();
   $data['status']="error";
   $data['msg']="Data Not insert";
   array_push($arr,$data);
   echo json_encode($arr);
}



?>


