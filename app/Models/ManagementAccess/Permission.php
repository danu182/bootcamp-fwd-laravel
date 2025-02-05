<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;

    // declare table ke model
    public $table='permission';

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


    /**
     * Get all of the comments for the Permission
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permission_role()
    {
        return $this->hasMany(PermissionRole::class, 'permission_id', 'id');
    }
}
