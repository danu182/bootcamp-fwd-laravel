<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // declare table ke model
    public $table='role';

    // semua fild yang jenis nya tanggal ini harus di isi dengan tanggaal
    protected $dates=[
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // kolom atau filed tabel yang bisa di isi
    protected $fillable=[
        'title',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function permission_role()
    {
        return $this->hasMany(PermissionRole::class, 'role_id', 'id');
    }

    
    public function role_user()
    {
        return $this->hasMany(RoleUser::class, 'role_id', 'id');
    }

    
}
