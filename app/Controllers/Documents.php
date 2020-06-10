<?php 

namespace App\Controllers;
use App\Models\DocumentsModel;

class Documents extends BaseController
{
	
	public function index()
	{
		
		$data = [];
		if(!session()->get('isLoggedIn'))
		redirect()->to('/');

		$model = new DocumentsModel();		

		$data['documents'] = null;

		if($documents = $model->getAllDocuments()){
			$data['documents'] = $documents;
		}

		echo view('templates/header', $data);
		echo view('documents', $data);
		echo view('templates/footer', $data);
	}

	public function create(){
		$data = [];
		if(!session()->get('isLoggedIn'))
		redirect()->to('/');

		echo view('templates/header', $data);
		echo view('documents-create', $data);
		echo view('templates/footer', $data);
	}

	
	//--------------------------------------------------------------------

}
