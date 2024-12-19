<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'booking_id';
    protected $allowedFields = [
        'user_id', 'flight_info_id', 'first_name', 'last_name', 'phone_number',
        'trip_type'
    ];
}
