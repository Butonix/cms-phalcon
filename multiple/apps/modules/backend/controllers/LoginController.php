<?php

namespace Modules\Backend\Controllers;

use Phalcon\Mvc\Controller;

class LoginController extends Controller
{

	public function indexAction()
	{
		var_dump('IndexController zingAction');
		die();
		$this->view->disable();
	}
}
