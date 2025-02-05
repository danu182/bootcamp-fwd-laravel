<?php

namespace App\Models\Operational;

use App\Models\MasterData\Consultation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // declare table ke model
    public $table='appointment';

    // semua fild yang jenis nya tanggal ini harus di isi dengan tanggaal
    protected $dates=[
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // kolom atau filed tabel yang bisa di isi
    protected $fillable=[
        'doctor_id',
        'user_id',
        'consultation_id',
        'level',
        'date',
        'time',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function doctor()
    {
           // 3 parameter (path model, filed foregn key di tabel asal, field primary key dari tabel tujuan )
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }


    /**
     * Get the transaction associated with the Appointment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'appointment_id', 'id');
    }

    
    public function consultation()
    {
           // 3 parameter (path model, filed foregn key di tabel asal, field primary key dari tabel tujuan )
        return $this->belongsTo(Consultation::class, 'consultation_id', 'id');
    }
  
    public function user()
    {
           // 3 parameter (path model, filed foregn key di tabel asal, field primary key dari tabel tujuan )
        return $this->belongsTo(Consultation::class, 'user_id', 'id');
    }


}
