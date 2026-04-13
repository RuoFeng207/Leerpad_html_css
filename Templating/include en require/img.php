<?php require("img_var.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="content">
        <img src="<?= $img ?>" alt="">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam cumque, quaerat at ducimus tempore cum aliquam autem a in accusantium officiis excepturi quae deleniti illum amet obcaecati veniam consectetur consequuntur!</p>
    </div>
    <hr>
    <?php for ($i = 0; $i < 10; $i++): ?>
        <div class="content">
            <img src="<?= $img ?>" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, libero sapiente ducimus aliquid, voluptatibus suscipit pariatur distinctio dolor doloremque quasi aliquam ipsa, cupiditate voluptates error similique. Temporibus nemo laborum reprehenderit.</p>
        </div>
    <?php endfor; ?>

</body>

</html>