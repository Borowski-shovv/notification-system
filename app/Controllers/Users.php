<?php namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
	public function index()
	{
		$data = [];
		helper(['form']);


		if($this->request->getMethod() == 'post'){
			//validation rules
			$rules = [
				'email' => 'required|min_length[6]|max_length[50]|valid_email',
				'password' => 'required|min_length[8]|max_length[255]|validateUser[email, password]',
			];

			$errors = [
				'password' => ['validateUser' => 'Podany email lub hasło jest niepoprawne']
			];
		
			if(! $this->validate($rules, $errors)) {
				//jezeli walidacja nie przeszła, wyslij blad do formularza(register.php - zostana wyswietlone bledy)
				$data['validation'] = $this->validator;
			}else{
				// jezeli walidacacja przebiegla pomyslnie - ZALOGUJ SIE DO PANELU ADMINISTRACYJNEGO i zbuduj USER SESSION
				$model = new UserModel();
				
			}
		}

		echo view('templates/header', $data);
		echo view('login');
		echo view('templates/footer', $data);
	}

	public function register(){
		$data = [];
		helper(['form']);

		if($this->request->getMethod() == 'post'){
			//validation rules
			$rules = [
				'firstname' => 'required|min_length[3]|max_length[20]',
				'lastname' => 'required|min_length[3]|max_length[20]',
				'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
				'password' => 'required|min_length[8]|max_length[255]',
				'password_confirm' => 'matches[password]',
			];
		
			if(! $this->validate($rules)) {
				//jezeli walidacja nie przeszła, wyslij blad do formularza(register.php - zostana wyswietlone bledy)
				$data['validation'] = $this->validator;
			}else{
				// jezeli walidacacja przebiegla pomyslnie - wyslij dane do DB
				$model = new UserModel();

				$newData = [
					'firstname' => $this->request->getVar('firstname'),
					'lastname' => $this->request->getVar('lastname'),
					'email' => $this->request->getVar('email'),
					'password' => $this->request->getVar('password')
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Rejestracja przebigła pomyślnie');
				// przekierowanie na strone Logowania
				return redirect()->to('/');
			}
		}

		echo view('templates/header', $data);
		echo view('register');
		echo view('templates/footer', $data);
	}

	//--------------------------------------------------------------------

}
