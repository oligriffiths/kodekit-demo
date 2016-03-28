<?php
/**
 * Kodekit Platform - http://www.timble.net/kodekit
 *
 * @copyright	Copyright (C) 2011 - 2016 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		MPL v2.0 <https://www.mozilla.org/en-US/MPL/2.0>
 * @link		https://github.com/timble/kodekit-platform for the canonical source repository
 */

/**
 * Framework loader
 *
 * @author Johan Janssens <http://github.com/johanjanssens>
 */

use Kodekit\Library;

// Max error reporting
error_reporting(E_ALL);

define( 'DS', DIRECTORY_SEPARATOR );
define('APPLICATION_ROOT' , realpath($_SERVER['DOCUMENT_ROOT']));
define('APPLICATION_BASE' , APPLICATION_ROOT.'/application/site');

// Bootstrap the framework
$config_file = APPLICATION_ROOT.'/config/bootstrapper.php';
$config = file_exists($config_file) ? require $config_file : [];

// Setup KodeKit
require_once APPLICATION_ROOT.'/vendor/oligriffiths/kodekit/kodekit.php';
$kodekit = Kodekit::getInstance(array(
    'debug'           =>  isset($config['debug']) ? $config['debug'] : false,
    'cache'           =>  isset($config['cache']) ? $config['cache'] : false,
    'cache_namespace' =>  isset($config['cache_namespace']) ? $config['cache_namespace'] : false,
    'base_path'       =>  APPLICATION_BASE
));

// Bootstrap the application
$bootstrapper
    = Library\ObjectManager::getInstance()->getObject('object.bootstrapper')
    ->registerComponents($kodekit->getRootPath().'/application/site/component')
    ->registerComponents($kodekit->getRootPath().'/component');

// Load the bootstrapper config
if (file_exists($kodekit->getRootPath(). '/config/bootstrapper.php')) {
    $bootstrapper->registerFile($kodekit->getRootPath(). '/config/bootstrapper.php');
}

$bootstrapper->bootstrap();


require_once __DIR__ . '/../../../vendor/oligriffiths/kodekit-application/autoload.php';

