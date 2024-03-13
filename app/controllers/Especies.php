<?php

namespace app\controllers;

use app\models\Especie;

class Especies extends Especie
{
    public function especies()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            $especies = $this->listaEspecies();
            require_once ROOT . "/app/views/partials/navbar3.php";
            require_once ROOT . "/app/views/gerenciador/especies.php";
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }

    public function criar()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            require_once ROOT . "/app/views/partials/navbar3.php";
            require_once ROOT . "/app/views/gerenciador/cadastrarEspecie.php";
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }

    public function store()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            $cadastrar = $this->cadastra();
            if ($cadastrar) {
                echo "<script>alert('Espécie cadastrada com sucesso!'); window.location.href = '/?router=Especies/especies';</script>";
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
            require_once ROOT . "/app/views/gerenciador/editarEspecie.php";
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }

    public function atualizar()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            $editar = $this->edita();
            if ($editar) {
                echo "<script>alert('Espécie atualizada com sucesso!'); window.location.href = '/?router=Especies/especies';</script>";
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
                echo "<script>alert('Espécie excluída com sucesso!'); window.location.href = '/?router=Especies/especies';</script>";
                exit;
                echo "<script>alert('Falha ao excluir a espécie.'); window.location.href = '/?router=Especies/especies';</script>";
                exit;
            }
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }
}