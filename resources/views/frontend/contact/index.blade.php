@extends('frontend.layouts.main')

@section('container')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-purple-600 to-pink-600 py-20">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">Hubungi Kami</h1>
        <p class="text-xl text-purple-100 max-w-3xl mx-auto">
            Siap membantu mewujudkan kebutuhan jahit Anda. Konsultasi gratis dan respon cepat!
        </p>
    </div>
</section>

<!-- Contact Methods -->
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Cara Menghubungi Kami</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Pilih cara yang paling nyaman untuk Anda berkomunikasi dengan kami
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- WhatsApp -->
            <div class="text-center p-6 bg-green-50 rounded-xl hover:bg-green-100 transition-colors">
                <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.785"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">WhatsApp</h3>
                <p class="text-gray-600 mb-4">Chat langsung untuk konsultasi cepat</p>
                <a href="https://wa.me/6281234567890?text=Halo%20E-Jahit,%20saya%20ingin%20konsultasi%20tentang%20layanan%20jahit" target="_blank" class="bg-green-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-600 transition-colors inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.785"/>
                    </svg>
                    Chat Sekarang
                </a>
            </div>
            
            <!-- Phone -->
            <div class="text-center p-6 bg-blue-50 rounded-xl hover:bg-blue-100 transition-colors">
                <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Telepon</h3>
                <p class="text-gray-600 mb-4">Hubungi langsung untuk konsultasi</p>
                <a href="tel:+6281234567890" class="bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 transition-colors inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                    </svg>
                    (021) 1234-5678
                </a>
            </div>
            
            <!-- Email -->
            <div class="text-center p-6 bg-purple-50 rounded-xl hover:bg-purple-100 transition-colors">
                <div class="w-16 h-16 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Email</h3>
                <p class="text-gray-600 mb-4">Kirim detail kebutuhan Anda</p>
                <a href="mailto:info@e-jahit.com" class="bg-purple-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-600 transition-colors inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                    </svg>
                    info@e-jahit.com
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form & Info -->
<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Kirim Pesan</h3>
                <form class="space-y-6" action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Nama Lengkap *</label>
                            <input type="text" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="Masukkan nama lengkap">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Nomor WhatsApp *</label>
                            <input type="tel" name="phone" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="08xxxxxxxxxx">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="email@example.com">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Jenis Layanan *</label>
                        <select name="service" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            <option value="">Pilih jenis layanan</option>
                            <option value="baju-pengantin">Baju Pengantin</option>
                            <option value="seragam-sekolah">Seragam Sekolah</option>
                            <option value="baju-kerja">Baju Kerja</option>
                            <option value="kebaya">Kebaya</option>
                            <option value="gamis">Gamis</option>
                            <option value="jas">Jas</option>
                            <option value="baju-anak">Baju Anak</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Budget (Opsional)</label>
                        <select name="budget" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            <option value="">Pilih range budget</option>
                            <option value="under-500k">Di bawah Rp 500.000</option>
                            <option value="500k-1m">Rp 500.000 - Rp 1.000.000</option>
                            <option value="1m-2m">Rp 1.000.000 - Rp 2.000.000</option>
                            <option value="2m-5m">Rp 2.000.000 - Rp 5.000.000</option>
                            <option value="above-5m">Di atas Rp 5.000.000</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Deadline (Opsional)</label>
                        <input type="date" name="deadline" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Detail Kebutuhan *</label>
                        <textarea name="message" rows="5" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="Jelaskan detail kebutuhan jahit Anda, seperti model, ukuran, bahan yang diinginkan, dll."></textarea>
                    </div>
                    
                    <div class="flex items-center">
                        <input type="checkbox" name="agree" required class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                        <label class="ml-2 text-gray-600 text-sm">
                            Saya setuju untuk dihubungi melalui WhatsApp/telepon untuk konsultasi lebih lanjut
                        </label>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="bg-purple-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-purple-700 transition-colors w-full md:w-auto">
                            Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Contact Info -->
            <div class="space-y-8">
                <!-- Business Hours -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Jam Operasional</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Senin - Jumat</span>
                            <span class="text-gray-800 font-medium">08:00 - 20:00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Sabtu</span>
                            <span class="text-gray-800 font-medium">08:00 - 18:00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Minggu</span>
                            <span class="text-gray-800 font-medium">10:00 - 16:00</span>
                        </div>
                    </div>
                    <div class="mt-4 p-3 bg-green-50 rounded-lg">
                        <p class="text-green-700 text-sm font-medium">💬 WhatsApp 24/7 untuk konsultasi darurat</p>
                    </div>
                </div>
                
                <!-- Location -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Lokasi Workshop</h3>
                    <div class="space-y-3">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-purple-600 mt-1 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                            <div>
                                <p class="text-gray-800 font-medium">Jl. Merdeka No. 123</p>
                                <p class="text-gray-600">Kelurahan Sejahtera, Kecamatan Bahagia</p>
                                <p class="text-gray-600">Jakarta Selatan 12345</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="https://maps.google.com" target="_blank" class="text-purple-600 hover:text-purple-700 font-medium text-sm flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                            Lihat di Google Maps
                        </a>
                    </div>
                </div>
                
                <!-- Quick Response -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Respon Cepat</h3>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                            </svg>
                            <span class="text-gray-700">WhatsApp: Respon dalam 5 menit</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                            </svg>
                            <span class="text-gray-700">Telepon: Langsung terhubung</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                            </svg>
                            <span class="text-gray-700">Email: Respon dalam 2 jam</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Pertanyaan Umum</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Temukan jawaban untuk pertanyaan yang sering diajukan seputar layanan kami
            </p>
        </div>
        
        <div class="space-y-4">
            <!-- FAQ Item 1 -->
            <div class="border border-gray-200 rounded-lg">
                <button class="faq-toggle w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 focus:outline-none">
                    <span class="font-medium text-gray-800">Berapa lama waktu pengerjaan jahit?</span>
                    <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7 10l5 5 5-5z"/>
                    </svg>
                </button>
                <div class="faq-content hidden px-6 pb-4">
                    <p class="text-gray-600">Waktu pengerjaan bervariasi tergantung jenis dan kompleksitas jahitan. Umumnya 3-14 hari kerja. Untuk pesanan urgent, kami menyediakan layanan express dengan biaya tambahan.</p>
                </div>
            </div>
            
            <!-- FAQ Item 2 -->
            <div class="border border-gray-200 rounded-lg">
                <button class="faq-toggle w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 focus:outline-none">
                    <span class="font-medium text-gray-800">Apakah bisa konsultasi gratis?</span>
                    <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7 10l5 5 5-5z"/>
                    </svg>
                </button>
                <div class="faq-content hidden px-6 pb-4">
                    <p class="text-gray-600">Ya, kami menyediakan konsultasi gratis melalui WhatsApp atau telepon. Anda bisa berkonsultasi tentang model, bahan, harga, dan estimasi waktu pengerjaan.</p>
                </div>
            </div>
            
            <!-- FAQ Item 3 -->
            <div class="border border-gray-200 rounded-lg">
                <button class="faq-toggle w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 focus:outline-none">
                    <span class="font-medium text-gray-800">Bagaimana sistem pembayaran?</span>
                    <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7 10l5 5 5-5z"/>
                    </svg>
                </button>
                <div class="faq-content hidden px-6 pb-4">
                    <p class="text-gray-600">Pembayaran bisa dilakukan dengan DP 50% di awal dan pelunasan saat pengambilan. Kami menerima transfer bank, e-wallet, dan cash.</p>
                </div>
            </div>
            
            <!-- FAQ Item 4 -->
            <div class="border border-gray-200 rounded-lg">
                <button class="faq-toggle w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 focus:outline-none">
                    <span class="font-medium text-gray-800">Apakah ada garansi untuk hasil jahitan?</span>
                    <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7 10l5 5 5-5z"/>
                    </svg>
                </button>
                <div class="faq-content hidden px-6 pb-4">
                    <p class="text-gray-600">Ya, kami memberikan garansi 30 hari untuk perbaikan minor seperti kancing lepas atau jahitan longgar. Untuk revisi ukuran, berlaku syarat dan ketentuan tertentu.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Floating WhatsApp Button -->
<div class="fixed bottom-6 right-6 z-50">
    <a href="https://wa.me/6281234567890?text=Halo%20E-Jahit,%20saya%20ingin%20konsultasi%20tentang%20layanan%20jahit" target="_blank" class="bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg transition-all duration-300 hover:scale-110 flex items-center">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.785"/>
        </svg>
    </a>
</div>

<script>
// FAQ Toggle functionality
document.addEventListener('DOMContentLoaded', function() {
    const faqToggles = document.querySelectorAll('.faq-toggle');
    
    faqToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const icon = this.querySelector('svg');
            
            // Close all other FAQ items
            faqToggles.forEach(otherToggle => {
                if (otherToggle !== this) {
                    const otherContent = otherToggle.nextElementSibling;
                    const otherIcon = otherToggle.querySelector('svg');
                    otherContent.classList.add('hidden');
                    otherIcon.classList.remove('rotate-180');
                }
            });
            
            // Toggle current FAQ item
            content.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        });
    });
});
</script>
@endsection