<?php
/**
 * Class that will be the subject of testing
 *
 * @author    severin
 * @since     28/08/12, 8:32 AM
 */
class TestSubject {

	/**
	 * The user's ID number, found on their identity card
	 *
	 * @var null
	 */
	private $idNumber = NULL;

	/**
	 * User's first and last names
	 *
	 * @var null
	 */
	private $userName = NULL;

	/**
	 * We will populate FirstName with the result of the SplitName method
	 *
	 * @var null
	 */
	private $firstName = NULL;

	/**
	 * We will populate Surname with the result of the SplitName method
	 *
	 * @var null
	 */
	private $surname = NULL;

	public function setIdNumber($idNumber) {
		if (is_integer($idNumber)) {
			$this->idNumber = $idNumber;
		} else {
			throw new InvalidArgumentException("Id number is not of type Integer!!!");
		}
	}

	public function getIdNumber() {
		return $this->idNumber;
	}

	public function setUserName($userName) {
		if (is_string($userName)) {
		$this->userName = $userName;
		} else {
			throw new InvalidArgumentException("userName is not of type String!");
		}
	}

	public function getUserName() {
		return $this->userName;
	}

	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}

	public function getFirstName() {
		return $this->firstName;
	}

	public function setSurname($surname) {
		$this->surname = $surname;
	}

	public function getSurname() {
		return $this->surname;
	}

	/**
	 * Split $this->UserName into First and Surname, or
	 * $specifiedName if user provides it
	 *
	 * @param null $specifiedName
	 * @throws InvalidArgumentException
	 * @throws LengthException
	 */
	public function splitName($specifiedName = NULL) {

		// Process $specifiedName if it has been provided
		if ($specifiedName != NULL) {
			if (is_string($specifiedName)) {
				if (strlen($specifiedName) < 5) {
					throw new LengthException('String for specifiedName is too short!');
				} else {
					$this->setUserName($specifiedName);
				}
			} else {
				throw new InvalidArgumentException('Value provided for specifiedName is not a string!');
			}
		} else {
			$preassignedName = $this->getUserName();
			if (is_string($preassignedName)) {
				if (strlen($preassignedName) < 5) {
					throw new LengthException('String for preassignedName is too short!');
				}
			} else {
				throw new InvalidArgumentException('Value provided for preassignedName is not a string!');
			}
			unset($preassignedName);
		}

		// Now do the actual string splitting work
		$rawName = $this->getUserName();
		$nameLength = strlen($rawName);

		for ($position = $nameLength; $position > 0; $position--) {
			if (substr($rawName, $position, 1) == ' ') {
				$this->setFirstName(substr($rawName, 0, $position));
				$this->setSurname(substr($rawName, $position + 1, $nameLength));
				break;
			}
		}

	}

}
