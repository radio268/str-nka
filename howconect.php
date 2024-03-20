<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pootis</title>
    <style>
        
        .top_img {
             margin-top: -10px
        }
                
        .button {
                display: inline-block;
                outline: 0;
                cursor: pointer;
                border: 2px solid #000;
                border-radius: 3px;
                color: #fff;
                background: #f0f0f0;
                font-size: 20px;
                font-weight: 600;
                line-height: 28px;
                padding: 12px 20px;
                text-align:center;
                transition-duration: .15s;
                transition-property: all;
                transition-timing-function: cubic-bezier(.4,0,.2,1);
                :hover{
                    color: #000;
                    background: #fff;
                }
                
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
            background-color: #fff; /* Set a light background color for the main content area */
            z-index: 1;
            width: 1000px;
            margin: 0 auto;
            overflow-y: auto;
        }
         body::before {
            content: '';
            background-image: url("https://i.imgur.com/6t8Dm6M.png");
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: -1;
         }

        .side-panel {
            background-color: #ddd;
            padding: 20px;
            width: 100%;
            max-width: 300px;
            margin-bottom: 20px;
        }

        .content {
            width: 100%;
            max-width: 800px;
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
            }
        }
    </style>
</head>

<body>
    <header>
        <img src="https://i.imgur.com/hlAQIXg.png" alt="fontbolt1" class="top_img">
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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // MySQL udaje
        $servername = "sql303.infinityfree.com";
        $username = "if0_35790300";
        $password = "cYNOdVvCsEb56 ";
        $dbname = "if0_35790300_XXX";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $entered_username = $_POST['in_game_name'    ];
        $player_type      = $_POST['player_type'     ];
        $aditional_reason = $_POST['additional_reason'];

        
        $sql = "INSERT INTO test (username, player_type, additional_reason) VALUES ('$entered_username', '$player_type', '$additional_reason')";

        
        if ($conn->query($sql) === TRUE)
        {
            echo '<p class="success-message">Username data added successfully!</p>';
        }
        else
        {
            echo '<p class="error-message">Error: ' . $conn->error . '</p>';
        }
        $conn->close();
    }
    
?>


    
   
            
       
    <main>
        <div class="content">
            <section id="form">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <p>In game name:            
                    <input type="string" name="in_game_name" id="in_game_name" required><br>
                    Type of player:              
                        <select name="player_type" id="player_type">
                            <option value="play">player</option>
                            <option value="talk">talker</option>
                            <option value="build">builder</option>
                            <option value="mine">miner</option>
                            <option value="redstone">redstoner</option>
                            <option value="prefere not to say">prefer not to say</option>
                        </select><br>          
                    Why should we whitelist you?:
                    <input type="string" name="aditional_reason" id="additional_reason" required><br><br>
                    <input class = "button" type="submit" value="Submit"><br></p>
                </form>   
            </section>
      
            <section id="safe?">
                <h2>Is my information safe?</h2>
                <p>Definitely not! :)</p>
            </section>
        </div>

        <div class ="content">
            <section id="explain">
                <h2>How to connect?</h2>
                <p>To connect, please type in your minecraft nickname, then select your passion and lastly why should we even let you in.<br>Your request will be processed as soon as I get my morning coffee.</p>
            </section>
        </div>
    </main>

    <footer>
        <p>&copy; 2023 Pootis</p>
    </footer>
</body>

</html>
