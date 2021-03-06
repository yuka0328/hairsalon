<?php
  include 'navbar.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <title>contact/access</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <style type="text/css">
      /* navbar with bootstrap */
      .menu-container, .header-center ul{
        position: fixed;
        top: 0;
      }
     
      /* ---------------------------------- */   
      body{
        /* this page only margin-top 200px */
        margin-top:200px;
        /* height: 700px; */
        background-image: url(asset/logo1.jpg);
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center center;
        background-size :cover ;
      }
      #thankyou{
        font-family: 'Oleo Script', cursive;
        margin-bottom: 50px;
        padding:20px; 
        border: 10px solid #f4e6e1;
      }
      #con1{
        background-color: rgba(255, 255, 255, 0.5 );
      }
      /* --------------------------------- */
      footer{
        position: relative;
        bottom: 0;
        width: 100%;
      }
      @media(max-width:1000px){
        .header-center ul{
        position: fixed;
        top: 80px;
        left:50px;
        margin-left:0px;
        }
      }
    </style>
  </head>
  <body>
    <div class="container w-75 mt-5 p-5 rounded" id="con1">
        <!-- <h1 class="text-center p-3">Contact us</h1> -->

        <div class="container mx-auto w-50 mb-5 rounded" id="thankyou"> 
            <h1 >Thank you</h1>
            <p>We receive your message and reply soon!</p>
        </div>
    </div>


    <!-- footer -->
    <nav class="nav navbar bg-dark mt-5 fixed-bottom">
      <a class="" href="dashboard.php" >Go to top</a>
      <p class="text-light">copyright@ Yuka</p>
      <a href="contactpage.php">contact</a>
    </nav>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>