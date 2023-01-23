<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKegiatan extends Model
{
    use HasFactory;

    protected $table = 'program_kegiatan';
    public $timestamps = false;

    protected $fillable = [
        'nama_program',
        'bidang_id',
        'user_id',
        'penanggung_jawab_id',
        'tanggal_pengajuan',
        'tanggal_mulai',
        'tanggal_selesai',
        'anggaran'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penanggung_jawab()
    {
        return $this->belongsTo(User::class);
    }

    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }
}
