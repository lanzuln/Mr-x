@extends('backend.layout.sidenav-layout')
@section('content')
@include('backend.components.resume.language.list')
@include('backend.components.resume.language.create')
@include('backend.components.resume.language.update')
@include('backend.components.resume.language.delete')
@endsection
