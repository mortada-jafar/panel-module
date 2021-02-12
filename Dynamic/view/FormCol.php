<?php


namespace Modules\PanelCore\Dynamic\view;


use Illuminate\Support\Str;
use Modules\PanelCore\Dynamic\core\Element;

class FormCol extends Element
{


    public bool $transparent = false;
    public bool $isFlex = false;
    public int $gap = 3;
    public array $elements;
    public array $rules;
    public string $action;
    public string $uuid;

    /**
     * FormCol constructor.
     * @param array $elements
     * @param array $rules
     * @param string $action
     * @param string|null $title
     * @param int $col
     */
    public function __construct(array $elements, array $rules, string $action, string $title = null, int $col = 12)
    {
        $this->uuid = Str::uuid();
        $this->elements = $elements;
        $this->col = $col;
        $this->title = $title;
        $this->rules = getJQRules($rules);
        $this->action = $action;
        $this->col = $col;
    }

    /**
     * @return FormCol
     */
    public function setTransparent(): FormCol
    {
        $this->transparent = true;
        return $this;
    }

    /**
     * @return Col
     */
    public function setIsFlex(): Col
    {
        $this->isFlex = true;
        return $this;
    }

    /**
     * @return FormCol
     */
    public function makeNormal(): FormCol
    {
        $this->isFlex = true;
        $this->transparent = true;
        return $this;
    }


    /**
     * @param int $gap
     */
    public function setGap(int $gap): void
    {
        $this->gap = $gap;
    }


    public function render()
    {
        return view('panel_ui::components.view.formColumn', [
            'uuid' => $this->uuid ,
            'title' => $this->title,
            'elements' => $this->elements,
            'col' => $this->col,
            'gap' => $this->gap,
            'transparent' => $this->transparent,
            'isFlex' => $this->isFlex,
            'action' => $this->action,
            'rules' => $this->rules,
        ]);
    }
}
