<?php

namespace App\Models;

use CodeIgniter\Model;

class UserProfileModel extends Model
{
    protected $table = 'user_profiles';
    protected $primaryKey = 'user_id';
    protected $allowedFields = [
        'booking_id', 'first_name', 'last_name', 'phone_number',
        'country', 'town_city', 'postal_code', 'phone_number',
        'street_number'
    ];
}
