<?php
$id=$_GET['id'];
$con=mysqli_connect("localhost","root","","test");
$sql="select * from bank where id=$id";
$rs=mysqli_query($con,$sql);
$rw=mysqli_fetch_row($rs);

?>

<html>
<body>

<center>
<h2 style="color:#260f8a;">Welcome to Bank Of India</h2>
<h2 style="color:#260f8a;">Update Form</h2>


<form method="post"> 
Enter Name:<input type="text" class="name" value="<?php echo $rw[1];?>"><br><br>
Enter Bank Name:<input type="text" class="bname" value="<?php echo $rw[2];?>"><br><br>
Enter Account No:<input type="number" class="acc" value="<?php echo $rw[3];?>"><br><br>
Enter IFSC Code:<input type="text" class="ifsc" value="<?php echo $rw[4];?>"><br><br>
<input type="hidden" class="id" value="<?php echo $rw[0];?>">
 
<input type="button" id="btn" value="UPDATE">


</form>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</center>


<script>
$(document).ready(function(){
    $("#btn").on("click",function(){

        var name=$('.name').val();
        var bname=$('.bname').val();
        var acc=$('.acc').val();
        var ifsc=$('.ifsc').val();
        var id=$('.id').val();

        var update={name,bname,acc,ifsc};

        $.ajax({
           type:'POST',
           data:update,
           url:'updatedata.php?id='+id,

           success:function(data)
           {
            var ob=JSON.parse(data);
            if(ob[0].status=="success")
            {
                alert("Data Updated");
                window.location.href="bankAPI.php";
            }
            else
            {
                alert("Data Not Updated");
                window.location.href="bankAPI.php";
            }
           },
           error:function(data)
           {
            console.log(data);
           }

        })
        console.log(update);

    });

});


</script>
</body>
</html>