<?php

namespace App\Core\Contract;

interface AppSessionInterface
{
    /**
     * Set History Current and Previus Page
     * 
     * @param object $url App\Core\Contract\URLInterface;
     */
    public function setHistory(URLInterface $url) : void;
}