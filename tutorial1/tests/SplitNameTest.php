<?php

require_once 'TestSubject.php';
require_once 'PHPUnit/Autoload.php';


/**
 * newClass
 *
 * @author    severin
 * @since     28/08/12, 12:06 PM
 */
class SplitNameTest extends PHPUnit_Framework_TestCase {

	/** @var $instance TestSubject */
	var $instance;

	function setUp() {
		$this->instance = new TestSubject();
	}

	function tearDown() {
		unset($this->instance);
	}

	/**
	 * @expectedException LengthException
	 */
	function testNameTooShortPresetName() {
		$this->instance->setUserName("bob");
		$this->instance->splitName();
	}

	/**
	 * @expectedException LengthException
	 */
	function testNameTooShortPostsetName() {
		$this->instance->splitName("bob");
	}

	/**
	 * @expectedException InvalidArgumentException
	 */
	function testNameWrongTypePostSet() {
		$this->instance->splitName(54);
	}

	function testSingleSpaceSplitFirstNamePreset() {
		$this->instance->setUserName("Bobby Brown");
		$this->instance->splitName();
		$this->assertEquals("Bobby", $this->instance->getFirstName());
	}

	function testSingleSpaceSplitSurnamePreset() {
		$this->instance->setUserName("Bobby Brown");
		$this->instance->splitName();
		$this->assertEquals("Brown", $this->instance->getSurname());
	}

	function testSingleSpaceSplitFirstNamePostSet() {
		$this->instance->splitName("Bobby Brown");
		$this->assertEquals("Bobby", $this->instance->getFirstName());
	}

	function testSingleSpaceSplitSurnamePostSet() {
		$this->instance->splitName("Bobby Brown");
		$this->assertEquals("Brown", $this->instance->getSurname());
	}

	function testMultiSpaceSplitFirstNamePreset() {
		$this->instance->setUserName("Bobby B Brown");
		$this->instance->splitName();
		$this->assertEquals("Bobby B", $this->instance->getFirstName());
	}

	function testMultiSpaceSplitSurnamePreset() {
		$this->instance->setUserName("Bobby B Brown");
		$this->instance->splitName();
		$this->assertEquals("Brown", $this->instance->getSurname());
	}

	function testMultiSpaceSplitFirstNamePostSet() {
		$this->instance->splitName("Bobby B Brown");
		$this->assertEquals("Bobby B", $this->instance->getFirstName());
	}

	function testMultiSpaceSplitSurnamePostSet() {
		$this->instance->splitName("Bobby B Brown");
		$this->assertEquals("Brown", $this->instance->getSurname());
	}
}
