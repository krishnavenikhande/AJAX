<?php
?>
<html>
    <body>
<form method="post">
    <input type="text" name="name" placeholder="Enter Name" class="name"><br>
    <input type="text" name="email" placeholder="Enter Email" class="email"><br>
    <input type="button" value="ADD DATA" id="btn">
</form>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function(){
       $("#btn").on("click",function(){
        var name=$('.name').val();
        var email=$('.email').val();
        var data={
            name,
            email
        };
        console.log(data);
       });
    
    });
</script>
</body>
</html>
