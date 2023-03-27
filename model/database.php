<?php
    $dsn ="mysql:host=lyn7gfxo996yjjco.cbetxkdyhwsb.us-east-1.rds.amazonaws.com; dbname=h9qn0xcl4r8iuzig";

    $username = 'stncsn8k0nojfzk8';
    $password = 'hwzjn10g3drfucmo';
    
    try
    {
    $db = new PDO($dsn, $username, $password);

    } 
    catch (PDOException $e) 
    {

    $error_message = 'Database Error!';

    $error_message .= $e->getMessage();

    echo $error_message;

    exit();

    }
?>
