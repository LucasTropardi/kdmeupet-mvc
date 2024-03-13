<?php

namespace app\models;

use PDO;

class Usuario extends Connection
{
    function converteDataParaMySQL($data) 
    {
        $dataFormatada = date('Y-m-d', strtotime(str_replace('/', '-', $data)));
        return $dataFormatada;
    }

    function converteDataParaExibicao($data) 
    {
        $dataFormatada = date('d/m/Y', strtotime($data));
        return $dataFormatada;
    }
    
    public function cadastra()
    {
        $u_nome = filter_input(INPUT_POST, 'u_nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $u_sobrenome = filter_input(INPUT_POST, 'u_sobrenome', FILTER_SANITIZE_SPECIAL_CHARS);
        $u_telefone = filter_input(INPUT_POST, 'u_telefone', FILTER_SANITIZE_SPECIAL_CHARS);
        $u_data = $this->converteDataParaMySQL(filter_input(INPUT_POST, 'u_data', FILTER_SANITIZE_SPECIAL_CHARS));
        $u_endereco = filter_input(INPUT_POST, 'u_endereco', FILTER_SANITIZE_SPECIAL_CHARS);
        $u_email = filter_input(INPUT_POST, 'u_email', FILTER_VALIDATE_EMAIL);
        $u_senha = filter_input(INPUT_POST, 'u_senha', FILTER_SANITIZE_SPECIAL_CHARS);
        $confirmar_senha = filter_input(INPUT_POST, 'confirmar_senha', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!$u_email) {
            return false; 
        }


        if ($u_senha !== $confirmar_senha) {
            return false; 
        }

        $nomeFoto = null;
        if (isset($_FILES['u_foto']) && $_FILES['u_foto']['error'] === UPLOAD_ERR_OK) {

            $maxFileSize = 5 * 1024 * 1024; // 5 Megabytes
            if ($_FILES['u_foto']['size'] > $maxFileSize) {
                echo '<script>alert("O arquivo é muito grande. Tamanho máximo permitido é 5MB.");</script>';
                return false;
            }

            $allowedFileExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $extensao = strtolower(pathinfo($_FILES['u_foto']['name'], PATHINFO_EXTENSION));
            if (!in_array($extensao, $allowedFileExtensions)) {
                echo '<script>alert("Formato de arquivo não permitido. Apenas JPG, JPEG, PNG, e GIF são aceitos.");</script>';
                return false;
            }

            if (!getimagesize($_FILES['u_foto']['tmp_name'])) {
                echo '<script>alert("O arquivo enviado não é uma imagem válida.");</script>';
                return false;
            }

            $diretorioDestino = __DIR__ . '/../../storage/users/';
            if (!file_exists($diretorioDestino)) {
                mkdir($diretorioDestino, 0755, true);
            }

            $nomeArquivo = uniqid('usuario_') . '.' . $extensao;

            if (move_uploaded_file($_FILES['u_foto']['tmp_name'], $diretorioDestino . $nomeArquivo)) {
                $nomeFoto = $nomeArquivo;
            }
        }

        $conn = $this->connect();

        $sqlEmailCheck = "SELECT COUNT(*) FROM cadastro_usuario WHERE u_email = :u_email";
        $stmtEmailCheck = $conn->prepare($sqlEmailCheck);
        $stmtEmailCheck->bindParam(':u_email', $u_email);
        $stmtEmailCheck->execute();

        if ($stmtEmailCheck->fetchColumn() > 0) {
            return false; 
        }

        $u_senha_hash = password_hash($u_senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO cadastro_usuario (u_nome, u_sobrenome, u_telefone, u_data, u_endereco, u_email, u_senha, u_foto) VALUES (:u_nome, :u_sobrenome, :u_telefone, :u_data, :u_endereco, :u_email, :u_senha, :u_foto)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':u_nome', $u_nome);
        $stmt->bindParam(':u_sobrenome', $u_sobrenome);
        $stmt->bindParam(':u_telefone', $u_telefone);
        $stmt->bindParam(':u_data', $u_data);
        $stmt->bindParam(':u_endereco', $u_endereco);
        $stmt->bindParam(':u_email', $u_email);
        $stmt->bindParam(':u_senha', $u_senha_hash);
        $stmt->bindParam(':u_foto', $nomeFoto); 
        $stmt->execute();

        return true; 
    }

    public function verificaLogin($email, $senha) 
    {
        if (!$email || !$senha) {
            echo '<script>alert("Preencha todos os campos."); window.location.href = "/?router=AuthLogin/login";</script>';
            exit;
        }

        $conn = $this->connect();
    
        $sql = "SELECT * FROM cadastro_usuario WHERE u_email = :u_email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':u_email', $email);
        $stmt->execute();
    
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($usuario && password_verify($senha, $usuario['u_senha'])) {
            return $usuario;
        } else {
            return false;
        }
    }

    public function listaUsuarios()
    {
        $conn = $this->connect();
        $sql = "SELECT * FROM cadastro_usuario ORDER BY u_nome";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

}
