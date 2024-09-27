<?php

namespace App\Http\Controllers;

use App\Models\Kelas; 
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Display user profile
    public function profile($nama = "", $kelas = "", $npm = "")
    {
        $data = [
            'foto' => asset('/assets/img/images.jpeg'),
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm
        ];

        return view('profile', $data);
    }

    // Show the create user form
    public function create()
    {
        return view('create_user', [
            'kelas' => Kelas::all()
        ]);
    }

    // Store user data to the database
    public function store(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        // Create the user with validated data
        $user = UserModel::create($validatedData);

        // Load the related class (kelas)
        $user->load('kelas');

        // Return the profile view with user data
        return view('profile', [
            'nama' => $user->nama,
            'npm' => $user->npm,
            'kelas_id' => $user->kelas->kelas_id ?? 'Kelas tidak ditemukan',
        ]);
    }
}
