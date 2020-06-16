<?php namespace App\Models;

use CodeIgniter\Model;

class DocumentsModel extends Model{
    protected $table = 'documents';
    protected $primaryKey = 'd_id';
    protected $allowedFields = ['d_clientname', 'd_comment', 'd_amount', 'd_paydate', 'd_paymentmodel'];
    protected $db;
    
    function __construct() {
        $this->db = \Config\Database::connect();
    }

   public function getAllDocuments() {
    $query = $this->db->query("SELECT * FROM documents LEFT JOIN notifications ON d_id = n_d_id");
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

