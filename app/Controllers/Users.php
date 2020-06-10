<?php namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
	public function index()
	{
		$data = [];
		helper(['form']);
	

		if($this->request->getMethod() == 'post'){

			$ip = $this->request->getIPAddress();

			//validation rules
			$rules = [
				'email' => 'required|min_length[6]|max_length[50]|valid_email',
				'password' => 'required|min_length[8]|max_length[255]|validateUser[email, password]',
			];

			$errors = [
				'password' => ['validateUser' => 'Podany email lub hasło jest niepoprawne']
			];

			$model = new UserModel();

			$user = $model->where('email', $this->request->getVar('email'))->first();
		
			if( !$this->validate($rules, $errors))
			{
				//jezeli walidacja nie przeszła, wyslij blad do formularza(login.php - zostana wyswietlone bledy)
				$data['validation'] = $this->validator;
				if ( $user )
				{
					$model->updateLoginInfo(false, $user['id'], $ip);
				}
			}
			else
			{
				// jezeli walidacacja przebiegla pomyslnie - ZALOGUJ SIE DO PANELU ADMINISTRACYJNEGO i zbuduj USER SESSION			
				$model->updateLoginInfo(true, $user['id'], $ip);
				$this->setUserSession($user);
				return redirect()->to('dashboard');
			}
		}

		//echo view('templates/header', $data);
		echo view('login/index', $data);
		//echo view('templates/footer', $data);
	}

	private function setUserSession($user){
		$data = [
			'id' => $user['id'],
			'firstname' => $user['firstname'],
			'lastname' => $user['lastname'],
			'email' => $user['email'],
			'isLoggedIn' => true,
		];

		session()->set($data);
	}



	public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}

	//--------------------------------------------------------------------

}
