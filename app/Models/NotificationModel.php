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

//     protected function saveNotification(array $data) {
//         return $data;
//    }

}