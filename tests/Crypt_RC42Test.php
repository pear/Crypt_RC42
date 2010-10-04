<?php
require_once "PHPUnit/Framework/TestCase.php";
require_once "Crypt/RC42.php";

//Unit test for PHP5 version of RC4
class Crypt_RC42Test extends PHPUnit_Framework_TestCase {
	private $_key = "PEAR";
	private $_message = "PEAR Rulez!";

	public function testSimpleEncryption()
	{
		$rc4 = new Crypt_RC42();
		$rc4->key($this->_key);
		$this->assertEquals('4kwQ6uYzPplnt0Q=', base64_encode($rc4->encrypt($this->_message)));
	}

	//Test simple decryption. Checking result
	public function testSimpleDecryption()
	{
		$rc4 = new Crypt_RC42();
		$rc4->key($this->_key);
		$this->assertEquals('PEAR Rulez!', $rc4->decrypt(base64_decode('4kwQ6uYzPplnt0Q=')));
	}

	//Test encryption and than decryption of the encrypted string. The result must be the same as the message at the start
	//This test is based on the usage example in the Rc4 class. It also test fix for PHP issue #22316
	public function testRoundRobinEncryption()
	{
		$rc4 = new Crypt_RC42();
		$rc4->key = $this->_key;
		$message = $rc4->encrypt($this->_message);
		$message = $rc4->decrypt($message);
		$this->assertEquals($this->_message, $message);
	}

	//test RC4 assigning key using the constructor
	public function testConstuctor()
	{
		$rc4 = new Crypt_RC42($this->_key);
		$this->assertEquals('4kwQ6uYzPplnt0Q=', base64_encode($rc4->encrypt($this->_message)));
	}
}

