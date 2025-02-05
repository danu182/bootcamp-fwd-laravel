<?php

namespace App\Models\ManagementAccess;

use App\Models\MasterData\TypeUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailUser extends Model
{
    // use HasFactory;
    use SoftDeletes;


    // declare table ke model
    public $table='detail_user';

    // semua fild yang jenis nya tanggal ini harus di isi dengan tanggaal
    protected $dates=[
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // kolom atau filed tabel yang bisa di isi
    protected $fillable=[
        'user_id',
        'type_user_id',
        'contact',
        'address',
        'photo',
        'gender',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // relasi tabel one to one
    public function type_user()
    {
        // 3 parameter (path model, filed foregn key di tabel detail_user, field primary key dari tabel type_user )
        return $this->belongsTo(TypeUser::class, 'type_user_id', 'id');
    }

        public function user()
    {
        // 3 parameter (path model, filed foregn key di tabel detail_user, field primary key dari tabel type_user )
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    

}
