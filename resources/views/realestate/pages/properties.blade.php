@extends('realestate.layout.app')

@section('title', 'Browse Properties - Spring Realty')

@section('content')
    @include('realestate.components.properties.header')
    @include('realestate.components.properties.filters')
    @include('realestate.components.properties.grid', ['properties' => $properties])
@endsection
