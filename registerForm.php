<ht<html>
<body>
    <center>
<form method="post">
    Enter Fullname:<input type="text" name="name" class="name"><br><br>
    Enter Address:<input type="text" name="address" class="address"><br><br>
    Enter Email:<input type="email" name="email" class="email"><br><br>
    Select City:<select name="city" class="city">
        <option value="Solapur">Solapur</option>
        <option value="Pune">Pune</option>
        <option value="Satara">Satara</option>
</select><br><br>
     Enter Pin:<input type="number" name="pin" class="pin"><br><br>
     <input type="button" id="btn" value="Submit">
</form> 
</center>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script>
$(document).ready(function(){
  $("#btn").on("click",function(){
    var name=$('.name').val();
    var add=$('.address').val();
    var email=$('.email').val();
    var city=$('.city').val();
    var pin=$('.pin').val();
    var data={name,add,email,city,pin};
    console.log(data);
  });

});

    </script>
</body>
</html>