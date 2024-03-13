<?php

namespace app\models;

class Tamanho extends Connection
{
    public function listaTamanhos()
    {
        $conn = $this->connect();
        $sql = "SELECT * FROM cadastro_tamanho ORDER BY t_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function cadastra()
    {
        $t_nometm = filter_input(INPUT_POST, 't_nometm', FILTER_SANITIZE_SPECIAL_CHARS);

        $conn = $this->connect();

        $sqlTamanhoCheck = "SELECT COUNT(*) FROM cadastro_tamanho WHERE t_nometm = :t_nometm";
        $stmtTamanhoCheck = $conn->prepare($sqlTamanhoCheck);
        $stmtTamanhoCheck->bindParam(':t_nometm', $t_nometm);
        $stmtTamanhoCheck->execute();

        if ($stmtTamanhoCheck->fetchColumn() > 0) {
            return false; 
        }

        $sql = "INSERT INTO cadastro_tamanho (t_nometm) VALUES (:t_nometm)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':t_nometm', $t_nometm);
        $stmt->execute();

        return true; 
    }

    public function edit()
    {
        $t_id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $conn = $this->connect();
        $sql = "SELECT * FROM cadastro_tamanho WHERE t_id = :t_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':t_id', $t_id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function edita()
    {
        $t_id = filter_input(INPUT_POST, 't_id', FILTER_VALIDATE_INT);
        $t_nometm = filter_input(INPUT_POST, 't_nometm', FILTER_SANITIZE_SPECIAL_CHARS);
        
        $conn = $this->connect();

        $sqlTamanhoCheck = "SELECT COUNT(*) FROM cadastro_tamanho WHERE t_nometm = :t_nometm AND t_id != :t_id";
        $stmtTamanhoCheck = $conn->prepare($sqlTamanhoCheck);
        $stmtTamanhoCheck->bindParam(':t_nometm', $t_nometm);
        $stmtTamanhoCheck->bindParam(':t_id', $t_id);
        $stmtTamanhoCheck->execute();

        if ($stmtTamanhoCheck->fetchColumn() > 0) {
            return false;
        }

        $sql = "UPDATE cadastro_tamanho SET t_nometm = :t_nometm WHERE t_id = :t_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':t_id', $t_id);
        $stmt->bindParam(':t_nometm', $t_nometm);
        $stmt->execute();

        return true;
    }

    public function delete($t_id)
    {
        $conn = $this->connect();
        $sql = "DELETE FROM cadastro_tamanho where t_id = :t_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':t_id', $t_id);
        $stmt->execute();
        return $stmt;
    }
}