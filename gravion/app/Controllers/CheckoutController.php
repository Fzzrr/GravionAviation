<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\PaymentDetailsModel;
use App\Models\FlightsInfoModel;
use App\Models\FlightsModel;
use App\Models\UserProfileModel;

class CheckoutController extends BaseController
{
    public function index()
    {
        $flightModel = new FlightsModel();

        $departureCities = $flightModel->distinct()->select('departure_city')->findAll();
        $arrivalCities = $flightModel->distinct()->select('arrival_city')->findAll();

        return view('pages/checkout', [
            'departureCities' => $departureCities,
            'arrivalCities' => $arrivalCities,
        ]);
    }

    public function submit()
    {
        $departureCity = $this->request->getPost('departure_city');
        $arrivalCity = $this->request->getPost('arrival_city');
        $departureDate = $this->request->getPost('departure-date');
        $departureTime = $this->request->getPost('departure-time');
        $passengerAmount = $this->request->getPost('passengers');

        $flightModel = new FlightsModel();
        $flightInfoModel = new FlightsInfoModel();
        $bookingModel = new BookingModel();
        $paymentModel = new PaymentDetailsModel();
        $userProfile = new UserProfileModel();

        $flightData = $flightModel
            ->where('departure_city', $departureCity)
            ->where('arrival_city', $arrivalCity)
            ->first();

        if (!$flightData) {
            return redirect()->back()->with('error', 'Penerbangan tidak ditemukan.');
        }

        $user_id = session()->get('user_id');  
        if (!$user_id) {
            return redirect()->back()->with('error', 'User tidak ditemukan atau belum login.');
        }

        $flightInfoData = [
            'user_id' => $user_id,
            'flight_id' => $flightData['flight_id'],
            'departure_city' => $departureCity,
            'arrival_city' => $arrivalCity,
            'aircraft_category' => $flightData['aircraft_category'],
            'avg_price_per_flight_hour' => $flightData['avg_price_per_flight_hour'],
            'avg_number_of_seats' => $flightData['avg_number_of_seats'],
            'max_flight_length' => $flightData['max_flight_length'],
            'departure_date' => $departureDate,
            'departure_time' => $departureTime,
            'passenger_amount' => $passengerAmount,
            'inquiry_status' => 'Incomplete',
        ];

        $flightInfoId = $flightInfoModel->insert($flightInfoData);

        if (!$flightInfoId) {
            return redirect()->back()->with('error', 'Gagal memasukkan data penerbangan.');
        }

        $firstName = $this->request->getPost('first-name');
        $lastName = $this->request->getPost('last-name');
        $phoneNumber = $this->request->getPost('mobile-number');
        $tripType = $this->request->getPost('trip-type');

        $bookingData = [
            'user_id' => $user_id, 
            'flight_id' => $flightData['flight_id'],
            'flight_info_id' => $flightInfoId,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'phone_number' => $phoneNumber,
            'trip_type' => $tripType,
        ];

        $bookingInsert = $bookingModel->insert($bookingData);

        if (!$bookingInsert) {
            return redirect()->back()->with('error', 'Gagal memproses pemesanan.');
        }

        $cardName = $this->request->getPost('card-name');
        $cardNumber = $this->request->getPost('card-number');
        $expDate = $this->request->getPost('exp-month'). '/' . $this->request->getPost('exp-year');
        $secCode = $this->request->getPost('security-code');
        $zipCode = $this->request->getPost('zip-code');
        
        if (empty($cardName) || empty($cardNumber) || empty($expDate) || empty($secCode) || empty($zipCode)) {
            return redirect()->back()->with('error', 'Data pembayaran tidak lengkap.');
        }
        $paymentData = [
            'cardholder_name' => $cardName,
            'card_number' => $cardNumber,
            'card_exp_date' => $expDate,
            'card_cvc' => $secCode,
            'billing_zip_code' => $zipCode
        ];
        
        $paymentInsert = $paymentModel->insert($paymentData);

        if (!$paymentInsert) {
            return redirect()->back()->with('error', 'Gagal memproses pembayaran.');
        }
        
        return redirect()->to('/myflights')->with('message', 'Checkout berhasil disimpan.');
    }

}
