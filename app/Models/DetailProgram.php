<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProgram extends Model
{
    use HasFactory;

    protected $table = 'detail_program';
    public $timestamps = false;

    protected $fillable = [
        'program_kegiatan_id',
        'nama_kegiatan',
        'tanggal',
        'pengeluaran',
        'bukti',
    ];

    public function program_kegiatan()
    {
        return $this->belongsTo(ProgramKegiatan::class);
    }
}
