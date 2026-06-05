@extends('realestate.layout.app')

@section('title', 'Spring Realty - Find Your Dream Home')

@section('content')
    @include('realestate.components.homepage.hero')
    @include('realestate.components.homepage.featured-properties', ['properties' => $properties])
@endsection
