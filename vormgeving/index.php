<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Characters</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet"/>
</head>
<body>
<?php 
    //include "config.php"; 
    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $database = "characters";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8mb4", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Verbinding met de database is succesvol tot stand gebracht.";

        $sql = "SELECT * FROM characters";
        $stmt = $conn->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        } catch (PDOException $e) {
            die("Fout bij het verbinden met de database: " . $e->getMessage());
        }

    $row_amount = 0;
    if ($result) {
        foreach ($result as $row) {
            $row_amount ++;
            $id = $row["id"];
            $name = $row["name"];
            $avatar = $row["avatar"];
            $health = $row["health"];
            $bio = $row["bio"];
            $color = $row["color"];
            $attack = $row["attack"];
            $defense = $row["defense"];
            $weapon = $row["weapon"];
            $armor = $row["armor"];

        
    ?>

<div id="container">
        <input type="hidden" name="character_name" value="<?php echo $name; ?>">
        <a class="item" href="character.php?id=<?php echo $id; ?>">
            <div class="left">
                <img class="avatar" src="resources/images/<?php echo $avatar ?>" alt="Afbeelding">
            </div>
            <div class="right">
                <h2><?php echo $name ?></h2>
                <div class="stats">
                    <ul class="fa-ul">
                        <li><span class="fa-li"><i class="fas fa-heart"></i></span> <?php echo $health ?></li>
                        <li><span class="fa-li"><i class="fas fa-fist-raised"></i></span> <?php echo $attack ?></li>
                        <li><span class="fa-li"><i class="fas fa-shield-alt"></i></span> <?php echo $defense ?></li>
                    </ul>
                </div>
            </div>
            <div class="detailButton"><i class="fas fa-search"></i> bekijk</div>
        </a>
</div>
    <?php 
    }
    }else {
        echo "Geen resultaten gevonden.";
        }
    ?>
<header><h1>Alle <?php echo $row_amount ?> characters uit de database</h1>
</header>



<footer>&copy; Stefan Nijssen 2023</footer>
</body>
</html>