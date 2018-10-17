<?php
namespace Acl;

class Role extends Actor {

	function __construct(Acl $oAcl, $name, array $aCfg = []) {
		parent::__construct($oAcl, $name, $aCfg);
	}
}
