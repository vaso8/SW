<?php

namespace App\Core;

use App\Core\Contract\RedirectInterface;

class Redirect extends Services implements RedirectInterface
{
    protected $lastPage;


    public function __construct($app)
    {
        $this->app = $app;
        
    }

    public function redirecTo($url) : void
    {
        header("Location: http://scandiweb.test/" . $url);
    }

    public function back()
    {
        $this->lastPage ? header("Location: http://scandiweb.test/" . $this->lastPage) : null;
    }

    public function getLastPage() : string
    {
        return $this->lastPage;
    }

    public function setLastPage()
    {
        if($_SERVER['HTTP_REFERER']) {
            $this->lastPage = $_SERVER['HTTP_REFERER'];
        } else {
            $_SESSION['lastPage'] = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        }
        /*
        $history = $this->app->session->getHistory();
        if(isset($history) && count($history) > 1){
            $this->lastPage = $this->app->session->getHistory()[0];
        }*/
    }
}