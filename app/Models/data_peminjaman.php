<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_peminjaman extends Model
{
    use HasFactory;

    public $fillable = [
        'id',
        'namapeminjam',
        'barangdipinjam',
        'tanggalpinjam',
        'waktuawalpinjam',
        'waktuakhirpinjam'
    ];
}
