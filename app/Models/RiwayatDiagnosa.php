<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatDiagnosa extends Model
{
    use HasFactory;
    protected $casts = [
        'gejala_pengguna' => 'array',
    ];
    protected $guarded = ['id'];
    // public function getGejalaPenggunaAttribute($value)
    // {
    //     return unserialize($value);
    // }
    // public function setGejalaPenggunaAttribute($value)
    // {
    //     $this->attributes['gejala_pengguna'] = serialize($value);
    // }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }
    public function kecanduan()
    {
        return $this->belongsTo(Kecanduan::class, 'id_kecanduan');
    }

    
}
