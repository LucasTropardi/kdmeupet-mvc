<?php

namespace app\controllers;

use app\models\Situacao;

class Situacoes extends Situacao
{
    public function situacoes()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            $situacoes = $this->listaSituacoes();
            require_once ROOT . "/app/views/partials/navbar3.php";
            require_once ROOT . "/app/views/gerenciador/situacoes.php";
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }

    public function criar()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            require_once ROOT . "/app/views/partials/navbar3.php";
            require_once ROOT . "/app/views/gerenciador/cadastrarSituacao.php";
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }

    public function store()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            $cadastrar = $this->cadastra();
            if ($cadastrar) {
                echo "<script>alert('Situação cadastrada com sucesso!'); window.location.href = '/?router=Situacoes/situacoes';</script>";
                exit;
            }  
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }

    public function editar()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            $edit = $this->edit();
            require_once ROOT . "/app/views/partials/navbar3.php";
            require_once ROOT . "/app/views/gerenciador/editarSituacao.php";
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }

    public function atualizar()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            $editar = $this->edita();
            if ($editar) {
                echo "<script>alert('Situação atualizada com sucesso!'); window.location.href = '/?router=Situacoes/situacoes';</script>";
                exit;
            }  
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }

    public function deletar()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            $s_id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $deletar = $this->delete($s_id);
            if ($deletar) {
                echo "<script>alert('Situação excluída com sucesso!'); window.location.href = '/?router=Situacoes/situacoes';</script>";
                exit;
                echo "<script>alert('Falha ao excluir a situação.'); window.location.href = '/?router=Situacoes/situacoes';</script>";
                exit;
            }
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }
}