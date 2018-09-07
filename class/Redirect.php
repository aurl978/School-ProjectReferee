<?php

class Redirect
{

    public function toRoot()
    {
        header('Location: ' . URL);
    }
    
    public function redirection($location)
    {
        header('Location: ' . URL . $location);
        die();
    }

    public function redirect404()
    {
        header('Location: ' . URL . 'server/err404');
        die();
    }

    public function redirect403()
    {
        header('Location: ' . URL . 'server/err403');
        die();
    }

    public function redirect500()
    {
        header('Location: ' . URL . 'server/err500');
        die();
    }

}