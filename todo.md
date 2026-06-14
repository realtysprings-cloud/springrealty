# Next Steps

## SEO Setup
- [ ] Google Search Console — submit `https://springreallty.com/sitemap.xml`
- [ ] Run `php artisan seo:generate-sitemap` periodically (or cron) to keep sitemap fresh
- [ ] Share on social — OG tags are now set, so links will show proper previews

## URL Structure (SEO)
- [ ] Add `slug` column to properties table (e.g. `156-elara-4-bedroom-premium-triplex`)
- [ ] Auto-generate slugs from property title on create/edit
- [ ] Change routes from `/properties/{id}` to `/properties/{slug}`
- [ ] Update all internal links (property cards, related properties, sitemap, navigation)
- [ ] Keep old ID routes as redirects (301) so existing shared links don't break
