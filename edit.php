 <?php require 'config.php' ?>
 <?php session_start(); ?>

 <?php include 'header.php' ?>



 <?php 

     if(isset($_POST['update_data'])){

        $fname =  $_POST['fname'];
        $lname =  $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $token = $_POST['token'];
    
        $data = [
    
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'phone' => $phone
    
        ];

    $ref = "users/".$token;
    $postdata =  $database->getReference($ref)->update($data);


      if($postdata){

        $_SESSION['status'] = "User update successfully";
        header('location: index.php');
        
    }else{

        $_SESSION['status'] = "User not update successfully try again";
        header('location: edit.php');
      

    }

    }
      

?>


 <?php 

$token = $_GET['token'];

$ref = "users/";
$getdata = $database->getReference($ref)->getChild($token)->getValue();

?>

 <div class="container">

     <div class="row justify-content-center">


         <div class="col-md-6">

             <div class="card card-header my-3">


                 <form action="edit.php" method="post">

                     <input type="hidden" name="token" value="<?php echo $token; ?>">

                     <div class="form-group">

                         <input type="text" name="fname" class="form-control" value="<?php echo $getdata['fname'] ?>"
                             placeholder="First Name">

                     </div>

                     <div class="form-group">

                         <input type="text" name="lname" class="form-control" value="<?php echo $getdata['lname'] ?>"
                             placeholder="Last Name">

                     </div>

                     <div class="form-group">

                         <input type="email" name="email" class="form-control" value="<?php echo $getdata['email'] ?>"
                             placeholder="Email">

                     </div>


                     <div class="form-group">

                         <input type="text" name="phone" class="form-control" value="<?php echo $getdata['phone'] ?>"
                             placeholder="Phone number">

                     </div>


                     <div class="form-group">

                         <button type="submit" class="bn btn-info text-white btn-block" name="update_data"
                             value="Update data">Update data</button>

                     </div>

                 </form>

                 <div class="col-md-4"><a href="index.php" class="btn btn-outline-warning ">back to home</a></div>

             </div>


         </div>


     </div>


 </div>



 <?php include 'footer.php' ?>