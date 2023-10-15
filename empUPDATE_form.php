<?php
$id=$_GET['id'];
$con=mysqli_connect("localhost","root","","test");
$sql="select * from employee where id=$id";
$rs=mysqli_query($con,$sql);
$rw=mysqli_fetch_row($rs);
?>

<html>
<body>
    <center>
        <h2>Employee Update Form</h2>
        <form method="post">
            Enter Name:<input type="text" class="name" value="<?php echo $rw[1];?>"><br><br>
            Enter Emp Id:<input type="text" class="eid" value="<?php echo $rw[2];?>"><br><br>
            Enter Department:<input type="text" class="dept" value="<?php echo $rw[3];?>"><br><br>
            <input type="button" id="btn" value="UPDATE"><br>
            <input type="hidden" class="id" value="<?php echo $rw[0];?>">
</form>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
  $(document).ready(function(){
    $("#btn").on("click",function(){
        var name=$('.name').val();
        var eid=$('.eid').val();
        var dept=$('.dept').val();
        var id=$('.id').val();
        var update={name,eid,dept};

        $.ajax({
            type:'POST',
            url:'empUPDATE.php?id='+id,
            data:update,

            success:function(data)
            {
                var ob=JSON.parse(data);
                if(ob[0].status=="success")
                {
                    alert("Data updated");
                    window.location.href="empAPI.php";
                }
                else
                {
                    alert("Data Not Updated");
                    window.location.href="empAPI.php";
                }
            },
            error:function(data)
            {
                colsole.log(data);
            }
        })
        console.log(update);
    });
  });

</script>
</center>
</body>
</html>