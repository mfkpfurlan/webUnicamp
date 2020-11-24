<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" type="text/css" href="./index.css" />
    <meta charset="UTF-8">
    <title>SI401A</title>
</head>

<body>
    
<?php
        $nameErr = $raErr = $ageErr =  $genderErr = $phoneErr = $addressErr = $mailErr = "";
        const FILE = "filename.txt";
        if(empty($_POST["name"])) {
            $nameErr = "É necessário inserir um nome.";
        } else {
            $data["name"]=$_POST["name"];
            if (!preg_match("/^[a-zA-Z-' ]*$/",$data["name"])) {
                $nameErr = "Apenas letras e espaços são permitidos.";
            }
        }
        if(empty($_POST["ra"])) {
            $raErr = "É necessário inserir um ra.";
        } else {
            $data["ra"]=$_POST["ra"];
            if (!preg_match("/^[0-9]*$/",$data["ra"])) {
                $raErr = "Apenas números são permitidos.";
            }
        }
        if(empty($_POST["gender"])) {
            $genderErr = "É necessário inserir um sexo.";
        } else {
            $data["gender"]=$_POST["gender"];
            if (!preg_match("/^[a-zA-Z-' ]*$/",$data["gender"])) {
                $genderErr = "Apenas caracteres são permitidos.";
            }
        }
        if(empty($_POST["age"])) {
            $ageErr = "É necessário inserir uma idade.";
        } else {
            $data["age"]=$_POST["age"];
            if (!preg_match("/^[0-9]*$/",$data["age"])) {
                $ageErr = "Apenas números são permitidos.";
            }
        }
        if(empty($_POST["address"])) {
            $addressErr = "É necessário inserir um edenreço.";
        } else {
            $data["address"]=$_POST["address"];
        }
        if(empty($_POST["phone"])) {
            $phoneErr = "É necessário inserir um telefone.";
        } else {
            $data["phone"]=$_POST["phone"];
            if (!preg_match("/^[0-9 ]*$/",$data["phone"])) {
                $phoneErr = "Apenas números são permitidos.";
            }
        }
        if(empty($_POST["mail"])) {
            $mailErr = "É necessário inserir um email";
        } else {
            $data["mail"]=$_POST["mail"];
            if (!filter_var($data["mail"], FILTER_VALIDATE_EMAIL)) {
                $mailErr = "Formato de email inválido";
            }
        }

        if($nameErr == "" && $raErr == "" && $ageErr == "" && $genderErr == "" 
            && $phoneErr == "" && $addressErr == "" && $mailErr == "") {
            $success = "Cadastro bem sucedido";
            $cadastrar = "Cadastrar outro";
            $r = json_encode($data);
            file_put_contents(FILE, $r, FILE_APPEND);
            file_put_contents(FILE, "\n", FILE_APPEND);
            var_dump(true);
        } else {
            $success = "Cadastro não realizado";
            $cadastrar = "Cadastrar novamente";
        }
    ?>
<div class="background">
        <div class="sidebar">
            <div class=button-container>
                <a href="show-data.php">
                    <button class="button" type="button">
                        Visualizar
                    </button>
                </a>
            </div>
        </div>
        <div class="form-container">
            <form action="data.php" method="POST">
                <div class="form-text-container">
                    <span class="form-text" id="success"><?php echo $success ?></span>
                </div>
                <br>
                <div class="form-text-container">
                    <span class="form-text">Nome: <?php echo $_POST["name"]?></span>
                </div>
                <div class="form-error-container">
                    <span class="error"><?php echo $nameErr;?></span>
                </div>

                <div class="form-text-container">
                    <span class="form-text">RA: <?php echo $_POST["ra"]?></span>
                </div>
                <div class="form-error-container">
                    <span class="error"><?php echo $raErr;?></span>
                </div>

                <div class="form-text-container">
                    <span class="form-text">Sexo: <?php echo $_POST["gender"]?></span>
                </div>
                <div class="form-error-container">
                    <span class="error"><?php echo $genderErr;?></span>
                </div>

                <div class="form-text-container">
                    <span class="form-text">Idade: <?php echo $_POST["age"]?></span>
                </div>
                <div class="form-error-container">
                    <span class="error"><?php echo $ageErr;?></span>
                </div>

                <div class="form-text-container">
                    <span class="form-text">Endereço: <?php echo $_POST["address"]?></span>
                </div>
                <div class="form-error-container">
                    <span class="error"><?php echo $addressErr;?></span>
                </div>

                <div class="form-text-container">
                    <span class="form-text">Telefone: <?php echo $_POST["phone"]?></span>
                </div>
                <div class="form-error-container">
                    <span class="error"><?php echo $phoneErr;?></span>
                </div>

                <div class="form-text-container">
                    <span class="form-text">Email: <?php echo $_POST["mail"]?></span>
                </div>
                <div class="form-error-container">
                    <span class="error"><?php echo $mailErr;?></span>
                </div>

                <a href="./input.html">
                    <button class="submit" type="button">
                        <?php echo $cadastrar ?>
                    </button>
                </a>
            </form>
        </div>
    </div>
</body>