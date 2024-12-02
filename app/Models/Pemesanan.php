<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanans'; // Nama tabel di database

    protected $fillable = [
        'nama_pemesan',
        'jenis_baju',
        'ukuran',
        'jenis_kain',
        'desain_khusus',
        'estimasi_selesai',
        'status',
    ];

    /**
     * Relasi ke model User
     * Pemesanan dimiliki oleh satu User
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
