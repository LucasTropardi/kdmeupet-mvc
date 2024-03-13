<?php

namespace app\models;

use PDO;

class Gerenciador extends Connection
{
    public function verificaLogin($email, $senha) 
    {
        if (!$email || !$senha) {
            echo '<script>alert("Preencha todos os campos."); window.location.href = "/?router=AuthGerenciador/login";</script>';
            exit;
        }

        $conn = $this->connect();
    
        $sql = "SELECT * FROM cadastro_gerenciador WHERE g_email = :g_email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':g_email', $email);
        $stmt->execute();
    
        $gerenciador = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($gerenciador && password_verify($senha, $gerenciador['g_senha'])) {
            return $gerenciador;
        } else {
            return false;
        }
    }

    public function listaGerenciadores()
    {
        $conn = $this->connect();
        $sql = "SELECT * FROM cadastro_gerenciador ORDER BY g_email";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function cadastra()
    {
        $g_nome = filter_input(INPUT_POST, 'g_nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $g_email = filter_input(INPUT_POST, 'g_email', FILTER_VALIDATE_EMAIL);
        $g_senha = filter_input(INPUT_POST, 'g_senha', FILTER_SANITIZE_SPECIAL_CHARS);
        $confirmar_senha = filter_input(INPUT_POST, 'confirmar_senha', FILTER_SANITIZE_SPECIAL_CHARS);
        $g_nivel = 0;

        if (!$g_email) {
            return false; 
        }

        if ($g_senha !== $confirmar_senha) {
            return false; 
        }

        $conn = $this->connect();

        $sqlEmailCheck = "SELECT COUNT(*) FROM cadastro_gerenciador WHERE g_email = :g_email";
        $stmtEmailCheck = $conn->prepare($sqlEmailCheck);
        $stmtEmailCheck->bindParam(':g_email', $g_email);
        $stmtEmailCheck->execute();

        if ($stmtEmailCheck->fetchColumn() > 0) {
            return false; 
        }

        $g_senha_hash = password_hash($g_senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO cadastro_gerenciador (g_email, g_senha, g_nivel, g_nome) VALUES (:g_email, :g_senha, :g_nivel, :g_nome)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':g_nome', $g_nome);
        $stmt->bindParam(':g_email', $g_email);
        $stmt->bindParam(':g_senha', $g_senha_hash);
        $stmt->bindParam(':g_nivel', $g_nivel); 
        $stmt->execute();

        return true; 
    }

    public function edit()
    {
        $g_id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $conn = $this->connect();
        $sql = "SELECT * FROM cadastro_gerenciador WHERE g_id = :g_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':g_id', $g_id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function edita()
    {
        $g_id = filter_input(INPUT_POST, 'g_id', FILTER_VALIDATE_INT);
        $g_nome = filter_input(INPUT_POST, 'g_nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $g_email = filter_input(INPUT_POST, 'g_email', FILTER_VALIDATE_EMAIL);
        $g_senha = filter_input(INPUT_POST, 'g_senha', FILTER_SANITIZE_SPECIAL_CHARS);
        $confirmar_senha = filter_input(INPUT_POST, 'confirmar_senha', FILTER_SANITIZE_SPECIAL_CHARS);
        $g_nivel = 0; 

        if (!$g_email) {
            return false;
        }

        $conn = $this->connect();

        $sqlEmailCheck = "SELECT COUNT(*) FROM cadastro_gerenciador WHERE g_email = :g_email AND g_id != :g_id";
        $stmtEmailCheck = $conn->prepare($sqlEmailCheck);
        $stmtEmailCheck->bindParam(':g_email', $g_email);
        $stmtEmailCheck->bindParam(':g_id', $g_id);
        $stmtEmailCheck->execute();

        if ($stmtEmailCheck->fetchColumn() > 0) {
            return false;
        }

        $sql = "UPDATE cadastro_gerenciador SET g_nome = :g_nome, g_email = :g_email, g_nivel = :g_nivel";
        
        if (!empty($g_senha) && $g_senha === $confirmar_senha) {
            $g_senha_hash = password_hash($g_senha, PASSWORD_DEFAULT);
            $sql .= ", g_senha = :g_senha";
        }

        $sql .= " WHERE g_id = :g_id";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':g_id', $g_id);
        $stmt->bindParam(':g_nome', $g_nome);
        $stmt->bindParam(':g_email', $g_email);
        $stmt->bindParam(':g_nivel', $g_nivel);

        if (!empty($g_senha) && $g_senha === $confirmar_senha) {
            $stmt->bindParam(':g_senha', $g_senha_hash);
        }

        $stmt->execute();

        return true;
    }

    public function delete($g_id)
    {
        $conn = $this->connect();
        $sql = "DELETE FROM cadastro_gerenciador where g_id = :g_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':g_id', $g_id);
        $stmt->execute();
        return $stmt;
    }

}