<?php

namespace Reinanhs\LaravelManagerBase\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'permissions';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'slug',
        'desc',
    ];
}