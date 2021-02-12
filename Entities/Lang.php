<?php

namespace Modules\PanelCore\Entities;

use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'code',
        'is_master'
    ];
}
