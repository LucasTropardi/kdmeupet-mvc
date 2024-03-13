<?php

namespace app\controllers;

use app\models\Raca;

class Racas extends Raca
{
    public function racas()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            $racas = $this->listaRacas();
            require_once ROOT . "/app/views/partials/navbar3.php";
            require_once ROOT . "/app/views/gerenciador/racas.php";
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }

    public function criar()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            $especies = $this->getEspecies();
            require_once ROOT . "/app/views/partials/navbar3.php";
            require_once ROOT . "/app/views/gerenciador/cadastrarRaca.php";
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }

    public function store()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            $cadastrar = $this->cadastra();
            if ($cadastrar) {
                echo "<script>alert('Raça cadastrada com sucesso!'); window.location.href = '/?router=Racas/racas';</script>";
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
            $especies = $this->getEspecies();
            require_once ROOT . "/app/views/partials/navbar3.php";
            require_once ROOT . "/app/views/gerenciador/editarRaca.php";
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }

    public function atualizar()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            $editar = $this->edita();
            if ($editar) {
                echo "<script>alert('Raça atualizada com sucesso!'); window.location.href = '/?router=Racas/racas';</script>";
                exit;
            }  
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }

    public function deletar()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            $r_id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $deletar = $this->delete($r_id);
            if ($deletar) {
                echo "<script>alert('Raça excluída com sucesso!'); window.location.href = '/?router=Racas/racas';</script>";
                exit;
                echo "<script>alert('Falha ao excluir a raça.'); window.location.href = '/?router=Racas/racas';</script>";
                exit;
            }
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }
}