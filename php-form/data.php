<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" type="text/css" href="./index.css" />
    <meta charset="UTF-8">
    <title>SI401A</title>
</head>

<body>
    <?php
        $data["name"]=$_POST["name"];
        $data["cpf"]=$_POST["cpf"];
        $data["rg"]=$_POST["rg"];
        $data["age"]=$_POST["age"];
        
        file_put_contents("filename.txt", serialize($data));

        $out_data = unserialize(file_get_contents("filename.txt"));
        //display dos dados printados
        //pagina para continuar cadastro ou ver dados
        //botao para cadastro na pag ver dados
        //validation?
        foreach($out_data as $key => $value)
            {
            echo $key." has the value". $value;
            }
    ?>
</body>