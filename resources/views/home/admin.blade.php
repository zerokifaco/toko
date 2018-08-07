@extends('layouts.app')

@section('title')
    Admin
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Dashboard</li>
@endsection

@section('header-title')
    Dashboard
@endsection

@section('dashboard')
active
@endsection

@section('content')
    <div class="alert alert-block alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>

        <i class="ace-icon fa fa-check green"></i>

        Welcome to
        <strong class="green">
            EXPORT Aplication
            <small>{{Auth::user()->name}}</small>
        </strong>
        {{Auth::user()->ace_setting->warna}}<br>
    </div>

@endsection
