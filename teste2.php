<?php 
    $val1 = 10; 
    $val2 = 20; 

    $media = ($val1 + $val2)/2;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Pagina 01 - PHP</h1>    


    <p>
        teste!
    </p>

    <p> <?php echo "media somado a 10= ". $media+10; ?> </p>


    <p> <?= "media: ". $media; ?> </p>

</body>
</html>