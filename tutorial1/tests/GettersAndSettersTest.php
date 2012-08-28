<?php

require_once 'TestSubject.php';
require_once 'PHPUnit/Autoload.php';

/**
 * Test the TestSubject class
 *
 * @author    severin
 * @since     28/08/12, 10:39 AM
 */
class GettersAndSettersTest extends PHPUnit_Framework_TestCase {

	var $instance;

	function setUp() {
		$this->instance = new TestSubject();
	}

	function tearDown() {
		unset($this->instance);
	}

	function testSetIdSimple() {
		$this->instance->setIdNumber(54);
		$this->assertEquals($this->instance->getIdNumber(), 54);
	}

	/**
	 * @expectedException InvalidArgumentException
	 */
	function testSetIdAsString() {
		$this->instance->setIdNumber("54");
	}

	function testSetUserNameSimple() {
		$this->instance->setUserName("Bobby Brown");
		$this->assertEquals($this->instance->getUserName(), "Bobby Brown");
	}

	/**
	 * @expectedException InvalidArgumentException
	 */
	function testSetUserNameIncorrectType() {
		$this->instance->setUserName(54);
	}

}
