<?php
namespace Tests\Unit;

use App\Core\App;
use PHPUnit\Framework\TestCase;

class ServicesTest extends TestCase
{
    /**
     * App has services instances
     * 
     * @test
     */
    public function app_has_serveices_instances()
    {
        $app = new App();

        //$app->route->app;
        $this->assertInstanceOf(App::class, $app);
    }
}