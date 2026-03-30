<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Welkom</title>
</head>
<body>
<?php
$naam = $_GET['name'];
$email = $_GET['email'];
echo '<h1> De ingevulde gegevens zijn: </h1>'; 
echo "Naam " . htmlspecialchars($naam) . "<br>";
echo "Email " . htmlspecialchars($email) . "<br>";
?>
    
</body>
</html>
