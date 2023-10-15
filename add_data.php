<?php
$con=mysqli_connect("localhost","root","","test");
$name=$_POST['name'];
$email=$_POST['email'];
$sql="insert into student(name,email)values('$name','$email')";
if(mysqli_query($con,$sql))
{
    $arr=array();
    $data['status']="success";
    $data['msg']="Data insert";
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
