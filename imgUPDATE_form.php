<?php
$id=$_GET['id'];
$con=mysqli_connect("localhost","root","","test");
$sql="select * from img_upload where id=$id";
$rs=mysqli_query($con,$sql);
$rw=mysqli_fetch_row($rs);
?>


<html>
<body>
    <center>
        <form method="post" id="imgForm">
            Enter Name:<input type="text" class="name" name="name" value="<?php echo $rw[1];?>"><br><br>
            <input type="file" class="image" name="image" value="<?php echo $rw[2];?>" ><br><br>
            <input type="hidden" class="id" name="id" value="<?php echo $rw[0];?>">
            <input type="submit" id="btn" value="SUBMIT"><br>
</form>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
   $(document).ready(function(e){
    $("#imgForm").on("submit",function(e){
        var id=$('.id').val();

        e.preventDefault();


         $.ajax({
            type:'POST',
            url:'imgUPDATE.php?id='+id,
            data:new FormData(this),
            contentType:false,
            processData:false,

            success:function(data)
            {
                var ob=JSON.parse(data);
                if(ob[0].status=="success")
                {
                    alert("Data updated");
                    window.location.href="image_form.php";
                }
                else
                {
                    alert("Data Not Updated");
                    window.location.href="image_form.php";
                }
            },
            error:function(data)
            {
                console.log(data);
            }

         })
    });
   });

</script>
</center>
</body>
</html>