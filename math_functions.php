<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="math_functions.php" method="post">
        <label>radius:</label>
        <input type="text" name="radius"><br>
        <input type="submit" value="calculate">
    </form>
</body>
</html>
<?php
    $radius = $_POST["radius"];
    $circumference = round(2 * pi() * $radius, 2);
    $area = round(pi() * pow($radius, 2), 2);
    $volume = round((4 / 3) * pi() * pow($radius, 3), 2);

    // $total = abs($x);
    // $total = round($x);
    // $total = floor($x);
    // $total = ceil($x);
    // $total = sqrt($x);
    // $total = pow($x, $y);
    // $total = max($x, $y, $z);
    // $total = min($x, $y, $z);
    // $total = pi();

    echo "The circumference is: {$circumference}cm <br>";
    echo "The area is: {$area}cm^2 <br>";
    echo "The volume is {$volume}cm^3 <br>";
?>