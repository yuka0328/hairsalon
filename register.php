<!doctype html>
<html lang="en">
  <head>
    <title>Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>        
        body{
          margin-top:100px;
          height: 700px;
          background-image: url(asset/logo1.jpg);
          background-repeat: no-repeat;
          background-attachment: fixed;
          background-position: center center;
          background-size :cover ;
  
        }
        div p, div h3{
          font-family: 'Oleo Script', cursive;
        }
        #title{
          background-color: rgba(255, 255, 255, 0.5);

        }
      </style>
       <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script&display=swap" rel="stylesheet">
    
  
  </head>
  <body>

    <div class="container text-monospace">
        <div class="w-50 mx-auto rounded" id="title">
          <p class="display-4 text-center">Welcome New Guest!</p>
        </div>

        <div class="card w-50 mx-auto" >
            <div class="card-header text-center">
                <h3>Registration</h3>
            </div>
            <div class="card-body">
                <form action="hairsalonAction.php" method="post">
                    <label for="">First name :</label>
                    <input type="text" name="fname" id="" class="form-control" placeholder="名前" required><br>
                    
                    <label for="">Last name :</label>
                    <input type="text" name="lname" id="" class="form-control" placeholder="苗字" required> <br>


                    <label for="">Gender :</label>
                    <select name="gender" id="" class="form-control">
                        <option value="none">性別を選んでください</option>
                        <option value="male">Male</option>
                        <option value="femal">Female</option>
                    </select><br>
               

                    <label for="">Telephone number 電話番号（数字のみ）:</label>
                    <input type="number" name="telephone" id="" class="form-control" placeholder="" required><br>
                    
            

                    <label for="">Email : </label>
                    <input type="email" name="email" id="" class="form-control" placeholder="メールアドレス name@test" required><br>
               

                    <label for="">Password :</label>
                    <input type="password" name="password" id="" class="form-control" placeholder="パスワード" required><br>
              
                    <div class="text-center mb-3">
                      <button type="submit" name="register" class="form-control btn btn-dark w-75 mt-3">Register</button>                
                    </div>
                </form>
            </div>
        </div>
        <div class="text-center mt-2">
          <a href="login.php" class="btn btn-outline-dark">Login</a>
        </div>
    </div>
     <!-- footer -->
    <nav class="nav navbar bg-dark mt-5">
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