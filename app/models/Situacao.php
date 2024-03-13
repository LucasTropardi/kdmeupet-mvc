<?php

namespace app\models;

class Situacao extends Connection
{
    public function listaSituacoes()
    {
        $conn = $this->connect();
        $sql = "SELECT * FROM cadastro_situacao ORDER BY s_nome";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function cadastra()
    {
        $s_nome = filter_input(INPUT_POST, 's_nome', FILTER_SANITIZE_SPECIAL_CHARS);

        $conn = $this->connect();

        $sqlSituacaoCheck = "SELECT COUNT(*) FROM cadastro_situacao WHERE s_nome = :s_nome";
        $stmtSituacaoCheck = $conn->prepare($sqlSituacaoCheck);
        $stmtSituacaoCheck->bindParam(':s_nome', $s_nome);
        $stmtSituacaoCheck->execute();

        if ($stmtSituacaoCheck->fetchColumn() > 0) {
            return false; 
        }

        $sql = "INSERT INTO cadastro_situacao (s_nome) VALUES (:s_nome)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':s_nome', $s_nome);
        $stmt->execute();

        return true; 
    }

    public function edit()
    {
        $s_id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $conn = $this->connect();
        $sql = "SELECT * FROM cadastro_situacao WHERE s_id = :s_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':s_id', $s_id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function edita()
    {
        $s_id = filter_input(INPUT_POST, 's_id', FILTER_VALIDATE_INT);
        $s_nome = filter_input(INPUT_POST, 's_nome', FILTER_SANITIZE_SPECIAL_CHARS);
        
        $conn = $this->connect();

        $sqlSituacaoCheck = "SELECT COUNT(*) FROM cadastro_situacao WHERE s_nome = :s_nome AND s_id != :s_id";
        $stmtSituacaoCheck = $conn->prepare($sqlSituacaoCheck);
        $stmtSituacaoCheck->bindParam(':s_nome', $s_nome);
        $stmtSituacaoCheck->bindParam(':s_id', $s_id);
        $stmtSituacaoCheck->execute();

        if ($stmtSituacaoCheck->fetchColumn() > 0) {
            return false;
        }

        $sql = "UPDATE cadastro_situacao SET s_nome = :s_nome WHERE s_id = :s_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':s_id', $s_id);
        $stmt->bindParam(':s_nome', $s_nome);
        $stmt->execute();

        return true;
    }

    public function delete($s_id)
    {
        $conn = $this->connect();
        $sql = "DELETE FROM cadastro_situacao where s_id = :s_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':s_id', $s_id);
        $stmt->execute();
        return $stmt;
    }
}