@extends('backend.layout.sidenav-layout')
@section('content')
@include('backend.components.resume.experience.list')
@include('backend.components.resume.experience.create')
@include('backend.components.resume.experience.update')
@include('backend.components.resume.experience.delete')
@endsection
