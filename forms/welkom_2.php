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
echo htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8")."<br>";
echo $_POST["email"];

?>
    
</body>
</html>
