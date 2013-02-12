<?php
/**
 * Unit Test Bootstrap
 */

function my_autoloader($class) {
    include __DIR__ . '/../library/' . str_replace('_', '/', $class) . '.php';
}

spl_autoload_register('my_autoloader');
