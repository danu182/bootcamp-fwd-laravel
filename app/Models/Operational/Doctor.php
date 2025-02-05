<?php

namespace App\Models\Operational;

use App\Models\MasterData\Specialist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // declare table ke model
    public $table='doctor';

    // semua fild yang jenis nya tanggal ini harus di isi dengan tanggaal
    protected $dates=[
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // kolom atau filed tabel yang bisa di isi
    protected $fillable=[
        'specialist_id',
        'name',
        'fee',
        'photo',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function specialist()
    {
           // 3 parameter (path model, filed foregn key di tabel asal, field primary key dari tabel tujuan )
        return $this->belongsTo(Specialist::class, 'spesialist_id', 'id');
    }

    
    public function appointment()
    {
        // 3 parameter (nama model nya, nam field forign key di tabel tujuan, dan amana field primary key d tabel local)
        return $this->hasMany(Appointment::class, 'doctor_id', 'id');
    }


}
