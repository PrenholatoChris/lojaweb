<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        // $celsius = ($fare-30)/2;
        echo "<table border = 1>
                <tr>
                <th>Pé</th>
                <th>Metro</th>
                </tr>
            ";
        for ($i=0; $i <=60 ; $i+=2) { 
            $celsius = ($i - 30) /2;
            echo "<tr>
                <td>$i</td> 
                <td>$celsius</td> 
            </tr>";
        }
        echo "</table>"
    ?>
</body>
</html>