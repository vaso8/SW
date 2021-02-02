<?php

namespace App\Core\Traits;

use App\Core\Contract\URLInterface;

trait AppSessionTrait
{
    /**
     * Set History Current and Previus Page
     * 
     * @param object $url App\Core\Contract\URLInterface;
     */
    public function setHistory(URLInterface $url) : void
    {
        $url = $url->getURl();
        if('favicon.ico' != $url &&  (empty($_SESSION['history'][0]) || $_SESSION['history'][0] != $url)) {
            array_unshift($_SESSION['history'], $url);
            if(count($_SESSION['history']) > 2) {
                array_pop($_SESSION['history']);
            }
        }   
    }
}