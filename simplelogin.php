<html>
<body>
    <center>
<form method="post">
    Enter Name:<input type="text" name="name" class="name"><br><br>
   <span class="nameerror" style="color:red;size:14px;"></span>
   <br>
   Enter Email:<input type="email" name="email" class="email"><br><br>
    <br>
    <span class="emailerror" style="color:red;size:14px;"></span>
<br>
    <input type="button" value="submit" id="btn">

</form> 
</center>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
$(document).ready(function(){
    $("#btn").on("click",function(){
        var name=$('.name').val();
        var email=$('.email').val();
        var data={name,email};
        if(name=="")
        {
            $(".nameerror").html("Enter Name");
            $(".emailerror").html('');
            return false;

        }
        else if(email=="")
        {
            $(".nameerror").html('');
            $(".emailerror").html("Enter Email");
            return false;
        }
        $.ajax({
            type:'POST',
            url:'add_data.php',
            data:data,
            success:function(data)
            {
                var objJSON=JSON.parse(data);
            if(objJSON[0].status=="success")
            {
                alert("Data Added");
                window.location.href="simplelogin.php";
            }
            else
            {
                alert("Please check inputs");
                window.location.href="simplelogin.php";
            }

            },
                error:function(data)
                { 

                    console.log(data);
                }
        })
        console.log(data);
    });
});

    </script>
</body>
</html>