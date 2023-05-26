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

    if ($result) {
        foreach ($result as $row) {
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

            //if ($file_name == $name) {
                ?>
                <div id="container">
                    <a class="item" href="character.php">
                        <div class="left">
                            <img class="avatar" src="resources/images/bowser.jpg">
                        </div>
                        <div class="right">
                            <h2><?php echo $name ?></h2>
                            <div class="stats">
                                <ul class="fa-ul">
                                    <li><span class="fa-li"><i class="fas fa-heart"></i></span> <?php echo $defense ?></li>
                                    <li><span class="fa-li"><i class="fas fa-fist-raised"></i></span> <?php echo $weapon ?></li>
                                    <li><span class="fa-li"><i class="fas fa-shield-alt"></i></span> <?php echo $armor ?></li>
                                </ul>
                            </div>
                        </div>
                    <div class="detailButton"><i class="fas fa-search"></i> bekijk</div>
                    </a>
                </div>
                <?php
            }
        }
     else {
        echo "Geen resultaten gevonden.";
    }
} catch (PDOException $e) {
    die("Fout bij het verbinden met de database: " . $e->getMessage());
}
?>
<header><h1>Alle [X] characters uit de database</h1>
    <h1><?php echo "Test" ?></h1>
</header>



<footer>&copy; Stefan Nijssen 2023</footer>
</body>
</html>