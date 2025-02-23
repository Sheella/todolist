@extends('layouts.app')

@section('title', 'Dashboard')

@section('header', 'Dashboard')

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
        .btn-danger {
            background-color: #a67c52;
            border-color: #8b4513;
            font-size: 20px;
            padding: 10px 20px;
        }
        .btn-danger:hover {
            background-color: #8b4513;
            border-color: #5c3821;
        }
        .table {
            font-size: 20px;
        }
    </style>

    <div class="container container-custom mt-4 text-center">
        <h3>To-Do List Hari ini: <strong>{{ $hariIni }} WIB</strong></h3>
        <form action="{{ route('todolist.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="text" name="nama_tugas" class="form-control" placeholder="Tambahkan tugas baru" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="{{ route('todolist.history') }}" class="btn btn-info">Lihat Riwayat</a>
        </form>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tugas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todolists as $index => $todolist)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $todolist->nama_tugas }}</td>
                        <td>
                            <form action="{{ route('todolist.update', $todolist->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status_tugas" class="form-select" onchange="this.form.submit()">
                                    <option value="pending" {{ $todolist->status_tugas == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="completed" {{ $todolist->status_tugas == 'completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('todolist.edit', $todolist->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('todolist.destroy', $todolist->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger mt-4">Logout</button>
        </form>
    </div>
@endsection
