<?php

namespace App\Core;

use App\Core\Contract\AppRequestInterface;
use App\Core\Contract\AppRouteInterface;
use App\Core\Contract\AppSessionInterface;
use App\Core\Contract\AppURLInterface;
use App\Core\Traits\AppRequestTrait;
use App\Core\Traits\AppRouteTrait;
use App\Core\Traits\AppSessionTrait;
use App\Core\Traits\AppURLTrait;

class App implements AppRouteInterface, AppRequestInterface, AppSessionInterface, AppURLInterface
{
    use AppRequestTrait;
    use AppRouteTrait;
    use AppSessionTrait;
    use AppURLTrait;

    /**
     * Session Instance
     * @var \App\Core\Session $session
     */
    public $session;


    /**
     * Redirect Instance
     * @var \App\Core\Session $redirect
     */
    public $redirect;

    /**
     * Route instance
     * @var \App\Core\Route $route
     */
    public $route;

    /**
     * Request instance
     * @var \App\Core\Request $request
     */
    public $request;

    /**
     * Url Instance
     * @var \App\Core\Url $url
     */
    public $url;

    /**
     * Validate Instance
     * @var \App\Core\Validate $validate
     */
    public $validate;
    


    public function __construct()
    {
        // Initialaize services/clases
        $this->session     = new Session($this);
        $this->request     = new Request($this);
        $this->url         = new Url($this);
        $this->route       = new Route($this, $this->request);
        $this->redirect    = new Redirect($this);
        $this->validate    = new Validate($this);
        

        // Set App instance to serveces
        /*
        $this->session->setApp($this);
        $this->request->setApp($this);
        $this->url->setApp($this);
        $this->route->setApp($this);
        $this->redirect->setApp($this);
        */
        



        ////////////////////////////////
        // Set URL
        $this->setURL();

        // Set Browsing history
        $this->setHistory($this->url);

        // Set last/previus page
        $this->redirect->setLastPage();

        // Set Route; Set Route's Controller and Method
        $this->setRouteControllerAndMethod($this->route, $this->request, $this->url);
        $this->setRoute($this->route, $this->request, $this->url);

        // Set Request Attributes
        $this->setRequestAttribute($this->url, $this->request);
        $this->setInput($this->request);
        
    }

    




}