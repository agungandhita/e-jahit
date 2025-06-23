@extends('admin.layouts.main')

@section('container')
    <div class="mt-20 pb-10">
        <!-- Dashboard Header -->
        <div class="mb-8 px-4">
            <div class="flex items-center gap-3 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-indigo-600" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M13 21V11H21V21H13ZM3 13V3H11V13H3ZM3 21V15H11V21H3ZM13 9V3H21V9H13ZM5 5V11H9V5H5ZM15 5V7H19V5H15ZM15 13V19H19V13H15ZM5 17V19H9V17H5Z" />
                </svg>
                <h1 class="text-3xl font-bold text-gray-800 mb-0">Dashboard Admin E-Jahit</h1>
            </div>
            <p class="text-gray-600 pl-11">Sistem Informasi Manajemen Jahit Online</p>
        </div>

        <!-- Stats Cards -->
        <div class="px-4 mb-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Users Card -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-lg hover:translate-y-[-5px]">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-5">
                            <div class="bg-blue-100 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-blue-600" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 14V16C8.68629 16 6 18.6863 6 22H4C4 17.5817 7.58172 14 12 14ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11ZM18 17V14H20V17H23V19H20V22H18V19H15V17H18Z"/>
                                </svg>
                            </div>
                            <span class="text-xs font-semibold bg-blue-100 text-blue-800 px-3 py-1 rounded-full">Users</span>
                        </div>
                        <div class="mb-5">
                            <h2 class="text-xl font-bold text-gray-800 mb-1">Total Pengguna</h2>
                            <div class="flex items-end gap-2">
                                <h1 class="text-4xl font-extrabold text-gray-900">{{ $totalUsers }}</h1>
                                <span class="text-sm text-blue-600 font-medium">
                                    @if ($newUsersThisMonth > 0)
                                        +{{ $newUsersThisMonth }} bulan ini
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Produk Card -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-lg hover:translate-y-[-5px]">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-5">
                            <div class="bg-green-100 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-green-600" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12,2A3,3 0 0,1 15,5V7H20A1,1 0 0,1 21,8V19A1,1 0 0,1 20,20H4A1,1 0 0,1 3,19V8A1,1 0 0,1 4,7H9V5A3,3 0 0,1 12,2M12,4A1,1 0 0,0 11,5V7H13V5A1,1 0 0,0 12,4Z"/>
                                </svg>
                            </div>
                            <span class="text-xs font-semibold bg-green-100 text-green-800 px-3 py-1 rounded-full">Produk</span>
                        </div>
                        <div class="mb-5">
                            <h2 class="text-xl font-bold text-gray-800 mb-1">Total Produk</h2>
                            <div class="flex items-end gap-2">
                                <h1 class="text-4xl font-extrabold text-gray-900">{{ $totalProduk ?? 0 }}</h1>
                                <span class="text-sm text-green-600 font-medium">
                                    {{ $produkAktif ?? 0 }} aktif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Pesanan Card -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-lg hover:translate-y-[-5px]">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-5">
                            <div class="bg-amber-100 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-amber-600" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M7,4V2A1,1 0 0,1 8,1H16A1,1 0 0,1 17,2V4H20A1,1 0 0,1 21,5V19A1,1 0 0,1 20,20H4A1,1 0 0,1 3,19V5A1,1 0 0,1 4,4H7M9,3V4H15V3H9M5,6V18H19V6H5Z"/>
                                </svg>
                            </div>
                            <span class="text-xs font-semibold bg-amber-100 text-amber-800 px-3 py-1 rounded-full">Pesanan</span>
                        </div>
                        <div class="mb-5">
                            <h2 class="text-xl font-bold text-gray-800 mb-1">Total Pesanan</h2>
                            <div class="flex items-end gap-2">
                                <h1 class="text-4xl font-extrabold text-gray-900">{{ $totalPesanan ?? 0 }}</h1>
                                <span class="text-sm text-amber-600 font-medium">
                                    {{ $pesananBaru ?? 0 }} baru
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Pendapatan Card -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-lg hover:translate-y-[-5px]">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-5">
                            <div class="bg-purple-100 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-purple-600" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M7,15H9C9,16.08 10.37,17 12,17C13.63,17 15,16.08 15,15C15,13.9 13.96,13.5 11.76,12.97C9.64,12.44 7,11.78 7,9C7,7.21 8.47,5.69 10.5,5.18V3H13.5V5.18C15.53,5.69 17,7.21 17,9H15C15,7.92 13.63,7 12,7C10.37,7 9,7.92 9,9C9,10.1 10.04,10.5 12.24,11.03C14.36,11.56 17,12.22 17,15C17,16.79 15.53,18.31 13.5,18.82V21H10.5V18.82C8.47,18.31 7,16.79 7,15Z"/>
                                </svg>
                            </div>
                            <span class="text-xs font-semibold bg-purple-100 text-purple-800 px-3 py-1 rounded-full">Pendapatan</span>
                        </div>
                        <div class="mb-5">
                            <h2 class="text-xl font-bold text-gray-800 mb-1">Pendapatan Bulan Ini</h2>
                            <div class="flex items-end gap-2">
                                <h1 class="text-4xl font-extrabold text-gray-900">Rp {{ number_format($pendapatanBulanIni ?? 0, 0, ',', '.') }}</h1>
                                <span class="text-sm text-purple-600 font-medium">
                                    @if(($perubahanPendapatan ?? 0) > 0)
                                        +{{ $perubahanPendapatan }}%
                                    @elseif(($perubahanPendapatan ?? 0) < 0)
                                        {{ $perubahanPendapatan }}%
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activity & Statistics Section -->
        <div class="grid gap-8 grid-cols-1 lg:grid-cols-2 px-4">
            <!-- Recent Activity -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-600" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C13.1046 2 14 2.89543 14 4V5H20C20.5523 5 21 5.44772 21 6V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V6C3 5.44772 3.44772 5 4 5H10V4C10 2.89543 10.8954 2 12 2ZM19 7H5V19H19V7ZM12 4V5H12V4Z" />
                            </svg>
                            <h2 class="text-xl font-bold text-gray-800">Aktivitas Terbaru</h2>
                        </div>
                    </div>

                    <div class="space-y-4 max-h-[400px] overflow-y-auto pr-2 custom-scrollbar">
                        @forelse($recentActivities as $activity)
                            <div class="flex items-start gap-4 p-4 hover:bg-gray-50 rounded-lg transition-colors border border-gray-100">
                                <div class="bg-{{ $activity->type_color }}-100 p-2.5 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-{{ $activity->type_color }}-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        {!! $activity->icon_path !!}
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="flex justify-between">
                                        <h3 class="font-semibold text-gray-800">{{ $activity->title }}</h3>
                                        <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full">{{ $activity->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-sm text-gray-600 mt-1">{{ $activity->description }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8 bg-gray-50 rounded-lg border border-dashed border-gray-200">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada aktivitas</h3>
                                <p class="mt-1 text-sm text-gray-500">Aktivitas sistem akan muncul di sini.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Statistics Section -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-600" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M11 7H13V17H11V7ZM15 11H17V17H15V11ZM7 13H9V17H7V13ZM15 4H5V20H19V8H15V4ZM3 2.9918C3 2.44405 3.44749 2 3.9985 2H16L20.9997 7L21 20.9925C21 21.5489 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918Z" />
                            </svg>
                            <h2 class="text-xl font-bold text-gray-800">Produk Terpopuler</h2>
                        </div>
                    </div>

                    <div class="space-y-5">
                        @forelse($produkPopuler ?? [] as $index => $produk)
                            <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                                <div class="flex justify-between items-center mb-3">
                                    <h3 class="font-medium text-gray-800">{{ $produk->nama ?? 'Produk ' . ($index + 1) }}</h3>
                                    <span class="text-xs font-semibold bg-{{ $statColors[$index % count($statColors)] }}-100 text-{{ $statColors[$index % count($statColors)] }}-800 px-2.5 py-1 rounded-full">{{ $produk->total_pesanan ?? 0 }} pesanan</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-{{ $statColors[$index % count($statColors)] }}-500 h-2.5 rounded-full transition-all duration-500" style="width: {{ $produk->percentage ?? 0 }}%"></div>
                                </div>
                                <div class="flex justify-between mt-3">
                                    <span class="text-xs font-medium text-gray-600">Persentase: {{ $produk->percentage ?? 0 }}%</span>
                                    <span class="text-xs font-medium text-green-600">
                                        Rp {{ number_format($produk->total_pendapatan ?? 0, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8 bg-gray-50 rounded-lg border border-dashed border-gray-200">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada data produk</h3>
                                <p class="mt-1 text-sm text-gray-500">Data statistik produk akan muncul di sini.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
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
