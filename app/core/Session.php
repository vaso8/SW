<?php

namespace App\Core;

use App\Core\Contract\SessionInterface;

class Session extends Services implements SessionInterface
{
    public function __construct($app)
    {
        session_start();
        $this->app = $app;
        $this->initHistory();
        $_SESSION['error'] = [];
    }


    public function getHistory()
    {
        return $_SESSION["history"];
    }

/*
    public function setHistory() : void
    {
        $url = $this->app->url->getURl();
        if('favicon.ico' != $url &&  (empty($_SESSION['history'][0]) || $_SESSION['history'][0] != $url)) {
            array_unshift($_SESSION['history'], $url);
            if(count($_SESSION['history']) > 2) {
                array_pop($_SESSION['history']);
            }
        }   
    }
*/
    private function initHistory()
    { 
        if(!isset($_SESSION["history"]) || count($_SESSION["history"]) == 0){
            $_SESSION["history"] = [];
        }
    }
}