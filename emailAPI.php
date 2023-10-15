<html>
<body>
<center>
    <h2>Log IN</h2>
    <form method="post">
        Enter Name:<input type="text" name="name" class="name"><br><br>
        Enter Email:<input type="email" name="email" class="email"><br><br>
        <input type="button" id="btn" value="SUBMIT"><br><br>
</form>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function(){
        $("#btn").on("click",function(){
            alert('Something happens');
        });
    });
    </script>
</center>
</body>
</html>