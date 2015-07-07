<?php

namespace Modules\Backend\Controllers;

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{

	public function indexAction()
	{
		var_dump('IndexController zingAction');
		//die();
		//return $this->response->forward('login');
	}
}
