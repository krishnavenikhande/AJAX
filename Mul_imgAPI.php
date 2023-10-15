<html>
<body>
<center>
    <form method="post" id="imgform">
        Enter Name:<input type="text" name="name" class="name"><br><br>
        <input type="file" name="image[]" class="image[]" multiple><br><br>
        <input  type="submit" id="btn"><br><br>
</form>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function(e){
        $("#imgform").on("submit",function(e){
            e.preventDefault();

            $.ajax({
                type:'POST',
                url:'Mul_insert.php',
                data:new FormData(this),
                contentType:false,
                processData:false,

                success:function(data)
                {
                     var ob=JSON.parse(data);
                     if(ob[0].status=="success")
                     {
                        alert("Data Inserted");
                        window.location.href="Mul_imgAPI.php";
                     }
                     else
                     {
                        alert("Data Not Inserted");
                        window.location.href="Mul_imgAPI.php";
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