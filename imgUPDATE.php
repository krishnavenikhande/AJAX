<?php
$id=$_GET['id'];
$con=mysqli_connect("localhost","root","","test");
$name=$_POST['name'];

$filename=$_FILES['image']['name'];
$filetmpname=$_FILES['image']['tmp_name'];
$filestore="img/".$filename;

if($filename!="")
{


if(move_uploaded_file($filetmpname,$filestore))
{
 
    $sql="update img_upload  set name='$name',image='$filename' where id=$id";
    if(mysqli_query($con,$sql))
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
        $data['msg']="Data Not updated";
        array_push($arr,$data); 
        echo json_encode($arr);
    }
}
else
{
   echo "<script>alert('Image not found')</script>";
}

}

else

{
    $sql="update  img_upload set name='$name' where id=$id";
    if(mysqli_query($con,$sql))
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
        $data['msg']="Data Not updated";
        array_push($arr,$data); 
        echo json_encode($arr);
    }  
}
?>