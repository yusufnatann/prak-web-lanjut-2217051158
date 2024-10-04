@extends('layouts.app')
@section('title', 'Daftar User')
@section('content')

<!-- Header Section -->
<header class="bg-success text-white text-center py-5 mb-5 shadow-lg">
    <h1 class="display-4 font-weight-bold">Sistem pendataan anggota perpustakaan</h1>
    <p class="lead">Kelola data anggota perpusakaan dengan lebih efisien dan muda.</p>
</header>

<div class="container mt-5">
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('user.create') }}" class="btn btn-lg btn-outline-success shadow-sm">Tambah User Baru</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-hover rounded shadow-sm">
        <thead style="background-color: #28a745; color: white;">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($users->isEmpty())
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data pengguna.</td>
                </tr>
            @else
                @foreach($users as $user)
                    <tr style="border-bottom: 2px solid #28a745;">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->npm }}</td>
                        <td>{{ $user->nama_kelas }}</td>
                        <td>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger shadow-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>


@endsection
