<?php

namespace App\Models;

use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BasisAturan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function gejala()
    {
        return $this->belongsTo(Gejala::class);
    }
    public function kecanduan()
    {
        return $this->belongsTo(Penyakit::class);
    }
}
