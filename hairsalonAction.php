<?php
include 'classes/Hairsalon.php';

$Hairsalon= new Hairsalon;

// register.php
if(isset($_POST['register'])){
    $fname =$_POST['fname'];
    $lname =$_POST['lname'];
    $gender = $_POST['gender'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $Hairsalon ->registerUser($email,$password,$fname,$lname,$gender,$telephone);


}

// login.php
elseif(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $Hairsalon->login($email,$password);

}


// testimonial.php
elseif(isset($_POST['review'])){
    $nickname=$_POST['nickname'];
    $date=$_POST['date'];
    $rating=$_POST['rating'];
    $comment=$_POST['comment'];

    $photoName = $_FILES['photo']['name'];
    $loginid=$_SESSION['loginid'];
    
    $Hairsalon->review($nickname,$date,$rating,$comment,$photoName,$loginid);
}




// booking3.php








// ----------------------------------------------------------------------------
// For admin

// admin.php

elseif(isset($_POST['submit'])){
    $news= $_POST['news'];
    $date= $_POST['date'];

    $Hairsalon->addNews($news,$date);
}

// addCatalog.php
elseif(isset($_POST['upload'])){
    $c_photo=$_FILES['catalog_photo']['name'];
    $c_comment=$_POST['catalog_comment'];
    $photo_stylist = $_POST['photo_stylist'];

    $Hairsalon->uploadCatalog($c_photo, $c_comment,$photo_stylist);

}






// addStaff.php
elseif(isset($_POST['input'])){
    $s_name=$_POST['staff_name'];
    $position =$_POST['position'];
    $skill = $_POST['skill'];
    $s_gender = $_POST['staff_gender'];
    $staffPhoto = $_FILES['s_photo']['name'];
    $s_bio = $_POST['bio'];

    $Hairsalon->addStaff($s_name,$position,$s_gender,$staffPhoto,$s_bio);

    $skillCount = count($skill);

    // print_r($skill);
    // echo $skillCount;

    for($x = 0; $x< $skillCount; $x++){
        $Hairsalon->addstaffskills($skill[$x]);
    }

    header('location:addStaff.php');

}


// addService.php
elseif(isset($_POST['menuInput'])){
    $menuName= $_POST['menuName'];
    $menuPrice=$_POST['menuPrice'];

    $Hairsalon->addServiceMenu($menuName,$menuPrice);

}
elseif(isset($_POST['couponInput'])){
    $couponName = $_POST['couponName'];
    $couponPrice = $_POST['couponPrice'];

    $Hairsalon->addCouponMenu($couponName,$couponPrice);

}


// editStaff.php
elseif(isset($_POST['editStaff'])){
    $staffID = $_POST['staff_id'];
    $s_name=$_POST['staff_name'];
    $position =$_POST['position'];
    // $skill = $_POST['skill'];
    $s_gender = $_POST['staff_gender'];
    $staffPhoto = $_FILES['s_photo']['name'];
    $s_bio = $_POST['bio'];

    $Hairsalon->editStaff($s_name,$position,$s_gender,$staffPhoto,$s_bio,$staffID);



    // $skillCount = count($skill);

    // // print_r($skill);
    // // echo $skillCount;

    // for($x = 0; $x< $skillCount; $x++){
    //     $Hairsalon->addstaffskills($skill[$x]);
    // }

    // header('location:addStaff.php');

}

elseif(isset($_POST['editCatalog'])){
    $c_photo=$_FILES['catalog_photo']['name'];
    $c_comment=$_POST['catalog_comment'];
    $p_stylist = $_POST['photo_stylist'];
    $catalogID = $_POST['catalog_id'];

$Hairsalon->editCatalog($c_photo,$c_comment,$p_stylist,$catalogID);

}
elseif(isset($_POST['send'])){
    $comment_content = $_POST['content'];
    $user = $_POST['fname'];
    $loginid =$_SESSION['loginid'];
    $id  = $_POST['catalog_id'];

    // echo $comment_content;
    // echo "<br>";
    // echo $user;
    // echo "<br>";
    // echo $loginid ;
    // echo "<br>";
    // echo $id;
    
    $Hairsalon->addComment($comment_content,$user,$id,$loginid);

}

elseif(isset($_POST['addCoupon'])){
    $_SESSION['coupon']=$_POST['coupon'];
    $_SESSION['coupon_price'] = $_POST['coupon_price'];

    // echo  $_SESSION['coupon'];
    // echo "<br>";
    // echo   $_SESSION['coupon_price'];
    if(!empty($_SESSION['coupon']) AND !empty($_SESSION['coupon_price'])){
        header('location:booking2.php');
    }
  }
elseif(isset($_POST['addServiceMenuNow'])){
    $_SESSION['service_id']=$_POST['menu_id'];
    $_SESSION['price'] = $_POST['menu_price'];

    // echo  $_SESSION['service_id'];
    // echo "<br>";
    // echo   $_SESSION['price'];
    if(!empty($_SESSION['service_id']) AND !empty($_SESSION['price'])){
        header('location:booking2.php');
    }
  }elseif(isset($_POST['addBooking2'])){

    $_SESSION['booking2_id']=$_POST['booking2_id'];
    $_SESSION['booking2_price'] = $_POST['booking2_price'];

    // echo  $_SESSION['booking2_id'];
    // echo "<br>";
    // echo   $_SESSION['booking2_price'];
    if(!empty($_SESSION['booking2_id']) AND !empty($_SESSION['booking2_price'])){
        header('location:booking3.php');
    }

  }

    











?>




