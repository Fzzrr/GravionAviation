<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FlightsInfoModel;

class MyFlightsController extends Controller
{
    public function index()
    {
        $flightModel = new FlightsInfoModel();
        $user_id = session()->get('user_id'); // Pastikan session user_id tersedia
        $data['flights_info'] = $flightModel->where('user_id', $user_id)->findAll(); // Mengambil semua data terkait user_id
    
        return view('pages/myflights', $data);
    }

    public function confirmAction()
    {
        $flightId = $this->request->getPost('flight_id');

        if ($flightId) {
            $model = new FlightsInfoModel();
            $result = $model->confirmFlight($flightId); // Update status menjadi Complete

            if ($result) {
                return redirect()->to('/myflights')->with('success', 'Flight status updated to Complete!');
            } else {
                return redirect()->to('/myflights')->with('danger', 'Failed to update flight status.');
            }
        }

        return redirect()->to('/myflights')->with('danger', 'Invalid flight ID.');
    }
}
