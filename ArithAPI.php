<html>
<body>
    <center>
        <h2>Arithmatic Operations</h2>
        <form method="post">
            Enter A:<input type="number" name="a" class="a" ><br><br>
            Enter B:<input type="number" name="b" class="b" ><br><br>
            <select class="select">
                <option value="add">Add</option>
                <option value="sub">Sub</option>
                <option value="mul">Mul</option>
                <option value="div">Div</option>
</select>
</form>
<span class="ans"></span>  
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
$(document).ready(function(){
    $(".select").on("change",function(){
      var a=$('.a').val();
      var b=$('.b').val();
      var tmp=$(this).val();
     
      if(tmp=="add")
      {
          var res=parseInt(a)+parseInt(b);
          $('.ans').html(res);
      }
      else if(tmp=="sub")
      {
          var res=parseInt(a)-parseInt(b);
          $('.ans').html(res);
      }
      else if(tmp=="mul")
      {
          var res=parseInt(a)*parseInt(b);
          $('.ans').html(res);
      }
      else if(tmp=="div")
      {
          var res=parseInt(a)/parseInt(b);
          $('.ans').html(res);
      }
      var arith={a,b,res};
    
     console.log(arith); 

    });

});

</script>
</center>
</body>
</html>