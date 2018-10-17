<?php
namespace Acl;

class User extends Actor {

	public
		$name,
		$fullName,
		$password;

	function __construct(Acl $oAcl, $name, array $aCfg = []) {
		$this->name = $name;
		parent::__construct($oAcl, $name, $aCfg);
	}

	function addConfig(array $aCfg) {
		$aCfg = array_merge([
			'name' => $this->name,
			'passw' => null,
		], $aCfg);

		$this->fullName = $aCfg['name'];
		$this->password = $aCfg['passw'];
		parent::addConfig($aCfg);
	}
}
