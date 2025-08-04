@extends('admin.layouts.main')

@section('container')
    <div class="min-h-screen bg-gray-50 pt-20 pb-12">
        <!-- Dashboard Header -->
        <div class="mb-10 px-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                <div class="flex items-center gap-4 mb-3">
                    <div class="bg-gradient-to-br from-indigo-500 to-purple-600 p-3 rounded-xl shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M13 21V11H21V21H13ZM3 13V3H11V13H3ZM3 21V15H11V21H3ZM13 9V3H21V9H13ZM5 5V11H9V5H5ZM15 5V7H19V5H15ZM15 13V19H19V13H15ZM5 17V19H9V17H5Z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 mb-1">Dashboard Admin E-Jahit</h1>
                        <p class="text-gray-600 text-lg">Sistem Informasi Manajemen Jahit Online</p>
                    </div>
                </div>
                <div class="mt-6 flex items-center gap-4 text-sm text-gray-500">
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                        <span>Sistem Online</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Terakhir diperbarui: {{ now()->format('d M Y, H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10 px-6">
            <!-- Total Users -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-lg hover:border-blue-200 transition-all duration-300 group">
                <div class="flex items-start justify-between mb-4">
                    <div class="bg-blue-50 p-3 rounded-xl group-hover:bg-blue-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 14V16C8.68629 16 6 18.6863 6 22H4C4 17.5817 7.58172 14 12 14ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11ZM18 17V14H20V17H23V19H20V22H18V19H15V17H18Z"/>
                        </svg>
                    </div>
                    @if(($newUsersThisMonth ?? 0) > 0)
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-1 rounded-full">+{{ $newUsersThisMonth }}</span>
                    @else
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-1 rounded-full">0</span>
                    @endif
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Total Pengguna</p>
                    <h3 class="text-3xl font-bold text-gray-900 mb-2">{{ number_format($totalUsers) }}</h3>
                    <p class="text-sm text-gray-500">
                        @if(($newUsersThisMonth ?? 0) > 0)
                            <span class="text-green-600">↗ +{{ $newUsersThisMonth }} bulan ini</span>
                        @else
                            <span class="text-gray-500">Tidak ada pengguna baru</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Total Produk -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-lg hover:border-green-200 transition-all duration-300 group">
                <div class="flex items-start justify-between mb-4">
                    <div class="bg-green-50 p-3 rounded-xl group-hover:bg-green-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12,2A3,3 0 0,1 15,5V7H20A1,1 0 0,1 21,8V19A1,1 0 0,1 20,20H4A1,1 0 0,1 3,19V8A1,1 0 0,1 4,7H9V5A3,3 0 0,1 12,2M12,4A1,1 0 0,0 11,5V7H13V5A1,1 0 0,0 12,4Z"/>
                        </svg>
                    </div>
                    <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-1 rounded-full">{{ $produkAktif ?? 0 }} aktif</span>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Total Produk</p>
                    <h3 class="text-3xl font-bold text-gray-900 mb-2">{{ number_format($totalProduk ?? 0) }}</h3>
                    <p class="text-sm text-gray-500">
                        <span class="text-green-600">{{ $produkAktif ?? 0 }} produk aktif</span>
                    </p>
                </div>
            </div>

            <!-- Total Pesanan -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-lg hover:border-amber-200 transition-all duration-300 group">
                <div class="flex items-start justify-between mb-4">
                    <div class="bg-amber-50 p-3 rounded-xl group-hover:bg-amber-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-amber-600" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M7,4V2A1,1 0 0,1 8,1H16A1,1 0 0,1 17,2V4H20A1,1 0 0,1 21,5V19A1,1 0 0,1 20,20H4A1,1 0 0,1 3,19V5A1,1 0 0,1 4,4H7M9,3V4H15V3H9M5,6V18H19V6H5Z"/>
                        </svg>
                    </div>
                    @if(($pesananBaru ?? 0) > 0)
                        <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-1 rounded-full">{{ $pesananBaru }} baru</span>
                    @else
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-1 rounded-full">0 baru</span>
                    @endif
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Total Pesanan</p>
                    <h3 class="text-3xl font-bold text-gray-900 mb-2">{{ number_format($totalPesanan ?? 0) }}</h3>
                    <p class="text-sm text-gray-500">
                        @if(($pesananBaru ?? 0) > 0)
                            <span class="text-amber-600">{{ $pesananBaru }} pesanan baru</span>
                        @else
                            <span class="text-gray-500">Tidak ada pesanan baru</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Total Pendapatan -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-lg hover:border-purple-200 transition-all duration-300 group">
                <div class="flex items-start justify-between mb-4">
                    <div class="bg-purple-50 p-3 rounded-xl group-hover:bg-purple-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-600" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M7,15H9C9,16.08 10.37,17 12,17C13.63,17 15,16.08 15,15C15,13.9 13.96,13.5 11.76,12.97C9.64,12.44 7,11.78 7,9C7,7.21 8.47,5.69 10.5,5.18V3H13.5V5.18C15.53,5.69 17,7.21 17,9H15C15,7.92 13.63,7 12,7C10.37,7 9,7.92 9,9C9,10.1 10.04,10.5 12.24,11.03C14.36,11.56 17,12.22 17,15C17,16.79 15.53,18.31 13.5,18.82V21H10.5V18.82C8.47,18.31 7,16.79 7,15Z"/>
                        </svg>
                    </div>
                    @if(($perubahanPendapatan ?? 0) > 0)
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-1 rounded-full">+{{ $perubahanPendapatan }}%</span>
                    @elseif(($perubahanPendapatan ?? 0) < 0)
                        <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-1 rounded-full">{{ $perubahanPendapatan }}%</span>
                    @else
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-1 rounded-full">0%</span>
                    @endif
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Pendapatan Bulan Ini</p>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Rp {{ number_format($pendapatanBulanIni ?? 0, 0, ',', '.') }}</h3>
                    <p class="text-sm text-gray-500">
                        @if(($perubahanPendapatan ?? 0) > 0)
                            <span class="text-green-600">↗ Naik {{ $perubahanPendapatan }}% dari bulan lalu</span>
                        @elseif(($perubahanPendapatan ?? 0) < 0)
                            <span class="text-red-600">↘ Turun {{ abs($perubahanPendapatan) }}% dari bulan lalu</span>
                        @else
                            <span class="text-gray-500">Tidak ada perubahan</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <!-- Recent Activities & Popular Products -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 px-6">
            <!-- Recent Activities -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-3">
                        <div class="bg-indigo-50 p-2 rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C13.1046 2 14 2.89543 14 4V5H20C20.5523 5 21 5.44772 21 6V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V6C3 5.44772 3.44772 5 4 5H10V4C10 2.89543 10.8954 2 12 2ZM19 7H5V19H19V7ZM12 4V5H12V4Z" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">Aktivitas Terbaru</h2>
                    </div>
                    <span class="text-sm text-gray-500">{{ count($recentActivities ?? []) }} aktivitas</span>
                </div>
                <div class="space-y-3 max-h-96 overflow-y-auto">
                    @forelse($recentActivities as $activity)
                        <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-all duration-200 border border-transparent hover:border-gray-200">
                            <div class="bg-{{ $activity->type_color }}-100 p-2.5 rounded-xl flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-{{ $activity->type_color }}-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    {!! $activity->icon_path !!}
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-gray-900 mb-1">{{ $activity->title }}</p>
                                <p class="text-sm text-gray-600 mb-2 leading-relaxed">{{ $activity->description }}</p>
                                <div class="flex items-center gap-2">
                                    <svg class="w-3 h-3 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                    </svg>
                                    <p class="text-xs text-gray-500">{{ $activity->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <div class="bg-gray-100 p-4 rounded-full w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C13.1046 2 14 2.89543 14 4V5H20C20.5523 5 21 5.44772 21 6V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V6C3 5.44772 3.44772 5 4 5H10V4C10 2.89543 10.8954 2 12 2ZM19 7H5V19H19V7ZM12 4V5H12V4Z" />
                                </svg>
                            </div>
                            <p class="text-gray-500 font-medium">Belum ada aktivitas terbaru</p>
                            <p class="text-sm text-gray-400 mt-1">Aktivitas akan muncul di sini</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Popular Products -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-3">
                        <div class="bg-purple-50 p-2 rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-600" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M11 7H13V17H11V7ZM15 11H17V17H15V11ZM7 13H9V17H7V13ZM15 4H5V20H19V8H15V4ZM3 2.9918C3 2.44405 3.44749 2 3.9985 2H16L20.9997 7L21 20.9925C21 21.5489 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918Z" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">Produk Terpopuler</h2>
                    </div>
                    <span class="text-sm text-gray-500">Top {{ count($produkPopuler ?? []) }}</span>
                </div>

                <div class="space-y-4 max-h-96 overflow-y-auto">
                    @forelse($produkPopuler ?? [] as $index => $produk)
                        @php
                            $colors = ['blue', 'green', 'purple', 'amber', 'red'];
                            $color = $colors[$index % count($colors)];
                        @endphp
                        <div class="bg-gradient-to-r from-gray-50 to-gray-100 p-5 rounded-xl border border-gray-200 hover:shadow-md transition-all duration-200">
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex items-center gap-3">
                                    <div class="bg-{{ $color }}-100 text-{{ $color }}-600 w-8 h-8 rounded-lg flex items-center justify-center font-bold text-sm">
                                        #{{ $index + 1 }}
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900 text-sm">{{ $produk->nama ?? 'Produk ' . ($index + 1) }}</h3>
                                        <p class="text-xs text-gray-500 mt-1">{{ $produk->kategori ?? 'Kategori' }}</p>
                                    </div>
                                </div>
                                <span class="bg-{{ $color }}-100 text-{{ $color }}-800 text-xs font-semibold px-3 py-1.5 rounded-full">
                                    {{ $produk->total_pesanan ?? 0 }} pesanan
                                </span>
                            </div>
                            <div class="mb-3">
                                <div class="flex justify-between text-xs text-gray-600 mb-1">
                                    <span>Progress</span>
                                    <span>{{ $produk->percentage ?? 0 }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-gradient-to-r from-{{ $color }}-400 to-{{ $color }}-600 h-2 rounded-full transition-all duration-700 ease-out" style="width: {{ $produk->percentage ?? 0 }}%"></div>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path>
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-sm font-semibold text-green-600">
                                        Rp {{ number_format($produk->total_pendapatan ?? 0, 0, ',', '.') }}
                                    </span>
                                </div>
                                <span class="text-xs text-gray-500">Total pendapatan</span>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <div class="bg-gray-100 p-4 rounded-full w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11 7H13V17H11V7ZM15 11H17V17H15V11ZM7 13H9V17H7V13ZM15 4H5V20H19V8H15V4ZM3 2.9918C3 2.44405 3.44749 2 3.9985 2H16L20.9997 7L21 20.9925C21 21.5489 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918Z" />
                                </svg>
                            </div>
                            <p class="text-gray-500 font-medium">Belum ada data produk</p>
                            <p class="text-sm text-gray-400 mt-1">Data statistik produk akan muncul di sini</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Quick Actions Section -->
        <div class="mt-10 px-6">
            <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-2xl shadow-lg p-8 text-white">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div class="mb-6 md:mb-0">
                        <h3 class="text-2xl font-bold mb-2">Aksi Cepat</h3>
                        <p class="text-indigo-100 text-lg">Kelola bisnis Anda dengan mudah</p>
                    </div>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('admin.produk.create') }}" class="bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-200 flex items-center gap-2 border border-white/20">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                            </svg>
                            Tambah Produk
                        </a>
                        <a href="{{ route('admin.pesanan.index') }}" class="bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-200 flex items-center gap-2 border border-white/20">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Kelola Pesanan
                        </a>
                        <a href="{{ route('admin.users.index') }}" class="bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-200 flex items-center gap-2 border border-white/20">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                            </svg>
                            Kelola User
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Info -->
        <div class="mt-8 px-6 pb-8">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex flex-col md:flex-row items-center justify-between text-sm text-gray-500">
                    <div class="flex items-center gap-4 mb-4 md:mb-0">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Sistem berjalan normal</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Server aktif</span>
                        </div>
                    </div>
                    <div class="text-center md:text-right">
                        <p>© {{ date('Y') }} E-Jahit Dashboard</p>
                        <p class="text-xs mt-1">Versi 1.0.0 - Build {{ date('Ymd') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Custom scrollbar */
        .overflow-y-auto::-webkit-scrollbar {
            width: 6px;
        }
        .overflow-y-auto::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 3px;
        }
        .overflow-y-auto::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }
        .overflow-y-auto::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Smooth animations */
        .group:hover .group-hover\:bg-blue-100 {
            transition: background-color 0.2s ease;
        }

        /* Gradient animation */
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .bg-gradient-to-r {
            background-size: 200% 200%;
            animation: gradient 6s ease infinite;
        }
    </style>
@endsection

    @push('scripts')
        <script>
            document.getElementById('statisticPeriod').addEventListener('change', function() {
                // You can implement AJAX call here to update statistics based on selected period
                const period = this.value;

                // Example AJAX call
                /*
                fetch(`/admin/dashboard/statistics?period=${period}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Update the statistics section with new data
                    console.log(data);
                });
                */
            });
        </script>
    @endpush
