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
				$session = session();
				$session->setFlashdata('newone', 'Notyfikacja została utworzona');

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

		if ( $document = $model->getDocument($document_id) )
		{
			$data['d_clientname'] = $document[0]->d_clientname;
			$data['d_comment'] = $document[0]->d_comment;
			$data['d_amount'] = $document[0]->d_amount;
			$data['d_paydate'] = $document[0]->d_paydate;


			if($this->request->getMethod() == 'post'){
				
				$data['d_clientname'] = $this->request->getVar('clientname');
				$data['d_comment'] = $this->request->getVar('comment');
				$data['d_amount'] = $this->request->getVar('d_amount');
				$data['d_paydate'] = $this->request->getVar('d_paydate');


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
					
					$model->update($document_id ,$updateNotification);
					$session = session();
				$session->setFlashdata('editone', 'Notyfikacja została zaktualizowana');
					

				return redirect()->to('/documents');
				
				}
			}

		}
		else
		{
				// Dokument o podany ID nie istnieje
		}


		echo view('templates/header', $data);
		echo view('documents-update', $data);
		echo view('templates/footer', $data);
	}

	public function delete($document_id) {
		if(!session()->get('isLoggedIn'))
		redirect()->to('/');

		$data['trololo'] = false;

		$model = new DocumentsModel();

		if($model->delete($document_id)){


			$session = session();
			$session->setFlashdata('success', 'Notyfikacja została usunięta');
			return redirect()->to('/documents');
		}


	}

	//--------------------------------------------------------------------

}
