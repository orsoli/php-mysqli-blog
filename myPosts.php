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
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <!-- Header  -->
    <header class="bg-danger">
        <!-- Navbar  -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="#">MySQL</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="title text-center text-light p-4">
            <h1>BLOG_</h1>
        </div>
    </header>
    <!-- Container  -->
    <div class='container my-3'>
        <?php foreach($post as $postInfo){ ?>
        <div class="card mb-3 shadow">
            <img src="<?= $postInfo["media_url"] ?>" class="card-img-top" alt="<?= $postInfo["title"] ?>"
                style="height: 400px; object-fit: cover;">
            <h1 class="text-center py-3"><?= $postInfo["title"] ?></h1>
            <div class="card-body">
                <h4 class="card-title"><?= $postInfo["content"] ?></h4>
                <p class="card-text"><?= $postInfo["post_description"] ?></p>
                <h4 class="card-title"><?= $postInfo["subtitle1"] ?></h4>
                <p class="card-text"><?= $postInfo["subtitle1_description"] ?></p>
                <h4 class="card-title"><?= $postInfo["subtitle2"] ?></h4>
                <p class="card-text"><?= $postInfo["subtitle2_description"] ?></p>
                <h4 class="card-title"><?= $postInfo["subtitle3"] ?></h4>
                <p class="card-text"><?= $postInfo["subtitle3_description"] ?></p>
                <h4 class="card-title"><?= $postInfo["subtitle4"] ?></h4>
                <p class="card-text"><?= $postInfo["subtitle4_description"] ?></p>
                <p class="card-text">
                    <small class="text-body-secondary">
                        Last updated:<?= $postInfo["created_at"]?>
                    </small>
                </p>
            </div>
        </div>
        <?php } ?>
    </div>
</body>

</html>