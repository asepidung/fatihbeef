@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Dashboard</h3>
        </div>
        <div class="card-body">
            <p>Selamat datang, <b>{{ Auth::user()->username }}</b>!</p>
            <p>Gunakan menu di sidebar untuk mengakses fitur aplikasi.</p>
        </div>
    </div>
</div>
@endsection