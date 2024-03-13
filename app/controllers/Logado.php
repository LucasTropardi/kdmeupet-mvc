<?php

namespace app\controllers;

class Logado
{
    public function home()
    {
        if (isset($_SESSION['user_id'])) {
            require_once ROOT . "/app/views/partials/navbar2.php";
            require_once ROOT . "/app/views/logado/home.php";
        } else {
            echo '<script>window.location.href = "/?router=AuthLogin/login";</script>';
        }
    }

    public function achados()
    {
        if (isset($_SESSION['user_id'])) {
            require_once ROOT . "/app/views/partials/navbar2.php";
            require_once ROOT . "/app/views/logado/achados.php";
        } else {
            echo '<script>window.location.href = "/?router=AuthLogin/login";</script>';
        }
    }

    public function adotar()
    {
        if (isset($_SESSION['user_id'])) {
            require_once ROOT . "/app/views/partials/navbar2.php";
            require_once ROOT . "/app/views/logado/adotar.php";
        } else {
            echo '<script>window.location.href = "/?router=AuthLogin/login";</script>';
        }
    }

    public function localizacoes()
    {
        if (isset($_SESSION['user_id'])) {
            require_once ROOT . "/app/views/partials/navbar2.php";
            require_once ROOT . "/app/views/logado/localizacoes.php";
        } else {
            echo '<script>window.location.href = "/?router=AuthLogin/login";</script>';
        }
    }

    public function parcerias()
    {
        if (isset($_SESSION['user_id'])) {
            require_once ROOT . "/app/views/partials/navbar2.php";
            require_once ROOT . "/app/views/logado/parcerias.php";
        } else {
            echo '<script>window.location.href = "/?router=AuthLogin/login";</script>';
        }
    }

    public function perdidos()
    {
        if (isset($_SESSION['user_id'])) {
            require_once ROOT . "/app/views/partials/navbar2.php";
            require_once ROOT . "/app/views/logado/perdidos.php";
        } else {
            echo '<script>window.location.href = "/?router=AuthLogin/login";</script>';
        }
    }
}