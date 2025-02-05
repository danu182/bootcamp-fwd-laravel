<?php

namespace App\Models\MasterData;

use App\Models\Operational\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialist extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // declare table ke model
    public $table='specialist';

    // semua fild yang jenis nya tanggal ini harus di isi dengan tanggaal
    protected $dates=[
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // kolom atau filed tabel yang bisa di isi
    protected $fillable=[
        'name',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function doctor()
    {
        // 3 parameter (nama model nya, nam field forign key di tabel tujuan, dan amana field primary key d tabel local)
        return $this->hasMany(Doctor::class, 'specialist_id', 'id');
    }


}
