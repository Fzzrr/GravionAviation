<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentDetailsModel extends Model
{
    protected $table = 'payment_details';
    protected $primaryKey = 'payment_detail_id';
    protected $allowedFields = [
        'payment_id', 'cardholder_name', 'card_exp_date' , 
        'card_number', 'card_cvc',
        'billing_zip_code'
    ];
}
