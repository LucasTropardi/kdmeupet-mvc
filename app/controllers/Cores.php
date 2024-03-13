<?php

namespace app\controllers;

use app\models\Cor;

class Cores extends Cor
{
    public function cores()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            $cores = $this->listaCores();
            require_once ROOT . "/app/views/partials/navbar3.php";
            require_once ROOT . "/app/views/gerenciador/cores.php";
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }

    public function criar()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            require_once ROOT . "/app/views/partials/navbar3.php";
            require_once ROOT . "/app/views/gerenciador/cadastrarCor.php";
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }

    public function store()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            $cadastrar = $this->cadastra();
            if ($cadastrar) {
                echo "<script>alert('Cor cadastrada com sucesso!'); window.location.href = '/?router=Cores/cores';</script>";
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
            require_once ROOT . "/app/views/gerenciador/editarCor.php";
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }

    public function atualizar()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            $editar = $this->edita();
            if ($editar) {
                echo "<script>alert('Cor atualizada com sucesso!'); window.location.href = '/?router=Cores/cores';</script>";
                exit;
            }  
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }

    public function deletar()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            $c_id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $deletar = $this->delete($c_id);
            if ($deletar) {
                echo "<script>alert('Cor excluída com sucesso!'); window.location.href = '/?router=Cores/cores';</script>";
                exit;
                echo "<script>alert('Falha ao excluir a cor.'); window.location.href = '/?router=Cores/cores';</script>";
                exit;
            }
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }
}