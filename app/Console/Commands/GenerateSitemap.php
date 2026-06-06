<?php

namespace App\Console\Commands;

use App\Models\Property;
use Illuminate\Console\Command;

class GenerateSitemap extends Command
{
    protected $signature = 'seo:generate-sitemap';
    protected $description = 'Generate sitemap.xml in public directory';

    public function handle(): int
    {
        $properties = Property::latest('updated_at')->get();
        $baseUrl = 'https://springreallty.com';

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        $staticPages = [
            '/' => now()->toDateTimeString(),
            '/about' => now()->toDateTimeString(),
            '/contact' => now()->toDateTimeString(),
            '/properties' => now()->toDateTimeString(),
        ];

        foreach ($staticPages as $path => $lastmod) {
            $xml .= '<url>';
            $xml .= '<loc>' . $baseUrl . $path . '</loc>';
            $xml .= '<lastmod>' . $lastmod . '</lastmod>';
            $xml .= '<changefreq>' . ($path === '/' ? 'daily' : 'weekly') . '</changefreq>';
            $xml .= '<priority>' . ($path === '/' ? '1.0' : '0.8') . '</priority>';
            $xml .= '</url>';
        }

        foreach ($properties as $property) {
            $xml .= '<url>';
            $xml .= '<loc>' . $baseUrl . '/properties/' . $property->id . '</loc>';
            $xml .= '<lastmod>' . $property->updated_at->toDateTimeString() . '</lastmod>';
            $xml .= '<changefreq>weekly</changefreq>';
            $xml .= '<priority>0.9</priority>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        $path = public_path('sitemap.xml');
        file_put_contents($path, $xml);

        $this->info("Sitemap generated: {$path}");
        $this->info("URLs: " . (count($staticPages) + $properties->count()));

        return self::SUCCESS;
    }
}
