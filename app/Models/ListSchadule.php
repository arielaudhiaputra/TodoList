<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListSchadule extends Model
{
    use HasFactory;

    protected $table = 'list_schadule';
    protected $fillable = [
        'name',
        'id_users',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $guarded = ['id'];

    public function user()
    {
        // return $this->belongsTo('App\Models\User', 'id_users', 'id');
        return $this->belongsTo(User::class, 'id_users', 'id');
    }
}
