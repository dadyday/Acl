<?php
require __DIR__.'/cfg.php';

use Tester\Assert as Is;

$aCfg = include('testcfg.php');

$oAcl = new Acl\Acl($aCfg);

$aUser = $oAcl->getUsers();

Is::type('array', $aUser);
Is::count(1, $aUser);


$oUser = $oAcl->getUser('realuser');

$aRole = $oUser->getRoles();
Is::type('array', $aRole);
Is::count(1, $aRole);

$aPerm = $oUser->getPermissions();
Is::type('array', $aRole);
Is::count(1, $aPerm);


Is::type(Acl\User::class, $oUser);
Is::false($oUser->isAllowed('not-defined'));
Is::true($oUser->isAllowed('login'));

#Is::true($oUser->isAllowed('send-message'));
#Is::false($oUser->isAllowed('edit-user'));
