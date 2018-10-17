<?php
namespace Acl;

class Permission {

	public
		$name,
		$description;

	function __construct(Acl $oAcl, $name, $desc = null) {
		$this->oAcl = $oAcl;
		$this->name = $name;
		$this->desc = $desc;
	}

}
