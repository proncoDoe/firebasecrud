 <?php require 'config.php' ?>
 <?php session_start(); ?>

 <?php include 'header.php' ?>
 <?php   use Google\Cloud\Core\Timestamp;?>



 <?php 

     if(isset($_POST['save_data'])){

        $fname =  $_POST['fname'];
        $lname =  $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $stamp = new Timestamp(new DateTime());
    
        $data = [
    
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'phone' => $phone,
            'created_at' => $stamp
           
    
        ];

    $ref = "users";
    $postdata =  $database->getReference($ref)->push($data);


      if($postdata){

        $_SESSION['add'] = "User add successfully";
        header('location: index.php');
        
    }else{

        $_SESSION['add'] = "User not added successfully try again";
        header('location: insert.php');

    }

    }
      

?>

 <div class="container">



     <div class="row">

         <div class="col-12">

             <?php 
   
   if(isset($_SESSION['status']) && $_SESSION['status'] != ""){


	   ?>

             <div class="alert alert-warning alert-dismissible fade show" role="alert">
                 <strong><?php echo  $_SESSION['status']; ?>!</strong>
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>

             <?php


	   unset($_SESSION['status']);

   }

   
   ?>

         </div>
     </div>



     <div class="row justify-content-center">


         <div class="col-md-6">

             <div class="card card-header my-3">


                 <form action="insert.php" method="post">

                     <div class="form-group">

                         <input type="text" name="fname" class="form-control" placeholder="First Name">

                     </div>

                     <div class="form-group">

                         <input type="text" name="lname" class="form-control" placeholder="Last Name">

                     </div>

                     <div class="form-group">

                         <input type="email" name="email" class="form-control" placeholder="Email">

                     </div>


                     <div class="form-group">

                         <input type="text" name="phone" class="form-control" placeholder="Phone number">

                     </div>


                     <div class="form-group">

                         <button type="submit" class="bn btn-info text-white btn-block" name="save_data"
                             value="Save Data">Save Data</button>

                     </div>

                 </form>

                 <div class="col-md-4"><a href="index.php" class="btn btn-outline-warning ">back to home</a></div>

             </div>


         </div>


     </div>


 </div>



 <?php include 'footer.php' ?>