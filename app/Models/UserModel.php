<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = 'users';
    protected $allowedFields = ['firstname', 'lastname', 'email', 'password'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data){
       $data = $this->passwordHash($data);
       return $data;
    }
    
    protected function beforeUpdate(array $data){
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function passwordHash(array $data){
        if(isset($data['data']['password']))
        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
    return $data;
    }

    public function updateLoginInfo($success, $user_id, $user_ip)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        if ( $success )
        {
            $builder->set('success_login', 'NOW()', FALSE);
        }
        else
        {
            $builder->set('failed_login', 'NOW()', FALSE);
        }

        $builder->set('login_address', $user_ip);
        $builder->where('id', $user_id);
        $builder->update();
    }

}

# za kazdym razem kiedy wysylamy ZADANIE (request) aby USERMODEL.PHP wstawil cos do naszej bazy danych
# uruchamiana jest funkcja beforeInsert aby sprawdzic instrukcje dodawania nowych elementow do bazy danych
# funckja beforeUpdate jest uruchamiana przed updatem bazy danych