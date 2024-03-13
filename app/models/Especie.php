<?php

namespace app\models;

class Especie extends Connection
{
    public function listaEspecies()
    {
        $conn = $this->connect();
        $sql = "SELECT * FROM cadastro_tipo ORDER BY t_nome";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function cadastra()
    {
        $t_nome = filter_input(INPUT_POST, 't_nome', FILTER_SANITIZE_SPECIAL_CHARS);

        $conn = $this->connect();

        $sqlTipoCheck = "SELECT COUNT(*) FROM cadastro_tipo WHERE t_nome = :t_nome";
        $stmtTipoCheck = $conn->prepare($sqlTipoCheck);
        $stmtTipoCheck->bindParam(':t_nome', $t_nome);
        $stmtTipoCheck->execute();

        if ($stmtTipoCheck->fetchColumn() > 0) {
            return false; 
        }

        $sql = "INSERT INTO cadastro_tipo (t_nome) VALUES (:t_nome)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':t_nome', $t_nome);
        $stmt->execute();

        return true; 
    }

    public function edit()
    {
        $t_id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $conn = $this->connect();
        $sql = "SELECT * FROM cadastro_tipo WHERE t_id = :t_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':t_id', $t_id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function edita()
    {
        $t_id = filter_input(INPUT_POST, 't_id', FILTER_VALIDATE_INT);
        $t_nome = filter_input(INPUT_POST, 't_nome', FILTER_SANITIZE_SPECIAL_CHARS);
        
        $conn = $this->connect();

        $sqlTipoCheck = "SELECT COUNT(*) FROM cadastro_tipo WHERE t_nome = :t_nome AND t_id != :t_id";
        $stmtTipoCheck = $conn->prepare($sqlTipoCheck);
        $stmtTipoCheck->bindParam(':t_nome', $t_nome);
        $stmtTipoCheck->bindParam(':t_id', $t_id);
        $stmtTipoCheck->execute();

        if ($stmtTipoCheck->fetchColumn() > 0) {
            return false;
        }

        $sql = "UPDATE cadastro_tipo SET t_nome = :t_nome WHERE t_id = :t_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':t_id', $t_id);
        $stmt->bindParam(':t_nome', $t_nome);
        $stmt->execute();

        return true;
    }

    public function delete($t_id)
    {
        $conn = $this->connect();
        $sql = "DELETE FROM cadastro_tipo where t_id = :t_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':t_id', $t_id);
        $stmt->execute();
        return $stmt;
    }
}