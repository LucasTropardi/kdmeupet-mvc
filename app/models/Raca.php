<?php

namespace app\models;

class Raca extends Connection
{
    public function getEspecies()
    {
        $conn = $this->connect();
        $sql = "SELECT a.t_id, a.t_nome FROM cadastro_tipo a";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function listaRacas()
    {
        $conn = $this->connect();
        $sql = "SELECT a.r_id, a.r_nome, a.r_tipos, b.t_nome FROM cadastro_raca a INNER JOIN cadastro_tipo b ON b.t_id = a.r_tipos ORDER BY a.r_nome";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function cadastra()
    {
        $r_nome = filter_input(INPUT_POST, 'r_nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $r_tipos = filter_input(INPUT_POST, 'r_tipos', FILTER_VALIDATE_INT);

        $conn = $this->connect();

        $sqlRacaCheck = "SELECT COUNT(*) FROM cadastro_raca WHERE r_nome = :r_nome";
        $stmtRacaCheck = $conn->prepare($sqlRacaCheck);
        $stmtRacaCheck->bindParam(':r_nome', $r_nome);
        $stmtRacaCheck->execute();

        if ($stmtRacaCheck->fetchColumn() > 0) {
            return false; 
        }

        $sql = "INSERT INTO cadastro_raca (r_nome, r_tipos) VALUES (:r_nome, :r_tipos)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':r_nome', $r_nome);
        $stmt->bindParam(':r_tipos', $r_tipos);
        $stmt->execute();

        return true; 
    }

    public function edit()
    {
        $r_id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $conn = $this->connect();
        $sql = "SELECT a.r_id, a.r_nome, a.r_tipos FROM cadastro_raca a INNER JOIN cadastro_tipo b ON b.t_id = a.r_tipos WHERE r_id = :r_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':r_id', $r_id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function edita()
    {
        $r_id = filter_input(INPUT_POST, 'r_id', FILTER_VALIDATE_INT);
        $r_tipos = filter_input(INPUT_POST, 'r_tipos', FILTER_VALIDATE_INT);
        $r_nome = filter_input(INPUT_POST, 'r_nome', FILTER_SANITIZE_SPECIAL_CHARS);
        
        $conn = $this->connect();

        $sqlRacaCheck = "SELECT COUNT(*) FROM cadastro_raca WHERE r_nome = :r_nome AND r_id != :r_id";
        $stmtRacaCheck = $conn->prepare($sqlRacaCheck);
        $stmtRacaCheck->bindParam(':r_nome', $r_nome);
        $stmtRacaCheck->bindParam(':r_id', $r_id);
        $stmtRacaCheck->execute();

        if ($stmtRacaCheck->fetchColumn() > 0) {
            return false;
        }

        $sql = "UPDATE cadastro_raca SET r_nome = :r_nome, r_tipos = :r_tipos WHERE r_id = :r_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':r_id', $r_id);
        $stmt->bindParam(':r_nome', $r_nome);
        $stmt->bindParam(':r_tipos', $r_tipos);
        $stmt->execute();

        return true;
    }

    public function delete($r_id)
    {
        $conn = $this->connect();
        $sql = "DELETE FROM cadastro_raca where r_id = :r_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':r_id', $r_id);
        $stmt->execute();
        return $stmt;
    }
}