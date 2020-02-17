<!-- function page -->
<?php
include 'connection.php';

class Hairsalon extends Connection{

// register 
function registerUser($email,$password,$fname,$lname,$gender,$telephone){
    $sql1 = "INSERT INTO login(email,password) VALUES('$email','$password')";
    $result1 = $this->conn->query($sql1);

    if($result1 ==TRUE){
        $loginid = $this->conn->insert_id;
        $sql2 = "INSERT INTO client(fname,lname,c_gender,telephone,login_id) VALUES('$fname','$lname','$gender','$telephone','$loginid')";

        $result2= $this->conn->query($sql2);

            if($result2==FALSE){
                echo "insert into client failed";
            }else{
                header('location:login.php');
            }

    }else{
        echo "insert into login table is failed";

    }

}

// login
function login($email,$password){
    $sql="SELECT * FROM login WHERE email ='$email' AND password ='$password'";
    $result = $this->conn->query($sql);

    if($result->num_rows==1){
        $row=$result->fetch_assoc();
        $_SESSION['loginid'] = $row['login_id'];

        if($row['status']=='A'){
            header('location:admin.php');
        }else{

            header('location:dashboard.php');

        }

    }else{
        echo "user does not exist! Please register first... ";
        
    }
}





// userMenu.php
    //client table 
function getOneUser($loginid){
    $sql = "SELECT * FROM client WHERE login_id='$loginid' ";
    $result = $this->conn->query($sql);
    if($result == FALSE){
        die('can not get one user'.$this->conn->connect_error);

    }else{
        return $result ->fetch_assoc();
    }
}


// testimonial.php
function review($nickname,$date,$rating,$comment,$photoName,$loginid){
    $target_dir ='upload/';
    $target_file= $target_dir.basename($photoName);
    
    $sql="INSERT INTO review(nickname,date,rating,comment,photo,login_id) VALUES('$nickname','$date','$rating','$comment','$photoName','$loginid')";
    $result = $this->conn->query($sql);

    if($result==FALSE){
        echo "review error";
    }else{
        move_uploaded_file($_FILES['photo']['tmp_name'],$target_file);
        header('location:testimonial.php');

    }
}
function displayReviewList(){
    $sql="SELECT * FROM review ORDER BY review_id DESC";
    $result=$this->conn->query($sql);

    if($result->num_rows>0){
        while($rows = $result->fetch_assoc()){
            $row[]=$rows;

        }return $row;
    }else{
        return FALSE;

    }

}

//hairCatalog.php reaction of photos
function addComment($comment,$comment_user,$catalogID,$userID){
    $result = $this->conn->query("insert into catalog_comment(comment,user,catalog_id,user_id)VALUES('$comment','$comment_user','$catalogID','$userID')");

    if(empty($userID == 1)){
       header('location:guest.php');

    }else{
        if($result==FALSE){
            die($this->conn->error);
        }else{
            header('location:hairCatalog.php');
        }
    }
    

}

function displayCatalogComment($catalogID){
    $sql="SELECT * FROM catalog_comment WHERE catalog_id ='$catalogID'";
    $result =$this->conn->query($sql);

    if($result->num_rows>0){
        while($rows =$result->fetch_assoc()){
            $row[]=$rows;
        }return $row;
    }else{
        return FALSE;
    }
}











// ----------------------------------------------------------------------------
// For admin

// admin.php
function addNews($news,$date){
    $sql="INSERT INTO info(news,date) VALUES('$news','$date')";
    $result = $this->conn->query($sql);

    if($result=FALSE){
      die('insert into info failed'.$conn->connect_error);
    }else{
      header("location:dashboard.php");
    }
}

function displayNews($news,$date){
    $sql="SELECT * FROM info ORDER BY info_id DESC";
    $result= $this->conn->query($sql);

    if($result->num_rows>0){
        $row=array();
        while($rows=$result->fetch_assoc()){
            $row[]=$rows;
        }
        return $row;
    }else{
        return FALSE;
        
    }
}



// addStaff.php
public function addstaffskills($skill){
    $sql1 = "SELECT MAX(staff_id) FROM staff";
    $result1 = $this->conn->query($sql1);
 
     if($result1->num_rows == 1){
     $row = $result1->fetch_assoc();
     $staffID = $row['MAX(staff_id)'];
 
         $sql2 = "INSERT INTO staffs_skills(user_id,skill_name)VALUES('$staffID','$skill')";
         $result2 = $this->conn->query($sql2);
 
             if($result2 == false){
                      echo "error sql 2";
             }
             else{
                       echo "working";
             }
     }else{
         echo "error sql 1";
     }
 
 }



//addStaff.php
function displaySkill(){
    $sql="SELECT * FROM skill";
    $result =$this->conn->query($sql);
    
    if($result->num_rows >0 ){
        // $row = array();
        while($rows =$result->fetch_assoc()){
            $row[]=$rows;
        }
        return $row;
    }else{
        return FALSE;
    }
}
function addStaff($s_name,$position,$s_gender,$staffPhoto,$s_bio){
    $target_dir ='upload/admin/';
    $target_file= $target_dir.basename($staffPhoto);
    
    $sql = "INSERT INTO `staff`(`staff_name`, `position`,`staff_gender`, `staff_photo`, `staff_bio`) VALUES ('$s_name','$position','$s_gender','$staffPhoto','$s_bio')";
    $result = $this->conn->query($sql);

    if($result = FALSE){
        die($this->conn->error);
    }else{
        move_uploaded_file($_FILES['s_photo']['tmp_name'],$target_file);
       
    }
}
function displayStaff(){
    $sql="SELECT * FROM staff ";   //ORDER BY staff_id DESC
    $result=$this->conn->query($sql);

    if($result->num_rows>0){
        // $row=array();
        while($rows =$result->fetch_assoc()){
            $row[]=$rows;
        }
        return $row;
    }else{
        return FALSE;
    }
}




// staffpage.php
public function getStaffSkills($id){
    // $sql = "SELECT skill_name,user_id FROM staff INNER JOIN staffs_skills WHERE staffs_skills.user_id = '$id'";

    $sql = "SELECT skill_name FROM staffs_skills INNER JOIN staff ON staffs_skills.user_id=staff.staff_id WHERE user_id = '$id'";
    
    $result = $this->conn->query($sql);

    if($result->num_rows>0){
        $row = array();
        while($rows = $result->fetch_assoc()){
            $row[] = $rows;
        }
        return $row;
    }else{
        return FALSE;
    }
}




// editStaff.php
function getForEditstaff($staffID){
    $sql= "SELECT * FROM staff WHERE staff_id=$staffID";
    $result= $this->conn->query($sql);

        if($result ==FALSE){
            die('cannot get one staff_id'.$this->conn->connect_error);

        }else{
            return $result->fetch_assoc();
        }

}

function editStaff($s_name,$position,$s_gender,$staffPhoto,$s_bio,$staffID){
    $target_dir ='upload/admin/';
    $target_file= $target_dir.basename($staffPhoto);
    
    $sql = "UPDATE staff SET staff_name ='$s_name', position='$position',staff_gender='$s_gender', staff_photo= '$staffPhoto', staff_bio='$s_bio' WHERE staff_id='$staffID'";

    $result = $this->conn->query($sql);

    if($result = TRUE){
        move_uploaded_file($_FILES['s_photo']['tmp_name'],$target_file);
        header('location:addStaff.php');
       
    }else{
        die('update skill is error'.$this->conn->error);       
    }
}


function updateStaffSkill(){






}




// addService.php ->ok
function addServiceMenu($menuName,$menuPrice){
$sql="INSERT INTO service(service_name,price) VALUE('$menuName','$menuPrice')";
$result= $this->conn->query($sql);

        if($result ==FALSE){
            die($conn->connect_error);

        }else{
           
            header('location:addService.php');
        }
}
function displayServiceMenu(){
    $sql="SELECT * FROM service";
    $result = $this->conn->query($sql);

    if($result->num_rows>0){
        // $row=array();
        while($rows =$result->fetch_assoc()){
            $row[]= $rows;    
        }
        return $row;

    }else{
        return FALSE;
    }
}

function addCouponMenu($couponName,$couponPrice){
    $sql="INSERT INTO coupon(coupon_name,coupon_price) VALUES('$couponName','$couponPrice')";
    $result = $this->conn->query($sql);

    if($result==FALSE){
        die('input coupon menu failed'.$conn->connect_error);
    }else{
        header('location:addService.php');
    }
    
}
function displayCouponMenu(){
    $sql="SELECT * FROM coupon";
    $result = $this->conn->query($sql);

    if($result ->num_rows>0){
        while($rows = $result->fetch_assoc()){
            $row[]=$rows;
        }
        return $row;
    }else{
        return FALSE;
    }
}
//booking2.php
function getSelectServiceID($selected_sID){
    $sql="select * FROM service WHERE service_id ='$selected_sID'";
    $result=$this->conn->query($sql);

    if($result ==FALSE){
        die('can not get service id'.$this->conn->connect_error);
    }else{
        return $result->fetch_assoc();

    }

}
function getSelectCouponID($selected_cID){
    $sql="select * FROM coupon WHERE coupon_id ='$selected_cID'";
    $result=$this->conn->query($sql);

    if($result ==FALSE){
        die('can not get coupon id'.$this->conn->connect_error);
    }else{
        return $result->fetch_assoc();

    }

}







// addCatalog.php
function uploadCatalog($c_photo, $c_comment,$photo_stylist){
    $target_dir ='upload/admin/catalog/';
    $target_file= $target_dir.basename($c_photo);
    
    $sql = "INSERT INTO catalog(catalog_photo, catalog_comment, photo_stylist) VALUES('$c_photo', '$c_comment','$photo_stylist')";
    
    $result = $this->conn->query($sql);

    if($result = TRUE){
        move_uploaded_file($_FILES['catalog_photo']['tmp_name'],$target_file);
       header ('location:addCatalog.php');
    }else{
        die('add catalog has an error'.$this->conn->error);       
    }

}
function displayCatalog(){
    $sql="SELECT * FROM catalog ORDER BY catalog_id DESC";
    $result =$this->conn->query($sql);

    if($result->num_rows>0){

        while($rows =$result->fetch_assoc()){
            $row[]=$rows;
        }
        return $row;
    }else{
        return FALSE;
    }

    
}

// editCatalog.php
function getCatalogID($catalogID){
    $sql="SELECT * FROM catalog WHERE catalog_id='$catalogID'";
    $result = $this->conn->query($sql);

    if($result ==FALSE){
        die('can not get one photo id'.$this->conn->connect_error);
    }else{
        return $result->fetch_assoc();
    }

}

function editCatalog($c_photo,$c_comment,$p_stylist,$catalogID){
    $target_dir='upload/admin/catalog/';
    $target_file=$target_dir.basename($c_photo);

    $sql = "UPDATE catalog SET catalog_photo='$c_photo', catalog_comment='$c_comment', photo_stylist= '$p_stylist' WHERE catalog_id ='$catalogID' ";

    $result = $this->conn->query($sql);

    if($result == TRUE){
        move_uploaded_file($_FILES['catalog_photo']['tmp_name'],$target_file);
        header ('location:addCatalog.php');
     }else{
         die('edit catalog has an error'.$this->conn->error);       
     }

    
}

// deleteCatalog.php
function deleteCatalog($catalogID){
    $sql="DELETE FROM catalog WHERE catalog_id = '$catalogID'";
    $result=$this->conn->query($sql);

    if($result = FALSE){
        die('deleteing catalog failed'.$this->conn->connect_error);
    }else{
        header('location:addCatalog.php');

    }
}












} //class
?>
