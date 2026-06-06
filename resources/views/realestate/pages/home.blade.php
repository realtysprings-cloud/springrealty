@extends('realestate.layout.app')

@section('title', 'Spring Realty - Find Your Dream Home')

@section('content')
    @include('realestate.components.homepage.hero')
    @include('realestate.components.homepage.about')
    @include('realestate.components.homepage.categories')
    @include('realestate.components.homepage.featured-properties', ['properties' => $properties])
    @include('realestate.components.homepage.stats')
    @include('realestate.components.homepage.why-us')
    @include('realestate.components.homepage.cta')
@endsection
