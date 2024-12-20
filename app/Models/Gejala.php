<?php

namespace App\Models;

use App\Models\BasisAturan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gejala extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function basisaturan()
    {
        return $this->hasMany(BasisAturan::class);
    }
    public function kecanduans()
    {
        return $this->belongsToMany(Kecanduan::class, 'basis_aturans', 'gejala_id', 'kecanduan_id')
        ->withPivot('value_cf');
    }
}
