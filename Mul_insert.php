<?php
$con=mysqli_connect("localhost","root","","test");
$name=$_POST['name'];
$img_name=count($_FILES['image']['name']);
$img=array();

for($i=0;$i<$img_name;$i++)
{
   $filename=array($_FILES['image']['name']);
   $mulimg=implode(',',$filename);
   $filetmpname=$_FILES['image']['tmp_name'];
   $filestore="img/".$filename;

   if(move_uploaded_file($filetmpname,$filestore))
   {
    array_push($img,$filestore);
   }
}

  $imgjson=json_encode($img);
  $sql="insert into mul_image(name,image)values('$name','$imgjson')";
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
    $data['msg']="Data inserted";
    array_push($arr,$data);
    echo json_encode($arr);
    
  }






?>