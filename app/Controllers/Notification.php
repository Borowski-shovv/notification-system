<?php namespace App\Controllers;

class Notification extends BaseController
{
	public function index()
	{
		$data = [];
		if(!session()->get('isLoggedIn'))
		redirect()->to('/');
		
		echo view('templates/header', $data);
		echo view('notification');
		echo view('templates/footer', $data);
	}

	//--------------------------------------------------------------------

}
