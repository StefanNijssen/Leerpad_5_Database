<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Character - Bowser</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet"/>
</head>
<body>
    <?php
     $servername = "localhost";
     $username = "root";
     $password = "mysql";
     $dbname = "characters";
 
     $conn = new mysqli($servername, $username, $password, $dbname);
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }

    $id = $_GET['id'];
    $sql = "SELECT * FROM characters WHERE id = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $avatar = $row["avatar"];
        $health = $row["health"];
        $attack = $row["attack"];
        $defense = $row["defense"];
        $weapon = $row["weapon"];
        $armor = $row["armor"];
        $bio = $row["bio"];
    }

    ?>
<header><h1><?php echo $name ?></h1>
    <a class="backbutton" href="index.php"><i class="fas fa-long-arrow-alt-left"></i> Terug</a></header>
<div id="container">
    <div class="detail">
        <div class="left">
            <img class="avatar" src="resources/images/<?php echo $avatar ?>">
            <div class="stats" style="background-color: yellowgreen">
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-heart"></i></span> <?php echo $health ?></li>
                    <li><span class="fa-li"><i class="fas fa-fist-raised"></i></span> <?php echo $attack ?></li>
                    <li><span class="fa-li"><i class="fas fa-shield-alt"></i></span> <?php echo $defense ?></li>
                </ul>
                <ul class="gear">
                    <li><b>Weapon</b>: <?php echo $weapon ?></li>
                    <li><b>Armor</b>: <?php echo $armor ?></li>
                </ul>
            </div>
        </div>
        <div class="right">
        
            <p>
            <?php echo $bio ?>
                <!-- Bowser or King Koopa, is a fictional character and the main antagonist of Nintendo's Mario franchise. In
                Japan, the character bears the title of Great Demon King. In the U.S., the character was first referred
                to as "Bowser, King of the Koopas" and "the sorcerer king" in the instruction manual.<br/>
                <br/>
                Bowser is the leader of the turtle-like Koopa race, and has been the archenemy of Mario since his first
                appearance, in the 1985 video game Super Mario Bros.<br/>
                <br/>
                His ultimate goals are to kidnap Princess Peach, defeat Mario, and conquer the Mushroom Kingdom. Since
                his debut, he has appeared in almost every Mario franchise game, usually serving as the main antagonist.
                Bowser is voiced by Kenny James. -->
            </p>
        </div>
        <div style="clear: both"></div>
    </div>
</div>
<footer>&copy; Stefan Nijssen 2023</footer>
</body>
</html>