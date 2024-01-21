<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostalCode extends Model
{
    use HasUuids;
    use SoftDeletes;

    protected $table = 'postal_codes';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'postal_code', 'street_name'
    ];
}
