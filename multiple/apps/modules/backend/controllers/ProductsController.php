<?php

namespace Modules\Backend\Controllers;

use Phalcon\Mvc\Controller;
use Multiple\Backend\Models\Products as Products;

class ProductsController extends Controller
{

	public function indexAction()
	{
		var_dump('admin ProductsController indexAction');
		die();
		$this->view->product = Products::findFirst();
	}
}
