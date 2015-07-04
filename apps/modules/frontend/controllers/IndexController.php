<?php

namespace Modules\Frontend\Controllers;

use Phalcon\Mvc\Controller;
use \Modules\Models\Services\Services as Services;

class IndexController extends Controller
{

	public function indexAction()
	{
		var_dump('IndexController indexAction');
		// try {
  //       	$this->view->users = Services::getService('User')->getLast();
  //           var_dump($this->view->users );
  //       } catch (\Exception $e) {
  //       	$this->flash->error($e->getMessage());
  //       }

		// die();
	}
	public function zingAction()
	{
		var_dump('IndexController zingAction');
		die();
	}
}
