<?php

namespace Modules\PanelCore\Entities;

use Illuminate\Database\Eloquent\Model;

class CoreModel extends Model
{

    protected $datesPure = [];

    public function __get($key)
    {
        if (in_array($key, $this->getDates())) {
            return getLocalDate($this->getAttribute($key));
        }
        if (in_array($key, $this->datesPure)) {
            return getLocalDate($this->getAttribute($key),"Y/n/j");
        }
        return $this->getAttribute($key);
    }
}
