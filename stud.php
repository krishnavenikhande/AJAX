<html>
<body>
<form method="post"> 
 Enter Name:<input type="text" name="name" class="name"><br>
 Enter Email:<input type="text" name="email" class="email"><br>
 Select Branch:<input type="radio" name="branch" class="branch" value="CSE">CSE
     <input type="radio" name="branch" class="branch" value="ENTC">ENTC
     <input type="radio" name="branch" class="branch" value="Civil">Civil
     <input type="radio" name="branch" class="branch" value="Mech">Mech
     <br>
     <input type="button" value="Submit" id="btn"><br>
</form>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script>
$(document).ready(function(){
$("#btn").on("click",function(){
    var name=$('.name').val();
    var email=$('.email').val();
    var branch=$('input[name="branch"]:checked').val();
    var data={
        name,email,branch
    };
    console.log(data);

});

});   
</script>
</body>
</html>
