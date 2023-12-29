<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mata_kuliah extends Model
{
    use HasFactory;
    public $table = "mata_kuliah";
    protected $primaryKey = "kode_makul";
    public $incrementing=false;
    protected $keyType="string";
}
