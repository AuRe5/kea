<?php

use Silex\Application;
use Silex\ControllerProviderInterface;

class AdminControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        // creates a new controller based on the default route
        $controllers = $app['controllers_factory'];

        $controllers->get('/', function (Application $app) {
            
            return 'yeeehaaaa';
            /*$secret = $app->get('secret');
			return $secret;

			for($i=1;$i<10;$i++)
				$ret .= $i."<br/>";

		    return 'Admin-Area<br/><br/>'.$ret;
            return $app->redirect('/hello');*/
        });

        return $controllers;
    }
}


?>