<?php

namespace app\models;

class Cor extends Connection
{
    public function listaCores()
    {
        $conn = $this->connect();
        $sql = "SELECT * FROM cadastro_cor ORDER BY c_cor";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function cadastra()
    {
        $c_cor = filter_input(INPUT_POST, 'c_cor', FILTER_SANITIZE_SPECIAL_CHARS);

        $conn = $this->connect();

        $sqlCorCheck = "SELECT COUNT(*) FROM cadastro_cor WHERE c_cor = :c_cor";
        $stmtCorCheck = $conn->prepare($sqlCorCheck);
        $stmtCorCheck->bindParam(':c_cor', $c_cor);
        $stmtCorCheck->execute();

        if ($stmtCorCheck->fetchColumn() > 0) {
            return false; 
        }

        $sql = "INSERT INTO cadastro_cor (c_cor) VALUES (:c_cor)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':c_cor', $c_cor);
        $stmt->execute();

        return true; 
    }

    public function edit()
    {
        $c_id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $conn = $this->connect();
        $sql = "SELECT * FROM cadastro_cor WHERE c_id = :c_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':c_id', $c_id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function edita()
    {
        $c_id = filter_input(INPUT_POST, 'c_id', FILTER_VALIDATE_INT);
        $c_cor = filter_input(INPUT_POST, 'c_cor', FILTER_SANITIZE_SPECIAL_CHARS);
        
        $conn = $this->connect();

        $sqlCorCheck = "SELECT COUNT(*) FROM cadastro_cor WHERE c_cor = :c_cor AND c_id != :c_id";
        $stmtCorCheck = $conn->prepare($sqlCorCheck);
        $stmtCorCheck->bindParam(':c_cor', $c_cor);
        $stmtCorCheck->bindParam(':c_id', $c_id);
        $stmtCorCheck->execute();

        if ($stmtCorCheck->fetchColumn() > 0) {
            return false;
        }

        $sql = "UPDATE cadastro_cor SET c_cor = :c_cor WHERE c_id = :c_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':c_id', $c_id);
        $stmt->bindParam(':c_cor', $c_cor);
        $stmt->execute();

        return true;
    }

    public function delete($c_id)
    {
        $conn = $this->connect();
        $sql = "DELETE FROM cadastro_cor where c_id = :c_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':c_id', $c_id);
        $stmt->execute();
        return $stmt;
    }
}