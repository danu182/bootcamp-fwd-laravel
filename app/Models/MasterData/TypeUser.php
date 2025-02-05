<?php

namespace App\Models\MasterData;

use App\Models\ManagementAccess\DetailUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeUser extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // declare table ke model
    public $table='type_user';

    // semua fild yang jenis nya tanggal ini harus di isi dengan tanggaal
    protected $dates=[
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // kolom atau filed tabel yang bisa di isi
    protected $fillable=[
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // one many 
    public function detail_user()
    {
        return $this->hasMany(DetailUser::class, 'id', 'type_user_id');
    }

}
