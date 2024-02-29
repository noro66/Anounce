@extends('layout')
@section('title', 'home')
@section('content')
<h2>hello world, {{auth()->user()->type}}</h2>

@endsection
