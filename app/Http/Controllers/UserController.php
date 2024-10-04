<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas; 
use App\Models\UserModel;

class UserController extends Controller
{
    protected $userModel;
    protected $kelasModel;

    // Menggunakan dependency injection untuk model
    public function __construct(UserModel $userModel, Kelas $kelasModel)
    {
        $this->userModel = $userModel;
        $this->kelasModel = $kelasModel;
    }

    // Method untuk menampilkan daftar user
    public function index()
    {
        // Ambil data users dari model
        $users = $this->userModel->getUser();

        // Kirim data users ke view 'list_user'
        return view('list_user', compact('users'));
    }

    public function create()
    {
        // Ambil data kelas dari model Kelas
        $kelas = $this->kelasModel->all();

        // Kirim data kelas ke view create_user
        return view('create_user', compact('kelas'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'nama' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'npm' => 'required|digits:10',
            'kelas_id' => 'required|exists:kelas,id',
        ], [
            'nama.regex' => 'Nama hanya boleh mengandung huruf.',
            'npm.digits' => 'NPM harus 10 digit angka.',
            'kelas_id.required' => 'Kelas harus dipilih.',
        ]);

        // Simpan user baru
        $this->userModel->create($validatedData);

        return redirect()->route('user.index')->with('success', 'User baru berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Cari user berdasarkan ID
        $user = $this->userModel->findOrFail($id);
        $kelas = $this->kelasModel->all(); 

        // Kirim data user dan kelas ke view edit_user
        return view('edit_user', compact('user', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'npm' => 'required|digits:10',
            'kelas_id' => 'required|exists:kelas,id',
        ], [
            'nama.regex' => 'Nama hanya boleh mengandung huruf.',
            'npm.digits' => 'NPM harus 10 digit angka.',
            'kelas_id.required' => 'Kelas harus dipilih.',
        ]);

        // Update user
        $user = $this->userModel->findOrFail($id);
        $user->update($validatedData);

        return redirect()->route('user.index')->with('success', 'Data user berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus user berdasarkan ID
        $user = $this->userModel->findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Data user berhasil dihapus.');
    }

    public function profile($nama = "", $kelas = "", $npm = "")
    {
        // Kirim data profil ke view profile
        return view('profile', compact('nama', 'kelas', 'npm'));
    }
}
