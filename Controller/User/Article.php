<?php
namespace Controller\User;

class Article extends \Controller\App
{
	public function index()
	{
		$this->render('user.article');
	}
}
