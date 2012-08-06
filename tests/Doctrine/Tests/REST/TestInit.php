<?php

namespace Doctrine\Tests\REST;

error_reporting(E_ALL | E_STRICT);

function autoload($className)
{
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strripos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require $fileName;
}

$doctrinePath = '/var/www/magicrainbowadventure.com/bundles/doctrine';
require $doctrinePath . '/lib/Doctrine/ORM/Tools/Setup.php';
\Doctrine\ORM\Tools\Setup::registerAutoloadGit($doctrinePath);

spl_autoload_register('Doctrine\Tests\REST\autoload');

set_include_path(
    __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'lib'
    . PATH_SEPARATOR .
    get_include_path()
);
