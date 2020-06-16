<?php namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model{
    protected $table = 'notifications';
    protected $primaryKey = 'n_id';
    protected $allowedFields = ['n_paymentmodel', 'n_d_id'];
    protected $db;
    
    function __construct() {
        $this->db = \Config\Database::connect();
    }

    public function getDocument($document_id) {
        $query = $this->db->query("SELECT * FROM documents WHERE n_d_id = $document_id");
        if($result = $query->getResult()) {
            return $result;
        } 
        else {
            return false;
        }
    }
}