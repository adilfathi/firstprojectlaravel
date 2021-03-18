<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class karyawan extends Model{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
    'name',
    'nip',
    'alamat',
    'notelp',
    'kode_divisi'
    ];

    public function divisi() {
        return $this->belongsTo(Divisi::class, 'kode_divisi');
    }
    // public function getCreatedAtAttribute($value)
    // {
    //     return Carbon::parse($value)->timestamp;
    // }

    // public function getUpdatedAtAttribute($value)
    // {
    //     return Carbon::parse($value)->timestamp;
    // }
}
