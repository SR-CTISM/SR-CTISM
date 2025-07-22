<?php
    if(isset($_POST)){
        @session_start();
        require_once(__DIR__ . '/functions.php');

        if($_POST['method'] != 'register'){
            #Login
            $registration = trim($_POST['registration-input']);
            $password = trim($_POST['password']);

            #Verifica o tamanho da senha
            if(strlen($password) > 8){
                #Erro de senha
                header('location:/login_register.php?error=pass_too_long');
                exit();
            }

            #Senha menor ou igual a 8
            else{
                if(!empty($registration) && !empty($password)){
                    #Conecta ao SQL pra ver se os valores estão certos
                    $conn = SQLCONNECTION();
        
                    #Faz a requisição 'SELECT'
                    $sql = 'SELECT senha FROM alunos WHERE matricula = ?';
                    $stmt = $conn -> prepare($sql);
                    $stmt -> bind_param("s", $registration);
                    $stmt -> execute();
                    $result = $stmt -> get_result();
    
                    #Se ouver resultado
                    if($result -> num_rows === 1){
                        $row = $result -> fetch_assoc();
    
                        // Compara a senha digitada com a senha criptografada no banco
                        if(password_verify($password, $row['senha'])){
                            $_SESSION['user'] = $registration;
                            header('location:/index.php');
                            exit();
                        }
                        
                        else{
                            // Senha incorreta
                            header('location:/login_register.php?error=wrong_password');
                            exit();
                        }
                    }
                    
                    else{
                        // Usuário não encontrado
                        header('location:/login_register.php?error=user_not_found');
                        exit();
                    }
    
                    #Fecha as conexões
                    $stmt->close();
                    $conn->close();
                }
    
                else{
                    #Empty values error
                    header('location:/login_register.php?error=empty');
                    exit();
                }
            }
        }
        
        else{
            #Register
            $registration = trim($_POST['registration-input']);
            $email = trim($_POST['email-input']);
            $password = trim($_POST['password']);
    
            if(!empty($registration) && !empty($email) && !empty($password)){
                #Connect to the SQL
                $conn = SQLCONNECTION();
    
                $sql = 'INSERT INTO alunos (matricula, email, senha) VALUES (?, ?, ?)';
    
                $hashed_password = password_hash($password, PASSWORD_DEFAULT); #Criptografa a senha
                $stmt = $conn -> prepare($sql);
                $stmt -> bind_param("sss", $registration, $email, $hashed_password);
    
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
    
                #Fecha as conexões
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
    }
?>