<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pootis</title>
    <style>
        /* General Styles */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Set the minimum height of the body to 100% of the viewport height */
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            overflow-y: scroll;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        nav ul li {
            display: inline-block;
            margin-right: 10px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 8px 16px; /* Add padding for better click/tap experience */
            border-radius: 5px;
        }
         nav ul li a:hover {
            background-color: #fff;
            color: #333;
        }
        nav ul li a.active {
        background-color: #fff;
        color: #333;
        }

        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex-grow: 1;
            padding: 20px;
        }

        .side-panel {
            background-color: #ddd;
            padding: 20px;
            width: 100%;
            max-width: 300px;
            margin-bottom: 20px;
        }
        .success-message {
            color: green;
            font-weight: bold;
            margin-top: 10px;
        }
        .error-message {
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }
        .content {
            width: 100%;
            max-width: 800px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: #fff;
            margin-top: auto;
        }

        /* Media Query for Tablet/Desktop */
        @media (min-width: 768px) {
            main {
                flex-direction: row;
                justify-content: center;
            }
        .side-panel {
            order: -1; /* Move the side-panel to the left */
            margin-right: 20px; /* Add some margin for better separation */
        }
        .content {
            margin-left: 20px;
            margin-top: 20px;
            margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    <header>
        <img src="https://i.imgur.com/hlAQIXg.png" alt="fontbolt1">
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="Mods.html">Mods</a></li>
                <li><a href="Rules.html">Rules</a></li>
                <li><a href="dynmap.html">Dynmap</a></li>
                <li><a href="contact.html">Contacts</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li><a href="howconect.php" class="active">Play</a></li>
            </ul>
        </nav>
    </header>





    
<?php
    // MySQL udaje
    $servername = "localhost";
    $username = "milan";
    $password = "pasword";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $entered_username = $_POST['in_game_name'    ];
        $player_type      = $_POST['player_type'     ];
        $aditional_reason = $_POST['additional_reason'];

        // Construct SQL query
        $sql = "INSERT INTO test (username, player_type, additional_reason) VALUES ('$entered_username', '$player_type', '$additional_reason')";

        // Execute SQL query
        if ($conn->query($sql) === TRUE)
        {
            echo '<p class="success-message">Username \'' . $entered_username . '\' added successfully!</p>';
        }
        else
        {
            echo '<p class="error-message">Error: ' . $conn->error . '</p>';
        }
    }
    $conn->close();
?>

    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="string" name="in_game_name" id=in_game_namenum1" required><br>      
        <select name="player_type" id="player_type">
            <option value="play">play</option>
            <option value="talk">talk</option>
            <option value="build">build</option>
            <option value="mine">mine</option>
        </select><br>
        <input type="string" name="aditional_reason" id="additional_reason" required><br>
        <input type="submit" value="submit">
    </form>
            
       
    

    <footer>
        <p>&copy; 2023 Pootis</p>
    </footer>
</body>

</html>
