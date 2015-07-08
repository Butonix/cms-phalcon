<?php

namespace Modules\Backend\Controllers;

use Phalcon\Mvc\Controller;
use Modules\Models\Accounts\Users as Users;
class IndexController extends Controller
{

	public function indexAction()
	{
		$users = Users::findFirst();
		var_dump($users->updated_gmt);
		var_dump('IndexController zingAction');
		//die();
		//return $this->response->forward('login');
	}
}
