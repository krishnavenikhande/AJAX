<?php
$con=mysqli_connect("localhost","root","","test");
$sql="select * from img_upload";
$rs=mysqli_query($con,$sql);
$arr=array();

while($rw=mysqli_fetch_row($rs))
{
    $data['id']=$rw[0];
    $data['name']=$rw[1];
    $data['image']=$rw[2];
    array_push($arr,$data);
}
echo json_encode($arr);


?>