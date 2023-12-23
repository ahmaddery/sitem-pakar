<?php

namespace App\Models;

use CodeIgniter\Model;

class AturanKepribadianModel extends Model
{
    protected $table = 'aturankepribadian';
    protected $primaryKey = 'IDAturan';
    protected $allowedFields = ['IDAturan', 'IDKepribadian'];
}
