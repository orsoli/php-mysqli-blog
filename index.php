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
            media_url TEXT NOT NULL,               -- blog media
            content TEXT NOT NULL,                 -- Blog content
            post_description TEXT,                -- Description
            subtitle1 TEXT,
            subtitle1_description TEXT,
            subtitle2 TEXT,
            subtitle2_description TEXT,
            subtitle3 TEXT,
            subtitle3_description TEXT,
            subtitle4 TEXT,
            subtitle4_description TEXT,
            subtitle5 TEXT,
            subtitle5_description TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";

    $conn->query($sqlCreateTable);


    // Insert data
    $sql_insert_data = "INSERT INTO post (title, media_url, content, post_description, subtitle1, subtitle1_description, subtitle2, subtitle2_description, subtitle3, subtitle3_description, subtitle4, subtitle4_description) 
                         VALUES ('South ALBANIA', 'https://img.freepik.com/free-photo/aerial-shot-sea-forest-marmaris-boncuk-bay-turkey_181624-48239.jpg?t=st=1729457634~exp=1729461234~hmac=959702d75d15f752cdf5d8c6809a0322677fa49667c4974dc7672f6b1ef60bdd&w=1480', 'Discover Southern Albania: A Land of Untouched Beauty and Rich History', 'Southern Albania is a region of incredible diversity, where rugged mountains meet the crystal-clear waters of the Ionian Sea, and ancient cities stand as timeless reminders of the countr s rich history. Whether youre seeking adventure, culture, or relaxation, Southern Albania offers something for every type of traveler. From its pristine beaches to its UNESCO World Heritage sites, this part of Albania is a hidden gem waiting to be explored.', 
                         
                         'The Albanian Riviera: A Coastal Paradise', 
                         
                         'The crown jewel of Southern Albania \nis the Albanian Riviera, a stretch of coastline along the Ionian Sea that rivals the beauty of more famous Mediterranean destinations. \nFrom Dhërmi \nto Himara, the Riviera \nis dotted \nwith secluded coves, crysta-\nclear waters, \nand charming villages.

                        \nTop Spots \non the Albanian Riviera:

                        1. Ksamil: Often called Albania s own slice of paradise, Ksamil \nis famous \nfor its white sandy beaches \nand turquoise waters. The small islands just offshore offer a perfect spot \nfor a \nday of swimming \nand relaxation.
                        2. Porto Palermo: This quiet bay \nis home \nto the historic Ali Pasha Castle, built \non a small peninsula. It s a perfect \nstop \nfor history lovers \nand those looking \nto escape the more crowded beaches.
                        3. Llogara Pass: \nAs you drive along the coast, the breathtaking views \nfrom Llogara Pass will leave you speechless. It s one of the most scenic routes \nin Albania, \nwhere the mountains \ndrop dramatically \ninto the sea below.', 

                        'Historical and Cultural Treasures', 

                        'Southern Albania \nis \nnot only a paradise \nfor beach lovers but also a treasure trove of history \nand culture. Two of Albania s most famous UNESCO World Heritage cities—Berat \nand Gjirokastër—are located here, offering visitors a chance \nto explore centuries-old architecture, castles, \nand museums.

                        Must-Visit Historic Sites:

                        1. Butrint National Park: An ancient city that dates back \nto the Greek \nand Roman periods, Butrint \nis a UNESCO World Heritage \nsite that offers visitors a glimpse \ninto Albania s ancient past. The ruins are beautifully preserved, \nset against the backdrop of the surrounding wetlands.
                        2. Gjirokastër: Known \nas “The Stone City,” Gjirokastër \nis famed \nfor its Ottoman-style architecture \nand impressive castle. The city s cobbled streets \nand traditional houses \ncreate an atmosphere that feels \nlike stepping back \nin \ntime.
                        3. Berat: Also known \nas “The City of a Thousand \nWindows,” Berat \nis a fascinating blend of Byzantine \nand Ottoman architecture. Its hilltop castle \nand charming old town make it one of Albania s most beautiful \nand historically rich destinations.', 

                        'Natural Wonders', 

                        'Southern Albania \nis blessed \nwith breathtaking natural landscapes, \nfrom majestic mountains \nto serene rivers \nand springs.


                        \nTop Natural Attractions:

                        1. Blue Eye (Syri i Kaltër): A natural spring \nwith crystal-\nclear, vibrant blue waters, the Blue Eye \nis a must-visit \nfor nature lovers. Surrounded \nby lush greenery, this \nhidden gem offers a tranquil escape \nfrom the heat of the summer.
                        2. Vjosa River: Known \nas Europe s l\nast wild river, the Vjosa flows freely through Southern Albania, offering opportunities \nfor river rafting, kayaking, \nor simply taking \nin the untouched beauty of its surroundings.
                        3. Osumi Canyon: Located near Berat, Osumi Canyon \nis a stunning natural wonder, \nwith steep cliffs \nand a winding river. Adventurers can explore the canyon \nby boat \nor hike along its scenic paths.',
                        
                        'Why Visit Southern Albania?',
                        'Southern Albania remains one of Europe s last undiscovered travel destinations. Its stunning landscapes, rich cultural heritage, and warm hospitality make it a perfect destination for travelers seeking an authentic, off-the-beaten-path experience. Whether you re lounging on the beach, exploring ancient ruins, or tasting the local cuisine, Southern Albania promises an unforgettable journey through one of the Mediterranean s hidden treasures.'
                        )
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