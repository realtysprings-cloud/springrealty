<?php

namespace App\Http\Controllers\RealEstate;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $properties = Property::latest('updated_at')->get();
        $baseUrl = 'https://springreallty.com';

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Static pages
        $staticPages = [
            '/' => now()->toIso8601String(),
            '/about' => now()->toIso8601String(),
            '/contact' => now()->toIso8601String(),
            '/properties' => now()->toIso8601String(),
        ];

        foreach ($staticPages as $path => $lastmod) {
            $xml .= '<url>';
            $xml .= '<loc>' . $baseUrl . $path . '</loc>';
            $xml .= '<lastmod>' . $lastmod . '</lastmod>';
            $xml .= '<changefreq>' . ($path === '/' ? 'daily' : 'weekly') . '</changefreq>';
            $xml .= '<priority>' . ($path === '/' ? '1.0' : '0.8') . '</priority>';
            $xml .= '</url>';
        }

        // Property pages
        foreach ($properties as $property) {
            $xml .= '<url>';
            $xml .= '<loc>' . $baseUrl . '/properties/' . $property->id . '</loc>';
            $xml .= '<lastmod>' . $property->updated_at->toIso8601String() . '</lastmod>';
            $xml .= '<changefreq>weekly</changefreq>';
            $xml .= '<priority>0.9</priority>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml')
            ->header('Cache-Control', 'public, max-age=3600');
    }
}
