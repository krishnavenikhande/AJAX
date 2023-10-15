<?php
$con=mysqli_connect("localhost","root","","test");
$name=$_POST['name'];
$email=$_POST['email'];
$branch=$_POST['branch'];

$sql="insert into stud1(name,email,branch)values('$name','$email','$branch')";
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
   $data['msg']="Data not insert";
   array_push($arr,$data);
   echo json_encode($arr);
}
?>