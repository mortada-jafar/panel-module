<?php


namespace Modules\PanelCore\Dynamic\core;


use Illuminate\View\Component;

abstract class Element extends Component
{
    public ?string $title;
    public string $type;
    public bool $isCopyable = false;
    public int $col;


    /**
     * Field constructor.
     */
    public function __construct()
    {

    }

    public function withId($id): Element
    {
        $this->id = $id;
        return $this;
    }

//    public function withContentType(string $contentType): Field
//    {
//        $this->contentType = $contentType;
//        return $this;
//    }

    /**
     * @param int $col
     * @return Element
     */
    public function WithCol(int $col): Element
    {
        $this->col = $col;
        return $this;
    }

    /**
     * @param $value
     * @return Element
     */
    public function WithValue($value): Element
    {
        $this->start = $value;
        return $this;
    }
}
