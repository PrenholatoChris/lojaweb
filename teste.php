<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>teste</h1>    

    <?php
        $valor = 10;
        $emoji ="🤣😂";
        echo "<br>Altura do predio: " . $valor . "cm</br>";
    ?>

    <h2>
        <?php
            for ($i=0; $i <$valor ; $i++) { 
                echo $emoji;
            }
        ?>
    </h2>

    <p>
        <?php
            #Tipos de variaveis
            ## simples
            $boolean = true;
            $int = 10;
            $float = 1.0;
            $string = "String";
            ## composto
            $vetor = [1,2.0,"string",true];
            class carro{
                function ligar(){
                    echo "vrum vrum";
                }
            }
            $obj = new carro();
            $obj->ligar();
        ?>
    </p>

    <p>

        <?php
            $vetor = array(20);
            $vetor = [1,2,3,4,5,6,8];
            $vetor = ["salgado"=>7,
                "espetinho"=>8,
                "carne"=> 50
            ];
            
                echo $vetor["salgado"];
    
        ?>

    </p>
</body>
</html>