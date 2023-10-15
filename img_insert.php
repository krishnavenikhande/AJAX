<?php


$con=mysqli_connect("localhost","root","","test");
$name=$_POST['name'];

$filename=$_FILES['image']['name'];
$filetmpname=$_FILES['image']['tmp_name'];
$filestore="img/".$filename;

if(move_uploaded_file($filetmpname,$filestore))
{
 
    $sql="insert into img_upload(name,image)values('$name','$filename')";
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
        $data['msg']="Data Not inserted";
        array_push($arr,$data);
        echo json_encode($arr);
    }
}
else
{
    echo "<script>alert('Image not uploaded')
    window.loaction.href='image_form.php';
    </script>";
}


?>