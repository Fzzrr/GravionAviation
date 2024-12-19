<?php

namespace App\Models;

use CodeIgniter\Model;

class FlightsInfoModel extends Model
{
    protected $table = 'flights_info';
    protected $primaryKey = 'flight_info_id';
    protected $allowedFields = [
        'user_id', 'departure_date', 'departure_time', 'passenger_amount',
        'departure_city', 'arrival_city', 'aircraft_category',
        'avg_price_per_flight_hour', 'avg_number_of_seats', 'max_flight_length',
        'inquiry_status', 'created_at'
    ];

    public function confirmFlight($flightId)
    {
        // Perbarui status menjadi Complete
        return $this->update($flightId, ['inquiry_status' => 'Complete']);
    }
}
