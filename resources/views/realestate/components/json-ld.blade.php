@if(isset($jsonLd) && is_array($jsonLd))
    @foreach($jsonLd as $schema)
        <script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
    @endforeach
@endif
