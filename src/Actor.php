<?php
namespace Acl;

class Actor {

	protected
		$oAcl,
		$aRole = [],
		$aPermission = [];

	public
		$name;

	function __construct(Acl $oAcl, $name, array $aCfg = []) {
		$this->oAcl = $oAcl;
		$this->name = $name;
		$this->addConfig($aCfg);
	}

	function addConfig(array $aCfg) {
		$aCfg = array_merge([
			'roles' => [],
			'permissions' => [],
		], $aCfg);

		$this->aRole = $aCfg['roles'];
		$this->addPermissions($aCfg['permissions']);
	}

	function getRoles() {
		return $this->aRole;
	}

	function addPermissions(array $aPerm) {
		foreach ($aPerm as $name => $allow) {
			if (is_numeric($name)) {
				$name = $allow;
				$allow = true;
			}
			$this->addPermission($name, $allow);
		}
	}

	function addPermission($name, $allow = true) {
		$this->aPermission[$name] = $allow;
	}

	function getPermissions($filter = null) {
		return $this->aPermission;
	}

	function getPermission($name, $default = null) {
		return isset($this->aPermission[$name]) ? $this->aPermission[$name] : $default;
	}

	function isAllowed($name) {
		return !!$this->getPermission($name);
	}

	function isNotAllowed($name) {
		return !$this->getPermission($name);
	}
}
