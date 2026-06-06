@extends('realestate.layout.app')

@section('seoTitle', 'Spring Realty | Tatu City Property Specialists — Luxury Homes in Nairobi')
@section('seoDescription', 'Premium properties in Tatu City, Nairobi. Luxury apartments at Jabali Towers from KES 6.1M, safari-inspired Porini Point, modern NEXT Amani, exclusive 156 Elara townhouses, and Kijani Ridge villas. Kenya\'s first SEZ.')
@section('seoImage', 'https://jabalitowers.com/wp-content/uploads/2025/11/jpeg-optimizer_residenceimg.png')
@section('seoUrl', 'https://springreallty.com/')

@section('content')
    @include('realestate.components.homepage.hero')
    @include('realestate.components.homepage.about')
    @include('realestate.components.homepage.categories')
    @include('realestate.components.homepage.featured-properties', ['properties' => $properties])
    @include('realestate.components.homepage.stats')
    @include('realestate.components.homepage.why-us')
    @include('realestate.components.homepage.cta')
@endsection

@section('head')
@php
$jsonLd = [
    [
        '@context' => 'https://schema.org',
        '@type' => 'RealEstateAgent',
        'name' => 'Spring Realty',
        'description' => 'Premium property consultancy specializing in Tatu City, Nairobi. Luxury apartments, townhouses, and villas.',
        'url' => 'https://springreallty.com',
        'telephone' => '+254757896465',
        'email' => 'info@springreallty.com',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => 'Tatu City',
            'addressLocality' => 'Nairobi',
            'addressCountry' => 'KE',
        ],
        'areaServed' => [
            '@type' => 'City',
            'name' => 'Nairobi',
        ],
        'knowsAbout' => ['Tatu City', 'Jabali Towers', 'Porini Point', 'NEXT Amani', '156 Elara', 'Kijani Ridge'],
    ],
    [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => 'https://springreallty.com/'],
        ],
    ],
];
@endphp
@endsection
