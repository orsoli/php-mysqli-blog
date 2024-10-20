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

    // Create new table
    $sqlCreateTable = "CREATE TABLE IF NOT EXISTS post(
            id BIGINT AUTO_INCREMENT PRIMARY KEY,  -- Blog ID
            title VARCHAR(255) NOT NULL,           -- Post Title
            media_url TEXT NOT NULL,                -- blog media
            content TEXT NOT NULL,                 -- Blog content
            post_description TEXT                  -- Description
            )";

    $conn->query($sqlCreateTable);


    // Insert data
    $sql_insert_data = "INSERT INTO post (id,title, media_url, content, post_description) 
                         VALUES ('1','Saranda', 'https://videos.pexels.com/video-files/20175489/20175489-uhd_2560_1440_24fps.mp4', 'Discover Saranda: The Gem of Southern Albania', 'Nestled along the breathtaking Ionian coast, Saranda is a charming seaside town located in the southernmost part of Albania. With its stunning beaches, vibrant nightlife, and rich history, Saranda has become a must-visit destination for travelers seeking a mix of relaxation and adventure.'),('2','Ksamil', 'https://img.freepik.com/free-photo/drone-aerial-view-ancient-stageira-city-halkidiki-greece_1268-16134.jpg?t=st=1729430361~exp=1729433961~hmac=c88283074cf27628894ee83ed987900a6c371028073ed5e952d1ff6c71520f8d&w=1480', 'Ksamil: Albania s Hidden Paradise', 'Tucked away on the southern coast of Albania, Ksamil is a true hidden gem that boasts some of the most stunning beaches in the Mediterranean. Located just a few kilometers from Saranda, Ksamil is part of Butrint National Park and offers an ideal escape for those seeking pristine beaches, crystal-clear waters, and a peaceful atmosphere.'),('3','Permet', 'https://www.pexels.com/photo/kadiut-bridge-in-albania-16658690/', 'Explore the Wonders of Southern Albania: Përmet, Berat, and Gjirokastër', 'Southern Albania is rich with stunning landscapes, historical cities, and authentic Albanian culture. Among the must-visit destinations in this region are Përmet, Berat, and Gjirokastër—three cities that offer a perfect blend of history, nature, and unique experiences for travelers.'),('4','Berat', 'https://images.pexels.com/photos/20732645/pexels-photo-20732645/free-photo-of-townscape-of-berat-in-albania-in-evening.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'Berat: The City of a Thousand Windows', 'Berat is one of Albania s oldest and most picturesque towns, often called “The City of a Thousand Windows” due to the numerous Ottoman-era houses with large windows that seem to watch over the city. A UNESCO World Heritage site, Berat is a perfect blend of history, culture, and architecture.'),('5','Gjirokaster', 'https://www.pexels.com/photo/street-with-cafes-in-gjirokaster-13887113/', 'Gjirokastër: The Stone City', 'Known as The Stone City, Gjirokastër is another UNESCO World Heritage site and one of Albania’s most charming and historically rich destinations. With its well-preserved Ottoman-era buildings, cobblestone streets, and imposing castle, Gjirokastër transports visitors to a different era.')
                         ";

    // Check the errors
    if($conn->query($sql_insert_data) === TRUE){
        echo "New data record created succesfully";
    }else {
        echo "Error: " . $conn->error ;
    }

    // Query
    $sql = "SELECT *
            FROM post";
    // Close connection
    $conn -> close();
?>