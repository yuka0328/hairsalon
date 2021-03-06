<?php
include 'navbar.php';
// echo $_SESSION['loginid'];
$loginid=$_SESSION['loginid'];
// $currentUser = $Hairsalon->getOneUser($loginid);
// echo "loginID =".$loginid;
$myReserveList = $Hairsalon->myReserve($loginid);

$reserveID = $_GET['reserve_id'];
$row = $Hairsalon->getReserveID($reserveID);

$login_email = $Hairsalon->getEmail($loginid);
// echo "login Email:".$login_email['email'];
$email = $login_email['email'];
$myMsgList = $Hairsalon->myMessage($email);
// echo $myMsgList;

$reply_list = $Hairsalon-> displayReply($msgID);
?>
<!doctype html>
<html lang="en">
  <head>
    <title>My page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        /* navbar with bootstrap */
        .menu-container, .header-center ul{
            position: fixed;
            top: 0;
        }
        /* ---------------------------------- */   
        body{
          margin-top:150px;        
          background-image: url(asset/logo1.jpg);
          background-repeat: no-repeat;
          background-attachment: fixed;
          background-position: center center;
          background-size :cover ;
        }
        #title{
            background-color: rgba(255, 255, 255, 0.8);
        }
        #title,.subtitle{
            font-family: 'Oleo Script', cursive;
        }
        #reserve-wrapper{
            width:75%;
            margin:0 auto;
        }
        #table{
            max-height: 300px;
            overflow: scroll;
        }
        .subtitle{
            height: 40px;
            font-size: 35px;
            color:white;
            -webkit-text-stroke: 1px black;
        }
        .subtitle p{
            line-height: 40px;
            margin-left: 10px;
            margin-bottom: 0;
        }
        .subtitle-jp{
            color: black;
            font-size: 18px;
        }
        .icon{
             color:white;
            -webkit-text-stroke: 1px black;
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
            #reserve-wrapper{
                width:90%;
            }
            .subitle{
                height: 30px;
                font-size: 28px;
            }
            .subtitle p{
                line-height: 30px;
            }

        }
        @media(max-width:670px){
            #reserve-wrapper{
                width:100%;
                padding: 15px;
                font-size: 0.8rem;
            }
        }
    </style>
  </head>
  <body>
        <div class="w-75 mx-auto rounded text-center" id="title">
            <h5 class="display-4 p-3">My page</h5>
            <p>マイページ</p>
        </div>
        <div class="mt-5" id="reserve-wrapper">
            <div class="subtitle">
                <p class="subtitle"><i class="fas fa-history"></i>  Resavertion
                <span class="subtitle-jp">予約確認</span></p>
                
            </div>
            <div class="bg-light " id="table">
                <table class="table table-hover">
                    <?php if ($myReserveList > 0 ):?>
                        <thead>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Coupon</th>
                            <th>Menu</th>
                            <th>Stylist</th>
                            <th>Price</th>
                            <th>Option</th>
                        </thead>
                        <?php foreach($myReserveList as $row):?>
                            <?php $reserveID=$row['reserve_id']; ?>
                            <tbody>
                                <td><?php echo $row['reserve_date'];?></td>
                                <td><?php echo $row['reserve_hour'];?></td>
                                <td>
                                    <?php //echo $row['order_menu'];?>
                                <?php 
                                    $selected_cID=$row['order_menu'];
                                    $Selected_coupon =$Hairsalon->getSelectCouponID($selected_cID);
                                    echo $Selected_coupon['coupon_name'];
                                ?>
                                </td>
                                <td><?php 
                                    // echo $row['add_menu'];
                                    $selected_sID=$row['add_menu'];
                                    $selected_service=$Hairsalon->getSelectServiceID($selected_sID);
                                    echo $selected_service['service_name'];
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        if (empty($row['nomination'])){
                                            echo "-----";
                                        }else{
                                            echo $row['nomination'];
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php echo $row['total_price'];?>
                                </td>
                                <td> <a href="editMyReserve.php?reserve_id=<?php echo $reserveID;?>" class="btn btn-secondary">check</a> </td>
                            </tbody>
                        <?php endforeach ;?>
                    <?php else :?>
                            <div class="card-body">
                                <h3>No reservation yet</h3>
                                <p>まだ予約がありません</p> 
                            </div>
                    <?php endif;?>
                </table>
            </div>
            <div class="subtitle mt-5">
                <p class="subtitle"><i class="far fa-envelope"></i> Message <span class="subtitle-jp">メッセージ</span>
                
                <a href="contactpage.php" class="btn btn-outline-dark icon float-right"><i class="fas fa-edit"></i>New</a>
            </p>

                   
            </div>
            <div class="bg-light" id="table">
                <table class="table table-hover">                
                    <div class="div">
                        <?php if($myMsgList > 0):?>
                            <thead>
                                <th>contact_id</th>
                                <th>name</th>
                                <th>message</th>    
                                <!-- <th></th> -->
                                <th></th>
                            </thead>
                            <?php foreach($myMsgList as $msg) :?>
                                <tbody>
                                    <td><?php echo $msg['contact_id'];?></td>
                                    <td><?php echo $msg['contact_name'];?></td>
                                    <td><?php echo $msg['comment']; ?></td>
                                    <!-- <td>
                                        <?php //  $c_id = $msg['contact_id'];
                                        // $countReply = $Hairsalon->countReply($c_id); 
                                            // echo $countReply;
                                        ?>
                                    </td> -->
                                    <td><a href="message_detail.php?contact_id=<?php echo $msg['contact_id'];?>" class="btn btn-dark">Read</a></td>
                                </tbody>
                            <?php endforeach ;?>
                        <?php else :?>
                            <div class="card-body">
                                <h3>No message yet</h3>
                                <p>まだメッセージがありません</p> 
                            </div>
                        <?php endif ;?>
                    </div>
                </table>
            </div>  
            <div class="subtitle mt-5">
                <p class="rounded" id="subtitle"><i class="fas fa-user-cog"></i> Setting
                <span class="subtitle-jp">設定</span></p>
            </div>
            <div class="link bg-light p-3">
                <a href="profile.php" class="btn btn-outline-dark">profileプロフィール</a>
            </div>
        </div>
    <!-- footer -->
    <footer class="">
        <ul>
        <li>
            <a href="dashboard.php">Home</a>
        </li>
        <li>
            <p>Copyright@ Yuka Matsumoto</p>
        </li>
        <li>
            <a href="contactpage.php">Contact</a>
        </li>
        </ul>
    </footer>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>