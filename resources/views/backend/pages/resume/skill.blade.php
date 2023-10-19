@extends('backend.layout.sidenav-layout')
@section('content')
@include('backend.components.resume.skill.list')
@include('backend.components.resume.skill.create')
@include('backend.components.resume.skill.update')
@include('backend.components.resume.skill.delete')
@endsection
