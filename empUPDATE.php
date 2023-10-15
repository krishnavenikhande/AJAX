<?php 
$id=$_GET['id'];
$con=mysqli_connect("localhost","root","","test");

$name=$_POST['name'];
$eid=$_POST['eid'];
$dept=$_POST['dept'];

$sql="update employee set name='$name',eid='$eid',dept='$dept' where id=$id";

if(mysqli_query($con,$sql))
{
    $arr=array();
    $data['status']="success";
    $data['msg']="Data Updated";
    array_push($arr,$data);
    echo json_encode($arr);

}
else
{
    $arr=array();
    $data['status']="success";
    $data['msg']="Data Not Updated";
    array_push($arr,$data);
    echo json_encode($arr);
}



?>