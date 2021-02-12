<?php


namespace Modules\PanelCore\Dynamic\core;


use Illuminate\View\Component;

abstract class Field extends Component
{
    public ?string $id;
    public string $name;
    public string $label;
    public bool $countAble = false;
    public string $type;
    public int $col = 6;
    public ?string $familyName ;
    public bool $isMulti = false;
    public int $height = 0;
    public $value = null;
    public bool $hidden = false;
    public string $class = '';


    /**
     * Field constructor.
     * @param $type
     * @param string $name
     * @param string $label
     * @param null $value
     * @param int $col
     * @param string|null $id
     * @param bool $hidden
     * @param bool $isMulti
     * @param string|null $familyName
     */
    public function __construct($type, string $name, string $label, $value = null,int $col=6,string $id = null, bool $hidden = false,bool $isMulti=false,string $familyName=null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->id = $id ?? $name;
        $this->type = $type;
        $this->value = $value;
        $this->familyName= $familyName;
        $this->hidden = $hidden;
        $this->col = $col;
        $this->isMulti = $isMulti;

        $this->id = $id;
    }

    public function withId($id): Field
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
     * @return Field
     */
    public function WithCol(int $col): Field
    {
        $this->col = $col;
        return $this;
    }

    /**
     * @param $value
     * @return Field
     */
    public function WithValue($value): Field
    {
        $this->value = $value;
        return $this;
    }

    public function withClass($class): Field
    {
        $this->class = $class;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFamilyName(): ?string
    {
        return $this->familyName;
    }

    /**
     * @param string|null $familyName
     */
    public function setFamilyName(?string $familyName): void
    {
        $this->familyName = $familyName;
    }

    /**
     * @return bool
     */
    public function isMulti(): bool
    {
        return $this->isMulti;
    }

    /**
     * @param bool $isMulti
     */
    public function setIsMulti(bool $isMulti): void
    {
        $this->isMulti = $isMulti;
    }




}
