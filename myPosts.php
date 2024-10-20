<?php
    // Define constants
    define("DATABASE_PATH","localhost:8889");
    define("DATABASE_USERNAME","root");
    define("DATABASE_PASSWORD","root");
    define("DATABASE_NAME", "db_blog");

    // Create connection to db
    $conn = mysqli_connect(DATABASE_PATH, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME); 
    
    // Check conection
    if(!$conn){
        die("Connection faild" . mysqli_connect_error());
    }

    // Query
    $sql = "SELECT *
            FROM post";

    // The result
    $response = $conn -> query($sql);

    // Take the rows for every response if this exist
    if($response && $response -> num_rows > 0){
        $post; // Store students
        while($dbrow = $response -> fetch_assoc()){
            $post[] = $dbrow;
            var_dump($post);
        };
    }
    $conn -> close();
    ?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <!-- Meta data  -->
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='author' content='Orsol Filaj'>
    <meta name='description' content='Php Mysqli Blog'>
    <!-- Title  -->
    <title>Php Mysqli Blog</title>
    <!-- Link Bootstrap Css -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'>
    <!-- Link Bootstrap icons  -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css'>
    <!-- Link font Awesome  -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css'
        integrity='sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=='
        crossorigin='anonymous' referrerpolicy='no-referrer'>

</head>

<body>
    <!-- Container  -->
    <div class='container mx-auto py-4'>
        <?php foreach($post as $postInfo){ ?>
        <h2>
            Title: <?= $postInfo["title"] ?>
        </h2>
        <h4>
            Post Description: <?= $postInfo["content"] ?>
        </h4>
        <?php } ?>
    </div>
</body>

</html>