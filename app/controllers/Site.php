<?php

namespace app\controllers;

class Site
{
    public function home()
    {
        require_once ROOT . "/app/views/partials/navbar1.php";
        require_once ROOT . "/app/views/publics/home.php";
    }

    public function achados()
    {
        require_once ROOT . "/app/views/partials/navbar1.php";
        require_once ROOT . "/app/views/publics/achados.php";
    }

    public function adotar()
    {
        require_once ROOT . "/app/views/partials/navbar1.php";
        require_once ROOT . "/app/views/publics/adotar.php";
    }

    public function localizacoes()
    {
        require_once ROOT . "/app/views/partials/navbar1.php";
        require_once ROOT . "/app/views/publics/localizacoes.php";
    }

    public function parcerias()
    {
        require_once ROOT . "/app/views/partials/navbar1.php";
        require_once ROOT . "/app/views/publics/parcerias.php";
    }

    public function perdidos()
    {
        require_once ROOT . "/app/views/partials/navbar1.php";
        require_once ROOT . "/app/views/publics/perdidos.php";
    }
}