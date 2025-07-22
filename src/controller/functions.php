<?php
    #SQL

    function SQLCONNECTION(){
        $host = 'localhost';
        $user = 'root';
        $password = '156375';
        $data = 'SR_CTISM';

        #Faz a conexão
        $conn = new mysqli($host, $user, $password, $data);

        #Erro
        if($conn -> connect_error){
            header('location:/login_register.php?error=error');
            exit();
        }

        return $conn;
    }
?>