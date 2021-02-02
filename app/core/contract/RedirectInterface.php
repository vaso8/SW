<?php

namespace App\Core\Contract;

interface RedirectInterface
{
    public function back();

    /**
     * Redirect to given address
     * 
     * @param $url
     */
    public function redirecTo($url) : void;

    /**
     * Get last visited page
     * 
     * @return string $lastPage
     */
    public function getLastPage() : string;
}