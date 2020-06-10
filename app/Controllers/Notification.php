<?php 

namespace App\Controllers;

class Notification extends BaseController
{
	
	public function index()
	{
	
		$data = [];
		if(!session()->get('isLoggedIn'))
		redirect()->to('/');

		echo view('templates/header', $data);
		echo view('notification', $data);
		echo view('templates/footer', $data);
	}

	public function create(){
		$data = [];
		if(!session()->get('isLoggedIn'))
		redirect()->to('/');

		echo view('templates/header', $data);
		echo view('notification-create', $data);
		echo view('templates/footer', $data);
	}

	
	//--------------------------------------------------------------------

}
