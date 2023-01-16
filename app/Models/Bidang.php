<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;

    protected $table = "bidang";
    public $timestamp = false;

    protected $fillable = [
        'name'
    ];

    public function programKegiatan() {
        return $this->hashMany(ProgramKegiatan::class);
    }
}
