<?php namespace App\Models;

use CodeIgniter\Model;

class DocumentsModel extends Model{
    protected $table = '';
    protected $allowedFields = ['d_id', 'd_clientname', 'd_comment', 'd_amount', 'd_paydate', 'd_paymentmodel'];
    // protected $beforeInsert = ['beforeInsert'];
    // protected $beforeUpdate = ['beforeUpdate'];

    // protected function beforeInsert(array $data){
    //    $data = $this->passwordHash($data);
    //    return $data;
    // }
    
    // protected function beforeUpdate(array $data){
    //     $data = $this->passwordHash($data);
    //     return $data;
    // }

   public function getAllDocuments() {
    $db      = \Config\Database::connect();
    $query = $db->query("SELECT * FROM documents");
    if($result = $query->getResult()) {
        return $result;
    } 
    else {
        return false;
    }
   }
}

# za kazdym razem kiedy wysylamy ZADANIE (request) aby USERMODEL.PHP wstawil cos do naszej bazy danych
# uruchamiana jest funkcja beforeInsert aby sprawdzic instrukcje dodawania nowych elementow do bazy danych
# funckja beforeUpdate jest uruchamiana przed updatem bazy danych