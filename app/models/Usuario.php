<?php

namespace app\models;

class Usuario extends Connection
{
    function converteDataParaMySQL($data) {
        $dataFormatada = date('Y-m-d', strtotime(str_replace('/', '-', $data)));
        return $dataFormatada;
    }

    function converteDataParaExibicao($data) {
        $dataFormatada = date('d/m/Y', strtotime($data));
        return $dataFormatada;
    }
    
    public function cadastrar()
    {
        $u_nome = filter_input(INPUT_POST, 'u_nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $u_sobrenome = filter_input(INPUT_POST, 'u_sobrenome', FILTER_SANITIZE_SPECIAL_CHARS);
        $u_telefone = filter_input(INPUT_POST, 'u_telefone', FILTER_SANITIZE_SPECIAL_CHARS);
        $u_data = $this->converteDataParaMySQL(filter_input(INPUT_POST, 'u_data', FILTER_SANITIZE_SPECIAL_CHARS));
        $u_endereco = filter_input(INPUT_POST, 'u_endereco', FILTER_SANITIZE_SPECIAL_CHARS);

        $conn = $this->connect();
        $sql = "INSERT INTO cadastro_usuario (u_nome, u_sobrenome, u_telefone, u_data, u_endereco) values (:u_nome, :u_sobrenome, :u_telefone, :u_data, :u_endereco)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':u_nome', $u_nome);
        $stmt->bindParam(':u_sobrenome', $u_sobrenome);
        $stmt->bindParam(':u_telefone', $u_telefone);
        $stmt->bindParam(':u_data', $u_data);
        $stmt->bindParam(':u_endereco', $u_endereco);
        $stmt->execute();

        return $stmt;
    }
}