<html>
<body>
  <center>
    <h2>Employee Form</h2>
    <form method="post">
        Enter Emp Name:<input type="text" name="name" class="name"><br><br>
        <span style="color:red;" class="nameerror"></span><br>

        Enter Emp ID:<input type="text" name="eid" class="eid"><br><br>
        <span style="color:red;" class="eiderror"></span><br>

        Enter Department:<input type="text" name="dept" class="dept"><br><br>
        <span style="color:red;" class="depterror"></span><br>

        <input type="button" id="btn" value="SUBMIT"><br><br>

    </form>

    <table border="1" rules="all">
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee Name</th>
                <th>Employee ID</th>
                <th>Employee Dept</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>

        </thead>
        <tbody class="datafetch">
        </tbody>

    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <script>
    $(document).ready(function(){
        var markup="";
        $("#btn").on("click",function(){
            var name=$('.name').val();
            var eid=$('.eid').val();
            var dept=$('.dept').val();

            var colm={name,eid,dept};
            if(name=="")
            {
                $('.nameerror').html("Enter Name");
                $('.eiderror').html('');
                $('.depterror').html('');
            
                return false;
            }
            else if(eid=="")
            {
                $('.nameerror').html('');
                $('.eiderror').html("Enter EId");
                $('.depterror').html('');
                return false;
            }
            else if(dept=="")
            {
                $('.nameerror').html('');
                $('.eiderror').html('');
                $('.depterror').html("Enter Department");
                return false;
            }

            $.ajax({
                type:'POST',
                url:'emp_insert.php',
                data:colm,

                success:function(data)
                {
                    var objJSON=JSON.parse(data);
                    if(objJSON[0].status=="success")
                    {
                        alert("Data Added");
                        window.location.href="empAPI.php";
                    }
                    else
                    {
                        alert("Please Check Inputs");
                        window.location.href="empAPI.php";
                    }

                },
                error:function(data)
                {
                    console.log(data);
                }

            })
            console.log(colm);
        });
   

        $.ajax({
            type:'GET',
            url:'emp_fetch.php',
            success:function(data)
            {
                var ob=JSON.parse(data);
                var trcount=ob.length;
                for(i=0;i<trcount;i++)
                {
                    var id=ob[i].id;
                   markup+="<tr><td>"+ob[i].id+"</td><td>"+ob[i].name+"</td><td>"+ob[i].eid+"</td><td>"+ob[i].dept+"</td><td><a href='empUPDATE_form.php?id="+id+"'>Update</a></td><td><a href='delete_emp.php?id="+id+"'>Delete</a></td></tr>" ;
                }
                $(".datafetch").append(markup);
            }
        })

    });
    </script>
    </center>
</body>
</html>