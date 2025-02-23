@extends('layouts.app')

@section('title', 'Riwayat To-Do List')

@section('header', 'Riwayat To-Do List')

@section('content')
    <style>
        body {
            background-color: #f4e1c1;
            background-image: url('https://www.transparenttextures.com/patterns/old-wall.png');
            font-family: 'Courier New', Courier, monospace;
        }
        .container-custom {
            width: 100%;
            max-width: none;
            background: #f8e4b5;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.4);
            border: 4px solid #a67c52;
        }
        h3 {
            color: #8b4513;
            font-weight: bold;
            font-size: 28px;
        }
        .btn-primary {
            background-color: #d2a679;
            border-color: #a67c52;
            font-size: 20px;
            padding: 10px 20px;
        }
        .btn-primary:hover {
            background-color: #a67c52;
            border-color: #8b4513;
        }
        .table {
            font-size: 20px;
        }
        .badge {
            font-size: 18px;
            padding: 10px;
        }
    </style>

    <div class="container container-custom mt-4 text-center">
        <h3>Riwayat To-Do List</h3>
        <p>Berikut adalah semua tugas yang pernah Anda buat.</p>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tugas</th>
                    <th>Status</th>
                    <th>Tanggal & Waktu Tugas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todolists as $index => $todolist)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $todolist->nama_tugas }}</td>
                        <td>
                            @if ($todolist->status_tugas == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @else
                                <span class="badge bg-success">Completed</span>
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($todolist->created_at)->translatedFormat('l, d F Y H:i:s') }} WIB</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('dashboard') }}" class="btn btn-primary">Kembali ke Dashboard</a>
    </div>
@endsection
