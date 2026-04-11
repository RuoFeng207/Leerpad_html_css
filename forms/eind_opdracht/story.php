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
htmlspecialchars($_POST["huisdier"], ENT_QUOTES, "UTF-8");
htmlspecialchars($_POST["persoon"], ENT_QUOTES, "UTF-8");
htmlspecialchars($_POST["land"], ENT_QUOTES, "UTF-8");
htmlspecialchars($_POST["verveel"], ENT_QUOTES, "UTF-8");
htmlspecialchars($_POST["speelgoed"], ENT_QUOTES, "UTF-8");
htmlspecialchars($_POST["docent"], ENT_QUOTES, "UTF-8");
htmlspecialchars($_POST["geld"], ENT_QUOTES, "UTF-8");
htmlspecialchars($_POST["hobby"], ENT_QUOTES, "UTF-8");


?>
    
</body>
</html>