@extends('backend.layout.sidenav-layout')
@section('content')
@include('backend.components.resume.education.list')
@include('backend.components.resume.education.create')
@include('backend.components.resume.education.update')
@include('backend.components.resume.education.delete')
@endsection
