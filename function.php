<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function greet($name="Guest") {
        echo "Hello $name!";
    }
    greet("Abebe");
    echo "<br>";
    greet();
    ?>
</body>
</html>