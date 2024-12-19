<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\BookingModel;
use App\Models\UserProfileModel;
use CodeIgniter\Controller;

class MyProfileController extends Controller
{
    public function index()
{
    $userProfilesModel = new BookingModel();
    $user_id = session()->get('user_id');
    $data['bookings'] = $userProfilesModel->where('user_id', $user_id)->first();
    return view('pages/myprofile', $data);
}

    public function update()
    {
        $userProfileModel = new UserProfileModel();
        $bookingModel = new BookingModel();
        $user_id = session()->get('user_id');
        $data = [
            'first_name' => $this->request->getPost('first-name'),
            'last_name' => $this->request->getPost('last-name'),
            'mobile_number' => $this->request->getPost('mobile-number'),

        ];
        if ($userProfileModel->update($user_id, $data) ) {
            return redirect()->to('/myprofile')->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->to('/myprofile')->with('error', 'Failed to update profile.');
        }
    }
}