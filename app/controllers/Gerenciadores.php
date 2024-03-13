<?php

namespace app\controllers;

use app\models\Gerenciador;

class Gerenciadores extends Gerenciador
{
    public function gerenciadores()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            $gerenciadores = $this->listaGerenciadores();
            require_once ROOT . "/app/views/partials/navbar3.php";
            require_once ROOT . "/app/views/gerenciador/gerenciadores.php";
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }

    public function criar()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            require_once ROOT . "/app/views/partials/navbar3.php";
            require_once ROOT . "/app/views/gerenciador/cadastrarGerenciador.php";
            $cadastrar = $this->cadastra();
            if ($cadastrar) {
                echo "<script>alert('Gerenciador cadastrado com sucesso!'); window.location.href = '/?router=Gerenciadores/gerenciadores';</script>";
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
            require_once ROOT . "/app/views/gerenciador/editarGerenciador.php";
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }

    public function atualizar()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            $editar = $this->edita();
            if ($editar) {
                echo "<script>alert('Gerenciador atualizado com sucesso!'); window.location.href = '/?router=Gerenciadores/gerenciadores';</script>";
                exit;
            }  
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }

    public function deletar()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            $g_id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $deletar = $this->delete($g_id);
            if ($deletar) {
                echo "<script>alert('Gerenciador excluído com sucesso!'); window.location.href = '/?router=Gerenciadores/gerenciadores';</script>";
                exit;
                echo "<script>alert('Falha ao excluir o gerenciador.'); window.location.href = '/?router=Gerenciadores/gerenciadores';</script>";
                exit;
            }
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }
}