<?php require 'config.php' ?>
<?php session_start(); ?>

<?php include 'header.php' ?>



<?php 

$detail = $_GET['detail'];

$ref = "users/";
$getdata = $database->getReference($ref)->getChild($detail)->getValue();


?>

<div class="container">


    <div class="row justify-content-center">

        <div class="col-8">


            <div class="card my-5">

                <div class="card-header bg-primary">

                    <div class="col-6 offset-11">

                        <i class="fas fa-info-circle"></i>

                    </div>

                </div>

                <div class="card-body">

                    <span>
                        <h3><?php echo $getdata['fname']?> <?php echo $getdata['lname']?></h3>
                    </span>
                    <hr>

                    <h4><?php echo $getdata['email']?> </h4>

                    <hr>

                    <h5><?php echo $getdata['phone']?> </h5>

                </div>

                <div class="col-md-4 offset-10">

                    <a href="index.php" class="btn btn-outline-warning">Back</a>

                </div>
            </div>


        </div>



    </div>



</div>




<?php include 'footer.php' ?>