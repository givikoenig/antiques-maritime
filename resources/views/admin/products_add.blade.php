@extends('layouts.admin')

@section('header')
	@include('admin.header')
@endsection

@section('sidebar')
	@include('admin.sidebar')
@endsection

@section('content')
	@include('admin.content_product_add')
@endsection