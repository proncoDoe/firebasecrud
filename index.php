<?php include './header.php' ?>
<?php include './nav.php' ?>
<?php require 'config.php' ?>
<?php session_start(); ?>

<?php //echo phpinfo();?>

<div class="container">


    <div class="row">

        <div class="col-12">

            <div class="jumbotron">

                <h1 class="text-center">Firebase Php Crud</h1>

                <a href="insert.php" class="btn btn-outline-primary">Add Data</a>

            </div>


        </div>



        <div class="container">


            <div class="row">

                <div class="col-12">

                    <?php 



if(isset($_SESSION['add']) && $_SESSION['add'] != ""){


    ?>

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?php echo  $_SESSION['add']; ?>!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <?php


    unset($_SESSION['add']);

}






   
   if(isset($_SESSION['status']) && $_SESSION['status'] != ""){


	   ?>

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?php echo  $_SESSION['status']; ?>!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <?php


	   unset($_SESSION['status']);

   }



   if(isset($_SESSION['delete']) && $_SESSION['delete'] != ""){


    ?>

                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong><?php echo  $_SESSION['delete']; ?>!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>



                    <?php


    unset($_SESSION['delete']);

}

   
   ?>



                    <?php 
  
  if(isset($_POST['delete_data'])){

      $token = $_POST['ref_token_delete'];

      $ref = "users/".$token;
      $delete_data = $database->getReference($ref)->remove();

      if($delete_data){

          $_SESSION['delete'] = "User deleted successfully";
          header('location: index.php');
      }else{
          $_SESSION['delete'] = "User not successfully deleted";
          header('location: index.php');
      }

  }


?>


                </div>
            </div>



            <div class="row">

                <div class="col-md-12">

                    <div class="card card-header">


                        <table class="table  table-striped table-borderless table-responsive-lg">

                            <thead>

                                <tr>

                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <td class="text-right">
                                        <div class="">


                                            <?php 
                    
                    $ref = "users";
                    $totalRecord =  $database->getReference($ref)->getSnapshot()->numChildren();

                    
                    ?>

                                            <a href="#" class="btn btn-warning text-white py-2">Total record:
                                                <?php echo $totalRecord ?></a>
                                        </div>
                                    </td>
                                </tr>

                            </thead>


                            <tbody>

                                <?php  
                    

                     $ref = "users";
                    $fetchdata =  $database->getReference($ref)->getValue();

                    if($fetchdata > 0){

                    $i = 0;
                    foreach($fetchdata as $key => $row){
                      
                        $i++;
                        
                    ?>

                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['fname']; ?></td>
                                    <td><?php echo $row['lname']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td class="btn btn-group">

                                        <a href="edit.php?token=<?php echo $key  ?>"
                                            class="btn btn-outline-info edit">Edit</a>


                                        <a href="show.php?detail=<?php echo $key  ?>"
                                            class="btn btn-outline-success detail">Detail</a>


                                        <form action="index.php" method="POST">

                                            <input type="hidden" name="ref_token_delete" value="<?php echo $key ?>">
                                            <button type="submit" name="delete_data"
                                                class="btn btn-outline-danger">Delete</button>

                                        </form>

                                    </td>

                                </tr>

                                <?php

                      }

                      
                    }else{

                        echo '<p class="text-center font-weight">No data is available now<p/>';
                    }

                    ?>

                            </tbody>

                        </table>


                    </div>

                </div>



            </div>

        </div>





        <?php include './footer.php' ?>