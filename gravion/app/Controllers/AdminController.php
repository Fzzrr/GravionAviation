<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PaymentDetailsModel;
use App\Models\FlightsInfoModel;
use App\Models\BookingModel;
use App\Models\FlightsModel;
use CodeIgniter\Controller;

class AdminController extends Controller
{
    public function users()
    {
        // Render halaman daftar pengguna
        return view('admin/admin-users');
    }

    public function payments()
    {
        // Render halaman daftar pembayaran
        return view('admin/admin-payments');
    }

    public function bookings()
    {
        // Render halaman daftar pemesanan
        return view('admin/admin-bookings');
    }

    public function flights()
    {
        // Render halaman daftar pemesanan
        return view('admin/admin-flights'); 
    }

    

    public function getAllUsers()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        return view('admin/admin-users', $data);
    }
    public function getAllFlights()
    {
        $flightModel = new FlightsModel();

        // Ambil semua data pengguna
        $data['flights'] = $flightModel->findAll();

        // Kirim data ke view
        return view('admin/admin-flights', $data);
    }

    public function getAllPayments()
    {
        $userModel = new UserModel();
        $flightsInfoModel = new FlightsInfoModel();

        $data['users'] = $userModel->findAll();
        $data['flights_info'] = $flightsInfoModel->findAll();

        $db = \Config\Database::connect();
        $builder = $db->table('flights_info');
        $builder->select('flights_info.*, users.username');
        $builder->join('users', 'users.user_id = flights_info.user_id');
        $query = $builder->get();
    
        $data['user_inquiry_status'] = $query->getResult(); 

        return view('admin/admin-payments', $data);
    }
    public function getAllBookings()
{
    $userModel = new UserModel();
    $flightsInfoModel = new FlightsInfoModel();
    $bokingModel = new BookingModel();

    $data['users'] = $userModel->findAll();
    $data['flights_info'] = $flightsInfoModel->findAll();
    $data['bookings'] = $bokingModel->findAll();

    $db = \Config\Database::connect();
    $builder = $db->table('flights_info');
    $builder->select('flights_info.*, users.username, bookings.booking_id');
    $builder->join('users', 'users.user_id = flights_info.user_id');
    $builder->join('bookings', 'bookings.flight_info_id = flights_info.flight_info_id');
    $query = $builder->get();

    $data['bookings'] = $query->getResult();

    return view('admin/admin-bookings', $data);
}

public function addFlight()
{

        $flightData = [
            'departure_city' => $this->request->getPost('departure_city'),
            'arrival_city' => $this->request->getPost('arrival_city'),
            'aircraft_category' => $this->request->getPost('aircraft_category'),
            'avg_price_per_flight_hour' => $this->request->getPost('avg_price_per_flight_hour'),
            'avg_number_of_seats' => $this->request->getPost('avg_number_of_seats'),
            'max_flight_length' => $this->request->getPost('max_flight_length')
        ];
        
        $flightModel = new \App\Models\FlightsModel();
        $flightModel->insert($flightData);

        return redirect()->to('/admin/flights')->with('success', 'Flight added successfully!');
}


public function updateFlight()
{
    $flightModel = new FlightsModel();

    $data = [
        'departure_city' => $this->request->getPost('departure_city'),
        'arrival_city' => $this->request->getPost('arrival_city'),
        'aircraft_category' => $this->request->getPost('aircraft_category'),
        'avg_price_per_flight_hour' => $this->request->getPost('avg_price_per_flight_hour'),
        'avg_number_of_seats' => $this->request->getPost('avg_number_of_seats'),
        'max_flight_length' => $this->request->getPost('max_flight_length'),
    ];

    $flight_id = $this->request->getPost('flight_id');

    if ($flight_id) {
        $flightModel->update($flight_id, $data);        
        return redirect()->to('/admin/flights')->with('success', 'Flight updated successfully!');
    } else {
        return redirect()->to('/admin/flights')->with('error', 'Flight ID is missing.');
    }
}

    


public function deleteFlight($flight_id)
{
    $flightModel = new FlightsModel();

    if ($flightModel->delete($flight_id)) {
        return redirect()->to('/admin/flights')->with('success', 'Flight deleted successfully.');
    } else {
        return redirect()->to('/admin/flights')->with('error', 'Failed to delete flight.');
    }
}


    public function deleteBooking($booking_id)
    {
        $flightsInfoModel = new FlightsInfoModel();
    
        if ($flightsInfoModel->delete($booking_id)) {
            return redirect()->to('/admin/bookings')->with('success', 'Booking deleted successfully.');
        } else {
            return redirect()->to('/admin/bookings')->with('error', 'Failed to delete Booking.');
        }
    }

    public function updateInquiryStatus($user_id, $flight_info_id)
{
    $flightsInfoModel = new FlightsInfoModel();

    $inquiry_status = $this->request->getPost('inquiry_status');

    $data = [
        'inquiry_status' => $inquiry_status,
    ];

    if ($flightsInfoModel->update($flight_info_id, $data)) {
        return redirect()->to('/admin/payments')->with('success', 'Inquiry Status updated successfully.');
    } else {
        return redirect()->to('/admin/payments')->with('error', 'Failed to update Inquiry Status.');
    }
}

public function deleteInquiry($flight_info_id)
{
    $flightsInfoModel = new FlightsInfoModel();

    // Delete the record based on flight_info_id
    if ($flightsInfoModel->delete($flight_info_id)) {
        return redirect()->to('/admin/payments')->with('success', 'Inquiry deleted successfully.');
    } else {
        return redirect()->to('/admin/payments')->with('error', 'Failed to delete Inquiry.');
    }
}



    public function updateUser($id)
    {
        $userModel = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
        ];

        if ($userModel->update($id, $data)) {
            return redirect()->to('/admin/users')->with('success', 'User updated successfully.');
        } else {
            return redirect()->to('/admin/users')->with('error', 'Failed to update user.');
        }
    }

    public function deleteUser($id)
    {
        $userModel = new UserModel();
        
        if ($userModel->delete($id)) {
            return redirect()->to('/admin/users')->with('success', 'User deleted successfully.');
        } else {
            return redirect()->to('/admin/users')->with('error', 'Failed to delete user.');
        }
    }
}
