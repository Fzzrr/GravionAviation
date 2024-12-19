<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentMethodsModel extends Model
{
    protected $table = 'payment_methods';
    protected $primaryKey = 'payment_id';
    protected $allowedFields = [
        'payment_id', 'user_id', 'payment_type', 'created_at'
    ];
}
