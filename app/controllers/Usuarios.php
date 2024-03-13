<?php

namespace app\controllers;

use app\models\Usuario;

class Usuarios extends Usuario
{
    public function usuarios()
    {
        if (isset($_SESSION['gerenciador_id'])) {
            $usuarios = $this->listaUsuarios();
            require_once ROOT . "/app/views/partials/navbar3.php";
            require_once ROOT . "/app/views/gerenciador/usuarios.php";
        } else {
            echo '<script>window.location.href = "/?router=AuthGerenciador/login";</script>';
        }
    }
}