<?php require 'config.php' ?>
<?php session_start(); ?>

<?php include 'header.php' ?>



<?php 

     if(isset($_POST['register'])){

        $name =  $_POST['name'];
        $username =  $_POST['username'];
        $email = $_POST['email'];
        $phone = "+234".$_POST['phone'];
        $password = $_POST['password'];
        // $comfirm_password = $_POST['comfirm_password'];
        
    
        $userProperties = [

            'name' => $name,
            'email' => $email,
            'emailVerified' => false,
            'phone' => $phone,
            'password' => $password,
            'username' => $username,
        ];
        
        $createdUser = $auth->createUser($userProperties);


      if($createdUser){

        $_SESSION['status'] = "User register successfully";
        header('location: register.php');
        
    }else{

        $_SESSION['status'] = "User not register successfully";
        header('location: register.php');

    }

    }
      

?>

<div class="container my-5">

    <div class="row justify-content-center">


        <div class="col-md-6">



            <div class="card card-header my-3">

                <div class="text-right my-2">
                    <a href="login.php" class=" font-weight-bold btn btn-outline-primary">Login</a>
                </div>

                <form action="register.php" method="post">

                    <div class="form-group">

                        <input type="text" name="name" class="form-control" placeholder="Name...">

                    </div>

                    <div class="form-group">

                        <input type="text" name="username" class="form-control" placeholder="Username">

                    </div>

                    <div class="form-group">

                        <input type="email" name="email" class="form-control" placeholder="Email">

                    </div>


                    <div class="form-group">

                        <input type="text" name="phone" class="form-control" placeholder="Phone...">

                    </div>


                    <div class="form-group">

                        <input type="text" name="password" class="form-control" placeholder="Password...">

                    </div>


                    <!-- <div class="form-group">

                        <input type="text" name="comfirm_password" class="form-control"
                            placeholder="comfirm_password...">

                    </div> -->


                    <div class="form-group">

                        <button type="submit" class="bn btn-info text-white btn-block" name="register"
                            value="register">Register</button>

                    </div>

                </form>

                <div class="col-md-4"><a href="index.php" class="btn btn-outline-warning ">back to home</a></div>

            </div>


        </div>


    </div>


</div>



<?php include 'footer.php' ?>