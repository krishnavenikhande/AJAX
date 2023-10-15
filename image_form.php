<html>
<body>
<center>
    <h2> Image Upload</h2>
<form id="imgform" method="post">
Enter Name:<input type="text" name="name" class="name" placeholder="Enter Name"><br><br>
<input type="file" name="image" class="image" id="upload_file" ><br><br>
<input type="submit" id="btn" value="SUBMIT"><br>

</form>
<table border="1" rules="all">
<thead>
    <tr>
        <th>Sr No.</th>
        <th>Name</th>
        <th>Image</th>
        <th>Update</th>
        <th>Delete</th>
</tr>
</thead>
<tbody class="fetch">
</tbody>
</table>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
   $(document).ready(function(e){
    var markup="";
    $("#imgform").on("submit",function(e){
        e.preventDefault();


        $.ajax({
            type:'POST',
            url:'img_insert.php',
            data:new FormData(this),
            contentType:false,
            processData:false,

            success:function(data)
            {
                var ob=JSON.parse(data);
                if(ob[0].status=="success")
                {
                    alert('Data Added');
                    window.location.href="image_form.php";
                }
                else
                {
                    alert('Data Not Added');
                    window.location.href="image_form.php";
                }
               
            },
            error:function(data)
            {
                console.log(data);
            }

        })
      
    });

       $.ajax({
        type:'GET',
        url:'img_fetch.php',

        success:function(data)
        {
            var ob=JSON.parse(data);
            var trcount=ob.length;
            for(i=0;i<trcount;i++)
            { 
                var image=ob[i].image;
                markup+="<tr><td>"+ob[i].id+"</td><td>"+ob[i].name+"</td><td width='100'><img src='img/" +image+"' style='width:100%;'></td><td><a href='imgUPDATE_form.php?id="+ob[i].id+"'>Update</a></td><td><a href='delete_img.php?id="+ob[i].id+"'>Delete</a></td></tr>";
            }
            $('.fetch').append(markup);
        }
       })





   });


    </script>

</center>
</body>
</html>