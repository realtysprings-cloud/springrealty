<footer class="bg-gray-800 text-white mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4">Spring Realty</h3>
                <p class="text-gray-400">Your trusted partner in finding the perfect property.</p>
            </div>
            
            <div>
                <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white">Home</a></li>
                    <li><a href="{{ route('properties.index') }}" class="text-gray-400 hover:text-white">Properties</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-white">Contact</a></li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-xl font-bold mb-4">Contact Info</h3>
                <p class="text-gray-400">Email: info@springrealty.com</p>
                <p class="text-gray-400">Phone: +254 700 000 000</p>
            </div>
        </div>
        
        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; {{ date('Y') }} Spring Realty. All rights reserved.</p>
        </div>
    </div>
</footer>
