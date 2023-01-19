<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKegiatan extends Model
{
    use HasFactory;

    protected $table = 'program_kegiatan';
    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $fillable = [
        'nama_program',
        'bidang_id',
        'user_id',
        'tanggal_pengajuan',
        'tanggal_mulai',
        'tanggal_selesai',
        'anggaran'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }
}
