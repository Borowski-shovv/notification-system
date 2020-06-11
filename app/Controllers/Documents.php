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
		helper('form');
		$data = [];
		if(!session()->get('isLoggedIn'))
		redirect()->to('/');
		
		if($this->request->getMethod() == 'post'){
			
			$rules = [
				'clientname' => 'required',
				'comment' => 'max_length[255]',
				#'amount' => 'required'
			];
			
			if(! $this->validate($rules)){
				$data['validation'] = $this->validator;
			}else{
				$model = new DocumentsModel();	

				$newNotification = [
					'd_clientname' => $this->request->getVar('clientname'),
					'd_comment' => $this->request->getVar('comment'),
					'd_amount' => $this->request->getVar('amount'),
					'd_paydate' => $this->request->getVar('paydate'),
					'd_paymentmodel' => $this->request->getVar('paymentmodel')
				];
				
				$model->save($newNotification);

			return redirect()->to('/documents');
			}

		}

		echo view('templates/header', $data);
		echo view('documents-create', $data);
		echo view('templates/footer', $data);

	}

	
	//--------------------------------------------------------------------

}
