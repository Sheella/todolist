@extends('layouts.app')

@section('title', 'Edit To-Do List')

@section('header', 'Edit To-Do List')

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
        .btn-success {
            background-color: #d2a679;
            border-color: #a67c52;
            font-size: 20px;
            padding: 10px 20px;
        }
        .btn-success:hover {
            background-color: #a67c52;
            border-color: #8b4513;
        }
        .btn-secondary {
            background-color: #a67c52;
            border-color: #8b4513;
            font-size: 20px;
            padding: 10px 20px;
        }
        .btn-secondary:hover {
            background-color: #8b4513;
            border-color: #5c3821;
        }
    </style>

    <div class="container container-custom mt-4 text-center">
        <h3>Edit To-Do List</h3>
        <form action="{{ route('todolist.updateNama', $todolist->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="nama_tugas" class="form-label">Nama Tugas</label>
                <input type="text" name="nama_tugas" class="form-control" value="{{ $todolist->nama_tugas }}" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
