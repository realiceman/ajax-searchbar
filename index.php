<!DOCTYPE html>
<html>
  <meta charset="UTF-8">
  <head>
    <title></title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
    <script>
    $(document).ready(function(){
        $('.loader').hide();
        
        
        $('#search').keyup(function(){
          $field = $(this);
          $('#result').html('');
          
          if($field.val().length>1)
          {
            $.ajax({
              type: 'POST',
              url: 'search.php',
              data: 'search='+$('#search').val(),
              
              beforeSend:function(){
                $('.loader').stop().fadeIn();
              },
              
              success: function(data){
                $('.loader').fadeOut();
                $('#result').html(data);
              }
            });
          }
        });
      });
    </script>
  </head>
  <body>
    <div id="content">
      
      <form action="search.php" method="post">
        
        <label for="search">Rechercher:</label>
        <input type="text" name="search" id="search" />
        
        <div class="loader"></div>
        
      </form>
      
      <div id="result"></div>
      
    </div>
  </body>
</html>