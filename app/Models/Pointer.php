<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pointer extends Model
{
    protected $table = 'premises';

    protected $primaryKey = 'id';

    protected $fillable = [
        'type',
        'name',
        'phone_number',
        'email',
        'main_email',
        'work_hours',
        'link',
        'comment',
    ];
}
