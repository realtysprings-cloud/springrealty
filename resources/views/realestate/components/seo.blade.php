<title>@yield('seoTitle', 'Spring Realty | Tatu City Property Specialists')</title>
<meta name="description" content="@yield('seoDescription', 'Premium properties in Tatu City, Nairobi. Luxury apartments at Jabali Towers, safari-inspired living at Porini Point, modern homes at NEXT Amani, 156 Elara, and Kijani Ridge.')">
<link rel="canonical" href="@yield('seoUrl', url()->current())">

{{-- Open Graph --}}
<meta property="og:type" content="@yield('seoType', 'website')">
<meta property="og:title" content="@yield('seoTitle', 'Spring Realty | Tatu City Property Specialists')">
<meta property="og:description" content="@yield('seoDescription', 'Premium properties in Tatu City, Nairobi.')">
<meta property="og:image" content="@yield('seoImage', 'https://jabalitowers.com/wp-content/uploads/2025/11/jpeg-optimizer_residenceimg.png')">
<meta property="og:url" content="@yield('seoUrl', url()->current())">
<meta property="og:site_name" content="Spring Realty">
<meta property="og:locale" content="en_KE">

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="@yield('seoTitle', 'Spring Realty | Tatu City Property Specialists')">
<meta name="twitter:description" content="@yield('seoDescription', 'Premium properties in Tatu City, Nairobi.')">
<meta name="twitter:image" content="@yield('seoImage', 'https://jabalitowers.com/wp-content/uploads/2025/11/jpeg-optimizer_residenceimg.png')">
