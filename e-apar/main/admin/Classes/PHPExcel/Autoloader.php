<?php
/**
 * PHPExcel
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2012 PHPExcel
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    1.7.8, 2012-10-12
 */

// Prevent redefinition of PHPEXCEL_ROOT
if (!defined('PHPEXCEL_ROOT')) {
    define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../');
}

PHPExcel_Autoloader::Register();

PHPExcel_Shared_ZipStreamWrapper::register();

// check mbstring.func_overload
if (ini_get('mbstring.func_overload') & 2) {
    throw new Exception('Multibyte function overloading in PHP must be disabled for string functions (2).');
}

PHPExcel_Shared_String::buildCharacterSets();

/**
 * PHPExcel_Autoloader
 *
 * @category    PHPExcel
 * @package     PHPExcel
 * @copyright   Copyright (c) 2006 - 2012 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Autoloader
{
    /**
     * Register the Autoloader with SPL
     */
    public static function Register() {
        if (function_exists('__autoload')) {
            // Register any existing autoloader function with SPL, so we don't get any clashes
            spl_autoload_register('__autoload');
        }
        // Register ourselves with SPL
        return spl_autoload_register(array('PHPExcel_Autoloader', 'Load'));
    }

    /**
     * Autoload a class identified by name
     *
     * @param    string    $pClassName    Name of the object to load
     */
    public static function Load($pClassName){
        if ((class_exists($pClassName, FALSE)) || (strpos($pClassName, 'PHPExcel') !== 0)) {
            // Either already loaded, or not a PHPExcel class request
            return FALSE;
        }

        $pClassFilePath = PHPEXCEL_ROOT .
                          str_replace('_', DIRECTORY_SEPARATOR, $pClassName) .
                          '.php';

        if ((file_exists($pClassFilePath) === false) || (is_readable($pClassFilePath) === false)) {
            // Can't load
            return FALSE;
        }

        require($pClassFilePath);
    }
}

