<?php
include 'userMenu.php';
// $hairCatalogList = $Hairsalon->displayCatalog();

?>
<!doctype html>
<html lang="en">
  <head>
    <title>catalog</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <style>        
        body{
          margin-top:100px;  
        }
    </style>


</head>
  <body>
    <div class="bg-white w-50 mx-auto rounded text-center">
        <p class="display-4 text-monospace">Catalog</p>
        <p class="text-monospace"><?php //echo count($hairCatalogList);?> of picture </p>
    </div>

    <div class="container">
        <div class="row">
        <?php // foreach($hairCatalogList as $row):?>
            <div class="col-lg-3 text-center">
                <img src="asset/staff1.jpg  <?php //echo $row['catalog_photo']; ?>" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis, repudiandae! <?php //echo  $row['catalog_comment']?></p>
                <p> yuya<?php //echo  $row['photo_stylist']?></p>

            </div>
            <div class="col-lg-3 text-center">
                <div class="card">
                    <div class="card-header">
                        <form action="" method="post">
                            <button type="submit" name="c1"> 
                                 <!-- //catalog_id -->
                            <img src="asset/staff1.jpg"  class="" <?php //echo $row['catalog_photo']; ?> alt="">
                            </button>
                        </form>
                    </div>
                        <?php
                        if(isset($_POST['c1'])){ //catalog_id
                            echo "<div class='card-body'>";
                            echo "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis, repudiandae! </p>";
                            echo "<br>";
                            echo "yuya";
                            echo " </div>";
                             
                        }
                        ?>                   
                </div>
               
            </div>
            <div class="col-lg-3 text-center">
                <div class="card">
                    <div class="card-header">
                        <form action="" method="post">
                            <button type="submit" name="c1"> 
                                 <!-- //catalog_id -->
                            <img src="asset/staff1.jpg"  class="" <?php //echo $row['catalog_photo']; ?> alt="">
                            </button>
                        </form>
                    </div>
                        <?php
                        if(isset($_POST['c1'])){ //catalog_id
                            echo "<div class='card-body'>";
                            echo "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis, repudiandae! </p>";
                            echo "<br>";
                            echo "yuya";
                            echo " </div>";
                             
                        }
                        ?>                   
                </div>
               
            </div>

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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>