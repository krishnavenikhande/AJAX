<html>

<body>
    <center>
        <h2 style="color:#260f8a;">Welcome to Bank Of India</h2>
        <from method="post"> 

Enter Customer Name:<input type="text" name="name" class="name"><br><br>
Enter Bank Name:<input type="text" name="bname" class="bname"><br><br>
Enter Acc.No.:<input type="number" name="acc" class="acc"><br><br>
Enter IFSC No.:<input type="number" name="ifsc" class="ifsc"><br><br>
<input type="button" id="btn" value="SUBMIT" ><br><br>
        </form>

<table border="1" rules="all">
            <thead>
                    <tr> 
                        <th>ID</th>
                        <th>Acc Holder Name</th>
                        <th>Bank Name</th>
                        <th>Account No.</th>
                        <th>IFSC Code</th>
                        <th>Update</th>
                        <th>Delete</th>
                            

                    </tr>
            </thead>
            <tbody class="bankdatafetch">
            </tbody>


</table>



</center>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script>
    $(document).ready(function(){
        var markup="";
        $("#btn").on("click",function(){

            var name=$('.name').val();
            var bname=$('.bname').val();
            var acc=$('.acc').val();
            var ifsc=$('.ifsc').val();

            var colm={name,bname,acc,ifsc};
              
            $.ajax({
                type:'POST',
                url:'bank.php',
                data:colm,

                success:function(data)
                {
                   var ob=JSON.parse(data);
                   if(ob[0].status=="success")
                   {
                    alert("Data Added");
                    window.location.href="bankAPI.php";
                   }
                   else
                   {
                    alert("Please Check Inputs");
                    window.location.href="bankAPI.php";
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
            url:'get_bank.php',

            success:function(data)
            {
               var ob=JSON.parse(data);
               var trcount=ob.length;
               for(i=0;i<trcount;i++)
               {
               // var id=ob[i].id;
                markup+="<tr><td>"+ob[i].id+"</td><td>"+ob[i].name+"</td><td>"+ob[i].bname+"</td><td>"+ob[i].acc+"</td><td>"+ob[i].ifsc+"</td><td><a href='update_bank.php?id="+ob[i].id+"'>Update</a></td><td><a href='delete_bank.php?id="+ob[i].id+"'>Delete</a></td></tr>";
               }
               $(".bankdatafetch").append(markup);
            }
            
        })

    });
    </script>
</body>
    </html>
