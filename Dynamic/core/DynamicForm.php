<?php

namespace Modules\PanelCore\Dynamic\core;

use Illuminate\View\Component;

abstract class DynamicForm implements IForm
{

    public string $title;
    protected array $rules;

    /**
     * DynamicForm constructor.
     * @param string $tilte
     */
    public function __construct(string $tilte)
    {
        $this->title = $tilte;
    }


    public function rules(): array
    {

        return getJQRules($this->rules);
    }

}
