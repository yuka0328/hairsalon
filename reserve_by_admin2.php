<?php 
    include 'adminMenu.php';
    $CouponList =$Hairsalon->displayCouponMenu();
    $MenuList =$Hairsalon->displayServiceMenu();

    $staffList =$Hairsalon->displayStaff();

    $selected_cID=$_SESSION['coupon_id'];
    $Selected_coupon =$Hairsalon->getSelectCouponID($selected_cID);
    $selected_sID=$_SESSION['service_id'];
    $selected_service=$Hairsalon->getSelectServiceID($selected_sID);

    
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        h3{
            font-family: 'Oleo Script', cursive;
        }
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
          <div class="card mt-5">
              <div class="card-header">
                    <h3>New Reserve</h3>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        date
                    </div>
                    <div class="col-lg-9">
                        <?php echo $_SESSION['date'] ;?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        hour
                    </div>
                    <div class="col-lg-9">
                    <?php echo $_SESSION['hour'] ;?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        name
                    </div>
                    <div class="col-lg-9">
                    <?php echo $_SESSION['fname'] ;?>
                    <?php echo $_SESSION['lname'] ;?>


                        <!-- <input type="text" name="fname" placeholder="first name"> -->
                        <!-- <input type="text" name="lname" placeholder="last name">  -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        client id
                    </div>
                    <div class="col-lg-9">
                    <?php echo $_SESSION['c_id'] ;?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        coupon menu
                    </div>
                    <div class="col-lg-9">
                    <?php echo $_SESSION['coupon_id'] ;?>
                    <?php 
                         if (empty($_SESSION['coupon_id'])){
                            echo "-----";
                        }else{
                            echo $Selected_coupon['coupon_name'];
                        }
                        ?>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        regular menu
                    </div>
                    <div class="col-lg-9">
                    <?php echo $_SESSION['service_id'] ;?>
                    <?php 
                        if (empty($_SESSION['service_id'])){
                            echo "-----";
                        }else{
                            echo $selected_service['service_name'];
                        }
                    ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        nomination
                    </div>
                    <div class="col-lg-9">
                    <?php 
                            if (empty($_SESSION['nomination'])){
                                echo "-----";
                            }else{
                                echo $_SESSION['nomination'];
                            }
                        ?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        price
                    </div>
                    <div class="col-lg-9"> 
                        ¥<?php 
                            if(!empty($Selected_coupon['coupon_price'] and $selected_service['price'])){
                                    echo $Selected_coupon['coupon_price']."+".$selected_service['price'];
                                    $total = $Selected_coupon['coupon_price']+$selected_service['price'];
                                    echo "=".$total;
                                }elseif(!empty($Selected_coupon['coupon_price'])){
                                    $total = $Selected_coupon['coupon_price'];
                                    echo $total;
                                }elseif(!empty($selected_service['price'])){
                                    $total = $selected_service['price'];
                                    echo $total;
                                }
                        ?>
                    </div>
                </div>
                
                <?php if(empty($_SESSION['service_id']) AND (empty($_SESSION['coupon_id']))):?>
                   <div class="alert alert-warning w-50 mx-auto">
                        <a href="reserve_by_admin.php" class="btn w-100">select menu</a>
                   </div>
                <?php else:?>
                    <form action="hairsalonAction.php" method="post"> 
                            <!-- hairsalonAction.php -->
                            <input type="hidden" name="total" value="<?php echo $total ;?>" required>
                            <button type="submit" name="reserve_by_admin2" class="btn btn-dark btn-block mt-5 w-75 mx-auto">submit</button>
                    </form>
                <?php endif; ?>
              </div>
              <!-- /card-body -->
          </div>
          <!-- /card -->
      </div>
    <!-- footer -->
    <nav class="nav navbar bg-dark fixed-bottom">
      <a href="dashboard.php" >Home</a>
      <p class="text-light">Copyright@ Yuka Matsumoto</p>
      <a href="contactpage.php">Contact</a>      
    </nav>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>