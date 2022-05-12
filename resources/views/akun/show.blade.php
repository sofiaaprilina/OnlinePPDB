@extends('layouts.main')
@section('title', 'Detail Akun Pendaftar')
@section('content')
<div>
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2> Detail Akun Pendaftar</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('akun.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            <br>
            <div class="table">
                <table width="1000px">
                    <tr>
                        <td><strong>Nama Calon Siswa    : </strong></td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Email               : </strong></td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td><strong>Username            : </strong></td>
                        <td>{{ $user->username }}</td>
                    </tr>
                    <tr>
                        <td><strong>Password            : </strong></td>
                        <td>{{ $user->decrypt }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection