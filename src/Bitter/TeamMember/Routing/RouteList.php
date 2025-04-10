<?php

namespace Bitter\TeamMember\Routing;

use Bitter\TeamMember\API\V1\Middleware\FractalNegotiatorMiddleware;
use Bitter\TeamMember\API\V1\Configurator;
use Concrete\Core\Routing\RouteListInterface;
use Concrete\Core\Routing\Router;

class RouteList implements RouteListInterface
{
    public function loadRoutes(Router $router)
    {
        $router
            ->buildGroup()
            ->setNamespace('Concrete\Package\TeamMember\Controller\Dialog\Support')
            ->setPrefix('/ccm/system/dialogs/team_member')
            ->routes('dialogs/support.php', 'team_member');
    }
}