<?php

namespace App\Exports;

use App\Models\Pesanan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Carbon\Carbon;

class LaporanPendapatanExport implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    protected $startDate;
    protected $endDate;
    
    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    
    public function collection()
    {
        return Pesanan::with(['user', 'layanan'])
            ->where('status', 'selesai')
            ->whereBetween('tanggal_selesai', [$this->startDate, $this->endDate])
            ->orderBy('tanggal_selesai', 'desc')
            ->get();
    }
    
    public function headings(): array
    {
        return [
            'No',
            'Nomor Pesanan',
            'Nama Pelanggan',
            'Layanan',
            'Jenis Layanan',
            'Jumlah',
            'Harga Dasar',
            'Biaya Tambahan',
            'Total Harga',
            'Tanggal Selesai',
            'Prioritas'
        ];
    }
    
    public function map($pesanan): array
    {
        static $no = 1;
        
        return [
            $no++,
            $pesanan->nomor_pesanan,
            $pesanan->user ? $pesanan->user->name : $pesanan->nama_pemesan,
            $pesanan->layanan ? $pesanan->layanan->nama_layanan : '-',
            $pesanan->jenis_layanan,
            $pesanan->jumlah,
            'Rp ' . number_format($pesanan->harga_dasar, 0, ',', '.'),
            'Rp ' . number_format($pesanan->biaya_tambahan, 0, ',', '.'),
            'Rp ' . number_format($pesanan->total_harga, 0, ',', '.'),
            Carbon::parse($pesanan->tanggal_selesai)->format('d/m/Y H:i'),
            ucfirst($pesanan->prioritas ?? 'normal')
        ];
    }
    
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1 => ['font' => ['bold' => true]],
        ];
    }
}