@extends('frontend.layouts.main')

@section('container')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-purple-600 to-pink-600 py-20">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">Testimoni Pelanggan</h1>
        <p class="text-xl text-purple-100 max-w-3xl mx-auto">
            Dengarkan cerita kepuasan dari pelanggan yang telah mempercayakan kebutuhan jahit mereka kepada kami
        </p>
    </div>
</section>

<!-- Stats Section -->
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div>
                <h3 class="text-4xl font-bold text-purple-600 mb-2">500+</h3>
                <p class="text-gray-600">Pelanggan Puas</p>
            </div>
            <div>
                <h3 class="text-4xl font-bold text-purple-600 mb-2">4.9/5</h3>
                <p class="text-gray-600">Rating Rata-rata</p>
            </div>
            <div>
                <h3 class="text-4xl font-bold text-purple-600 mb-2">98%</h3>
                <p class="text-gray-600">Repeat Customer</p>
            </div>
            <div>
                <h3 class="text-4xl font-bold text-purple-600 mb-2">15+</h3>
                <p class="text-gray-600">Tahun Pengalaman</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Grid -->
<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Apa Kata Mereka?</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Testimoni nyata dari pelanggan yang telah merasakan kualitas layanan jahit terbaik dari kami
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($testimonials as $testimonial)
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                <!-- Header -->
                <div class="flex items-center mb-4">
                    <div class="w-16 h-16 {{ $testimonial['avatar_bg'] }} rounded-full flex items-center justify-center mr-4">
                        <svg class="w-8 h-8 {{ $testimonial['avatar_color'] }}" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-bold text-gray-800 text-lg">{{ $testimonial['name'] }}</h4>
                        <p class="text-gray-500 text-sm">{{ $testimonial['service'] }}</p>
                        <p class="text-gray-400 text-xs">{{ $testimonial['date'] }}</p>
                    </div>
                </div>
                
                <!-- Rating -->
                <div class="flex text-yellow-400 mb-4">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $testimonial['rating'])
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        @else
                            <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        @endif
                    @endfor
                </div>
                
                <!-- Testimonial Text -->
                <blockquote class="text-gray-600 italic mb-4 leading-relaxed">
                    "{{ $testimonial['message'] }}"
                </blockquote>
                
                <!-- Details -->
                <div class="border-t pt-4 space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-500">Layanan:</span>
                        <span class="text-gray-800 font-medium">{{ $testimonial['service'] }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Harga:</span>
                        <span class="text-gray-800 font-medium">{{ $testimonial['price'] }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Waktu:</span>
                        <span class="text-gray-800 font-medium">{{ $testimonial['duration'] }}</span>
                    </div>
                </div>
                
                <!-- Verified Badge -->
                @if($testimonial['verified'])
                <div class="mt-4 flex items-center text-green-600 text-sm">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-medium">Testimoni Terverifikasi</span>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Video Testimonials -->
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Video Testimoni</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Dengarkan langsung pengalaman pelanggan kami melalui video testimoni
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Video Testimonial 1 -->
            <div class="bg-gray-100 rounded-xl overflow-hidden shadow-lg">
                <div class="aspect-video bg-gradient-to-br from-purple-400 to-pink-400 flex items-center justify-center relative group cursor-pointer">
                    <div class="text-center text-white">
                        <svg class="w-16 h-16 mx-auto mb-2 opacity-80 group-hover:opacity-100 transition-opacity" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                        <p class="font-medium">Video Testimoni</p>
                        <p class="text-sm opacity-80">Sari - Baju Pengantin</p>
                    </div>
                    <div class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-10 transition-all"></div>
                </div>
                <div class="p-4">
                    <h4 class="font-bold text-gray-800 mb-2">Pengalaman Baju Pengantin Impian</h4>
                    <p class="text-gray-600 text-sm">"Dari konsultasi hingga fitting, semuanya sempurna!"</p>
                </div>
            </div>
            
            <!-- Video Testimonial 2 -->
            <div class="bg-gray-100 rounded-xl overflow-hidden shadow-lg">
                <div class="aspect-video bg-gradient-to-br from-blue-400 to-purple-400 flex items-center justify-center relative group cursor-pointer">
                    <div class="text-center text-white">
                        <svg class="w-16 h-16 mx-auto mb-2 opacity-80 group-hover:opacity-100 transition-opacity" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                        <p class="font-medium">Video Testimoni</p>
                        <p class="text-sm opacity-80">Budi - Seragam Kantor</p>
                    </div>
                    <div class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-10 transition-all"></div>
                </div>
                <div class="p-4">
                    <h4 class="font-bold text-gray-800 mb-2">Seragam Berkualitas untuk Tim</h4>
                    <p class="text-gray-600 text-sm">"20 seragam selesai tepat waktu dengan kualitas terbaik!"</p>
                </div>
            </div>
            
            <!-- Video Testimonial 3 -->
            <div class="bg-gray-100 rounded-xl overflow-hidden shadow-lg">
                <div class="aspect-video bg-gradient-to-br from-green-400 to-blue-400 flex items-center justify-center relative group cursor-pointer">
                    <div class="text-center text-white">
                        <svg class="w-16 h-16 mx-auto mb-2 opacity-80 group-hover:opacity-100 transition-opacity" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                        <p class="font-medium">Video Testimoni</p>
                        <p class="text-sm opacity-80">Maya - Kebaya Modern</p>
                    </div>
                    <div class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-10 transition-all"></div>
                </div>
                <div class="p-4">
                    <h4 class="font-bold text-gray-800 mb-2">Kebaya Wisuda yang Elegan</h4>
                    <p class="text-gray-600 text-sm">"Detail yang sempurna untuk momen spesial saya!"</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Review Form Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Bagikan Pengalaman Anda</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Sudah pernah menggunakan layanan kami? Bagikan pengalaman Anda untuk membantu calon pelanggan lain
            </p>
        </div>
        
        <div class="bg-white rounded-xl shadow-lg p-8">
            <form class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                        <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="Masukkan nama lengkap">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="Masukkan email">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Layanan yang Digunakan</label>
                        <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            <option>Pilih layanan</option>
                            <option>Baju Pengantin</option>
                            <option>Seragam Sekolah</option>
                            <option>Baju Kerja</option>
                            <option>Kebaya</option>
                            <option>Gamis</option>
                            <option>Jas</option>
                            <option>Baju Anak</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Rating</label>
                        <div class="flex space-x-2 pt-2">
                            <button type="button" class="star-rating text-gray-300 hover:text-yellow-400 text-2xl" data-rating="1">★</button>
                            <button type="button" class="star-rating text-gray-300 hover:text-yellow-400 text-2xl" data-rating="2">★</button>
                            <button type="button" class="star-rating text-gray-300 hover:text-yellow-400 text-2xl" data-rating="3">★</button>
                            <button type="button" class="star-rating text-gray-300 hover:text-yellow-400 text-2xl" data-rating="4">★</button>
                            <button type="button" class="star-rating text-gray-300 hover:text-yellow-400 text-2xl" data-rating="5">★</button>
                        </div>
                    </div>
                </div>
                
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Testimoni</label>
                    <textarea rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="Ceritakan pengalaman Anda menggunakan layanan kami..."></textarea>
                </div>
                
                <div class="flex items-center">
                    <input type="checkbox" class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                    <label class="ml-2 text-gray-600 text-sm">
                        Saya setuju untuk menampilkan testimoni ini di website E-Jahit
                    </label>
                </div>
                
                <div class="text-center">
                    <button type="submit" class="bg-purple-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-purple-700 transition-colors">
                        Kirim Testimoni
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-gradient-to-r from-purple-600 to-pink-600 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-white mb-6">Siap Menjadi Pelanggan Berikutnya?</h2>
        <p class="text-xl text-purple-100 mb-8">
            Bergabunglah dengan ratusan pelanggan yang telah merasakan kepuasan layanan jahit terbaik dari kami
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="bg-white text-purple-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                Konsultasi Gratis
            </a>
            <a href="{{ route('services') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-purple-600 transition-colors">
                Lihat Layanan
            </a>
        </div>
    </div>
</section>

<script>
// Star rating functionality
document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('.star-rating');
    let selectedRating = 0;
    
    stars.forEach(star => {
        star.addEventListener('click', function() {
            selectedRating = parseInt(this.getAttribute('data-rating'));
            updateStars();
        });
        
        star.addEventListener('mouseover', function() {
            const hoverRating = parseInt(this.getAttribute('data-rating'));
            highlightStars(hoverRating);
        });
    });
    
    document.querySelector('.star-rating').parentElement.addEventListener('mouseleave', function() {
        updateStars();
    });
    
    function updateStars() {
        stars.forEach((star, index) => {
            if (index < selectedRating) {
                star.classList.remove('text-gray-300');
                star.classList.add('text-yellow-400');
            } else {
                star.classList.remove('text-yellow-400');
                star.classList.add('text-gray-300');
            }
        });
    }
    
    function highlightStars(rating) {
        stars.forEach((star, index) => {
            if (index < rating) {
                star.classList.remove('text-gray-300');
                star.classList.add('text-yellow-400');
            } else {
                star.classList.remove('text-yellow-400');
                star.classList.add('text-gray-300');
            }
        });
    }
});
</script>
@endsection