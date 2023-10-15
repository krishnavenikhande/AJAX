<?php 
$con=mysqli_connect("localhost","root","","test");
$name=$_POST['name'];
$eid=$_POST['eid'];
$dept=$_POST['dept'];

$sql="insert into employee(name,eid,dept)values('$name','$eid','$dept')";

if(mysqli_query($con,$sql))
{
    $arr=array();
    $data['status']="success";
    $data['msg']="Data inserted";
    array_push($arr,$data);
    echo json_encode($arr);

}
else
{
    $arr=array();
    $data['status']="error";
    $data['msg']="Data not inserted";
    array_push($arr,$data);
    echo json_encode($arr);
}




?>