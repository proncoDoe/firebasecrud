<?php
    require __DIR__.'/vendor/autoload.php';
   
    use Kreait\Firebase\Factory;
    use Kreait\Firebase\Auth;
    

    $factory=(new Factory)
        ->withServiceAccount('phpcrud-6f39f-firebase-adminsdk-z1w4s-a90ff17337.json')
        ->withDatabaseUri('https://phpcrud-6f39f-default-rtdb.firebaseio.com/');
    
    $database = $factory->createDatabase();

    $auth = $factory->createAuth();

    
    
?>
<!-- The core Firebase JS SDK is always required and must be listed first -->