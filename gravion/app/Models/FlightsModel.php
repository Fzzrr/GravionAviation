<?php

namespace App\Models;

use CodeIgniter\Model;

class FlightsModel extends Model
{
    protected $table = 'flights';
    protected $primaryKey = 'flight_id';
    protected $allowedFields = [
        'departure_city', 'arrival_city', 'aircraft_category',
        'avg_price_per_flight_hour', 'avg_number_of_seats', 'max_flight_length'
    ];
}
