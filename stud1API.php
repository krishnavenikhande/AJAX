<html>
<body>
<center>
    <h2 style="color:purple;">Student's Log In Form</h2>
<form method="post">
    <input type="text" name="name" class="name" placeholder="Enter Name"><br><br>
    <input type="email" name="email" class="email" placeholder="Enter Email "><br><br>
    <select name="branch" class="branch">
        <option value="Select Branch">Select Branch</option>
        <option value="CSE">CSE</option>
        <option value="MECH">MECH</option>
        <option value="ENTC">ENTC</option>
        <option value="CIVIL">CIVIL</option>
    </select><br><br>
    <input type="button" value="SUBMIT" id="btn">
</form>
<table border="1" rules="all">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Branch</th>
        </tr>
    </thead>   
    <tbody class="studfetch">
       </tbody>
       <table>
</center>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
$(document).ready(function(){
    var markup="";
   $("#btn").on("click",function(){
    var name=$('.name').val();
    var email=$('.email').val();
    var branch=$('.branch').val();
    var colm={name,email,branch};
     $.ajax({
        type:'POST',
        url:'stud1.php',
        data:colm,

        success:function(data){
                var ob=JSON.parse(data);
                  if(ob[0].status=="success")
                  {
                     alert("Data Added");
                     window.location.href="stud1API.php";
                  }
                  else 
                  {
                      alert("Data Not Added");
                      window.location.href="stud1API.php";
                  }


            },
            error:function(data)
            {
                console.log(data);
            }
     })
       console.log(data);
    });






    $.ajax({
        type:'GET',
        url:'getdata.php',

        success:function(data)
        {
            var ob=JSON.parse(data);
            var trcount=ob.length;
            for(i=0;i<trcount;i++)
            {
                markup+="<tr><td>"+ob[i].id+"</td><td>"+ob[i].name+"</td><td>"+ob[i].email+"</td><td>"+ob[i].branch+"</td></tr>";
            }
            $(".studfetch").append(markup);
        },
        error:function(data)
        {
            console.log(data);
        }


    })
});
</script>
</body>
</html>
