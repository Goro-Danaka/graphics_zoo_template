<?php

/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    Router::prefix('Admin', function ($routes) {
        $routes->fallbacks('DashedRoute');
    });
    Router::prefix('Customer', function ($routes) {
        $routes->fallbacks('DashedRoute');
    });
    Router::prefix('Manager', function ($routes) {
        $routes->fallbacks('DashedRoute');
    });
    Router::prefix('Designer', function ($routes) {
        $routes->fallbacks('DashedRoute');
    });
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'index']);

    $routes->connect('/login', ['controller' => 'Pages', 'action' => 'login']);
    $routes->connect('/signup', ['controller' => 'Pages', 'action' => 'signup']);
    $routes->connect('/aboutus', ['controller' => 'Pages', 'action' => 'aboutus']);
    $routes->connect('/portfolio', ['controller' => 'Pages', 'action' => 'portfolio']);
    $routes->connect('/pricing', ['controller' => 'Pages', 'action' => 'pricing']);
    $routes->connect('/blog', ['controller' => 'Pages', 'action' => 'blog']);
    $routes->connect('/faq', ['controller' => 'Pages', 'action' => 'faq']);
    $routes->connect('/thankyou', ['controller' => 'Pages', 'action' => 'thankyou']);
    $routes->connect('/privacy-policy', ['controller' => 'Pages', 'action' => 'privacyPolicy']);
    $routes->connect('/terms-and-conditions', ['controller' => 'Pages', 'action' => 'termsAndConditions']);
    $routes->connect('/contactus', ['controller' => 'Pages', 'action' => 'contactus']);

    $routes->connect('/admin', ['controller' => 'Profiles', 'action' => 'dashboard', 'prefix' => 'admin', 'plugin' => FALSE]);
    $routes->connect('/manager', ['controller' => 'Profiles', 'action' => 'dashboard', 'prefix' => 'manager', 'plugin' => FALSE]);
    $routes->connect('/customer', ['controller' => 'Profiles', 'action' => 'dashboard', 'prefix' => 'customer', 'plugin' => FALSE]);
    $routes->connect('/designer', ['controller' => 'Profiles', 'action' => 'dashboard', 'prefix' => 'designer', 'plugin' => FALSE]);


    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->extensions(['json', 'html', 'xml']);
    $routes->fallbacks(DashedRoute::class);
});

/**
 * Load all plugin routes. See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();

require __DIR__ . DS . 'constants.php';
