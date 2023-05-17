  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nadine - Призводство текстильных изделий</title>

    <!-- Google fonts Raleway -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Google fonts Amatic SC -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    <!-- Fontello CSS -->
    <link rel="stylesheet" href="assets/css/fontello.css">
   
    <!-- main css file -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
    
     
  </head>
  
<script type="text/jаvascript"> 
    $(document).ready(function(){ 
        var body = $("body"); 
        body.fadeIn(400); 
        $(document).on("click", "a:not([href^='#']):not([href^='tel']):not([href^='mailto'])", function(e) { 
            e.preventDefault(); 
            $("body").fadeOut(400); 
            var self = this;
            setTimeout(function () { 
                window.location.href = $(self).attr("href"); 
            }, 400); 
        }); 
    }); 
</script>