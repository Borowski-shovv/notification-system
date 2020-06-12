<?php namespace App\Models;

use CodeIgniter\Model;

class DocumentsModel extends Model{
    protected $table = 'documents';
    protected $allowedFields = ['d_id', 'd_clientname', 'd_comment', 'd_amount', 'd_paydate', 'd_paymentmodel'];
    protected $db;
    
    function __construct() {
        $this->db = \Config\Database::connect();
    }

   public function getAllDocuments() {
    $query = $this->db->query("SELECT * FROM documents");
    if($result = $query->getResult()) {
        return $result;
    } 
    else {
        return false;
    }
   }

   public function getDocument($document_id) {
    $query = $this->db->query("SELECT * FROM documents WHERE d_id = $document_id");
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