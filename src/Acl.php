<?php
namespace Acl;

class Acl {

	protected
		$aUser = [],
		$aRole = [];

	function __construct($aCfg = []) {
		if ($aCfg) $this->addConfig($aCfg);
	}

	function addConfig(array $aCfg) {
		$aCfg = array_merge([
			'users' => [],
			'roles' => [],
			'permissions' => [],
		], $aCfg);

		$this->addUsers($aCfg['users']);
		$this->addRoles($aCfg['roles']);
		$this->addPermissions($aCfg['permissions']);
	}

	function addUsers(array $aUsersCfg) {
		foreach ($aUsersCfg as $name => $aCfg) {
			$this->addUser($name, $aCfg);
		}
	}

	function addUser($name, $aCfg) {
		if (isset($this->aUser[$name])) return $this->_error("user $name already exists");

		$this->aUser[$name] = new User($this, $name, $aCfg);
	}

	function getUsers() {
		return $this->aUser;
	}

	function getUser($name) {
		return isset($this->aUser[$name]) ? $this->aUser[$name] : null;
	}



	function addRoles(array $aRolesCfg) {
		foreach ($aRolesCfg as $name => $aCfg) {
			$this->addRole($name, $aCfg);
		}
	}

	function addRole($name, $aCfg) {
		if (isset($this->aRole[$name])) return $this->_error("role $name already exists");

		$this->aRole[$name] = new Role($this, $name, $aCfg);
	}


	function addPermissions(array $aPermsCfg) {
		foreach ($aPermsCfg as $name => $aCfg) {
			$this->addPermission($name, $aCfg);
		}
	}

	function addPermission($name, $aCfg) {
		$aCfg = array_merge([
			'desc' => null,
			'users' => [],
			'roles' => [],
			'permissions' => [],
		], $aCfg);

		$this->aPermission[$name] = new Permission($this, $name, $aCfg['desc']);
	}


	protected function _error($message) {
		throw new \Exception($message);
	}
}
