<?php

namespace Modules\Frontend\Controllers;

use Phalcon\Mvc\Controller;

class ProductsController extends Controller
{

	public function indexAction()
	{
		return $this->response->redirect('login');
	}
}
