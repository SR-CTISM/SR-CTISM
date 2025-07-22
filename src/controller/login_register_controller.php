<?php
    if(isset($_POST)){
        require_once(__DIR__ . '/functions.php');

        if($_POST['method'] != 'register'){
            #Register
            $registration = $_POST['registration-input'];
            $email = $_POST['email-input'];
            $password = $_POST['password'];

            if(!empty($registration) && !empty($email) && !empty($password)){
                #Connect to the SQL
                $conn = SQLCONNECTION();

                $sql = 'INSERT INTO alunos (matricula, email, senha) VALUES (?, ?, ?)';

                $stmt = $conn -> prepare($sql);
                $stmt -> bind_param("sss", $registration, $email, $password);

                #Sucesso
                if($stmt -> execute()){
                    #Creates the session
                    $_SESSION['user'] = $registration;

                    header('location:/index.php');
                    exit();
                }
                
                #Erro
                else{
                    echo 'Erro: ' . $stmt->error;
                }

                #Fecha a conexão
                $stmt->close();
                $conn->close();

                header('location:/login_register.php?error=error');
                exit();
            }

            else{
                #Empty values error
                header('location:/login_register.php?error=empty');
                exit();
            }
        }

        else{
            #Login
            $registration = $_POST['registration-input'];
            $password = $_POST['password'];

            #Connect to the SQL to see if the values match
        }
    }
?>