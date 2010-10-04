<?php

if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'Crypt_RC42_AllTests::main');
}

require_once 'PHPUnit/TextUI/TestRunner.php';

require_once 'Crypt_RC42Test.php';

class Crypt_RC42_AllTests
{
    public static function main()
    {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('PEAR - Crypt_RC42');

        $suite->addTestSuite('Crypt_RC42Test');

        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == 'Crypt_RC42_AllTests::main') {
    Crypt_RC42_AllTests::main();
}
