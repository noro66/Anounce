@extends('layout')
@section('title', 'dashboard')
@section('content')
    <h2>hello world, {{auth()->user()->type}}</h2>
@endsection
