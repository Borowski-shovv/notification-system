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
		$data['trololo'] = true;
		if($this->request->getMethod() == 'post'){
			
			$rules = [
				'clientname' => 'required',
				'comment' => 'max_length[255]',
				'amount' => 'required'
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

	public function update($document_id){
		helper('form');
		if(!session()->get('isLoggedIn'))
		redirect()->to('/');

		$data['trololo'] = false;
		$model = new DocumentsModel();
		$data['document'] = $model->getDocument($document_id);
		if($this->request->getMethod() == 'post'){
			
			$rules = [
				'clientname' => 'required',
				'comment' => 'max_length[255]',
				'amount' => 'required'
			];
			
			if(! $this->validate($rules)){
				$data['validation'] = $this->validator;
			}else{
				$model = new DocumentsModel();	

				$updateNotification = [
	
					'd_clientname' => $this->request->getVar('clientname'),
					'd_comment' => $this->request->getVar('comment'),
					'd_amount' => $this->request->getVar('amount'),
					'd_paydate' => $this->request->getVar('paydate'),
					'd_paymentmodel' => $this->request->getVar('paymentmodel')
				];
				
				$model->save($updateNotification);
				$session->setFlashdata('success', 'Notyfikacja została zmieniona');
			return redirect()->to('/documents-update');
			}

		}


		echo view('templates/header', $data);
		echo view('documents-update', $data);
		echo view('templates/footer', $data);
	}

	//--------------------------------------------------------------------

}
