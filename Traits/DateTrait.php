<?php
namespace Modules\PanelCore\Traits;



use Illuminate\Support\Carbon;

trait DateTrait{


    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getOriginalCreatedAtAttribute($value)
    {
        return $this->attributes['created_at'];
    }

    public function getOriginalUpdatedAtAttribute()
    {
        return $this->attributes['updated_at'];
    }
}
