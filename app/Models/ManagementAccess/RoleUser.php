<?php

namespace App\Models\ManagementAccess;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleUser extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // declare table ke model
    public $table='role_user';

    // semua fild yang jenis nya tanggal ini harus di isi dengan tanggaal
    protected $dates=[
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // kolom atau filed tabel yang bisa di isi
    protected $fillable=[
        'role_id',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
