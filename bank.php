<?php
$con=mysqli_connect("localhost","root","","test");
$name=$_POST['name'];
$bname=$_POST['bname'];
$acc=$_POST['acc'];
$ifsc=$_POST['ifsc'];

$sql="insert into bank(name,bname,acc,ifsc)values('$name','$bname','$acc','$ifsc')";
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