<?php
namespace App\Models;
use CodeIgniter\Model;

class CoachModel extends Model {
    protected $table = 'coachs';
    protected $allowedFields = ['nom', 'photo', 'description'];
}