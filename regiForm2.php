<html>
<body>
<center>
    <h2 style="color:blue;">Student's Registration Form</h2>
<form method="post">
<input type="text" placeholder="Enter Name" name="name" class="name"><br>
<span class="nameerror" style="color:red;"></span><br>

<input type="text" placeholder="Enter Email" name="email" class="email"><br>
<span class="emailerror" style="color:red;"></span><br>

<select name="degree" class="degree">
<option  value="Select Degree">Select Degree</option>
<option value="B.E.">B.E.</option>
<option value="BCOM">BCOM</option>
<option value="DIPLOMA">DIPLOMA</option>
<option value="BCA">BCA</option>

</select>
<br><br>
<input type="number" placeholder="Enter Contact Number" name="contact" class="contact"><br>
<br> 
<input type="text" placeholder="Enter Address" name="address" class="address"><br>
<br>
<input type="button" id="btn" value="SUBMIT">
</form>
</center>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script>
$(document).ready(function(){
    $("#btn").on("click",function(){
        var name=$('.name').val();
        var email=$('.email').val();
        var degree=$('.degree').val();
        var contact=$('.contact').val();
        var address=$('.address').val();
        var data={name,email,degree,contact,address};
        if(name=="")
        {
            $(".nameerror").html("Enter Name");
            $(".emailerror").html('');
            return false;
        }
        else if(email=="")
        {
            $(".nameerror").html('');
            $("emailerror").html("Enter Email");
            return false;
        }
        $.ajax({
            type:'POST',
            url:'regi2.php',
            data:data,
            success:function(data)
            {
                var objJSON=JSON.parse(data);
                  if(objJSON[0].status=="success")
                  {
                     alert("Data Added");
                     window.location.href="regiForm2.php";
                  }
                  else if(objJSON[0].status=="error")
                  {
                      alert("Data Not Added");
                      window.location.href="regiForm2.php";
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