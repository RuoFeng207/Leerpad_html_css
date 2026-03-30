<?php
date_default_timezone_set('Europe/Amsterdam');
$today = new DateTime("now");
$hour = (int)$today->format('H');

if ($hour >= 6 && $hour < 12) {
    $timeClass ="morning";
    $greetings = "Goedemorgen!";
} elseif ($hour >= 12 && $hour < 18) {
    $timeClass ="afternoon";
    $greetings = "Goedemiddag!";
}
elseif($hour >= 18 && $hours<24){
    $timeClass ="evening";
    $greetings ="Goedeavond!";
} else {
    $timeClass ="night";
    $greetings ="Goedenacht!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Goededag</title>
</head>

<body class="<?php echo $timeClass; ?>">
    <p id="greetings"><?php echo $greetings; ?></p>
    <p id="time"></p>
</body>

</html>

<script>
function updateTime() {
    const now = new Date();
    document.getElementById('time').textContent = `Het is nu: ${now.toLocaleTimeString()}`;
}
setInterval(updateTime, 1000);
updateTime();
</script>