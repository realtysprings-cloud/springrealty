@extends('realestate.layout.app')

@php
    $dev = request('development', request('type'));
    $devNames = ['Jabali Towers', 'Porini Point', 'NEXT Amani', '156 Elara', 'Kijani Ridge'];
    $isActiveDev = in_array($dev, $devNames);
@endphp

@section('seoTitle', $isActiveDev ? $dev . ' Properties | Spring Realty' : 'Browse Properties | Spring Realty — Tatu City')
@section('seoDescription', $isActiveDev ? 'Explore all available properties in ' . $dev . ', Tatu City. Floor plans, pricing, and payment plans.' : 'Browse premium properties in Tatu City, Nairobi. Filter by development, unit type, and status. Jabali Towers, Porini Point, NEXT Amani, 156 Elara, Kijani Ridge.')
@section('seoUrl', url()->current())

@section('content')
    @include('realestate.components.properties.header')
    @include('realestate.components.properties.filters')
    @include('realestate.components.properties.grid', ['properties' => $properties])
@endsection

@section('head')
@php
$jsonLd = [
    [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => array_merge(
            [['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => 'https://springreallty.com/']],
            $isActiveDev ? [['@type' => 'ListItem', 'position' => 2, 'name' => $dev, 'item' => url()->current()]] : [['@type' => 'ListItem', 'position' => 2, 'name' => 'Properties', 'item' => url()->current()]]
        ),
    ],
];
@endphp
@endsection
