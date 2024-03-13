<?php

namespace app\controllers;

use app\models\Tamanho;

class Tamanhos extends Tamanho
{
    public function tamanhos()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            $tamanhos = $this->listaTamanhos();
            require_once ROOT . "/app/views/partials/navbar3.php";
            require_once ROOT . "/app/views/gerenciador/tamanhos.php";
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }

    public function criar()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            require_once ROOT . "/app/views/partials/navbar3.php";
            require_once ROOT . "/app/views/gerenciador/cadastrarTamanho.php";
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }

    public function store()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            $cadastrar = $this->cadastra();
            if ($cadastrar) {
                echo "<script>alert('Tamanho cadastrado com sucesso!'); window.location.href = '/?router=Tamanhos/tamanhos';</script>";
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
            require_once ROOT . "/app/views/gerenciador/editarTamanho.php";
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }

    public function atualizar()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            $editar = $this->edita();
            if ($editar) {
                echo "<script>alert('Tamanho atualizado com sucesso!'); window.location.href = '/?router=Tamanhos/tamanhos';</script>";
                exit;
            }  
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }

    public function deletar()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            $t_id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $deletar = $this->delete($t_id);
            if ($deletar) {
                echo "<script>alert('Tamanho excluído com sucesso!'); window.location.href = '/?router=Tamanhos/tamanhos';</script>";
                exit;
                echo "<script>alert('Falha ao excluir o tamanho.'); window.location.href = '/?router=Tamanhos/tamanhos';</script>";
                exit;
            }
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }
}