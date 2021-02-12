<?php

namespace Modules\PanelCore\DataGrid\Columns\Core;

use Modules\PanelCore\DataGrid\Types\ColumnType;

class Column
{


    public string $unique;
    public string $index;
    public string $label;
    public $type;
    public $func;
    public bool $copyable = false;
    public bool $printable = true;
    public string $float = "text-center";

    private bool $searchable = true;
    private bool $sortable = true;
    public bool $filterable = true;
    private string $wrapper = "simple";

    public $filterList = [];

    /**
     * Column constructor.
     * @param string $index
     * @param string $label
     * @param  $type
     * @param string $conf
     * @example      $conf   searchable | filterable  | sortable
     *               $conf =      1     |     1       |  1
     */
    public function __construct(string $index, string $label, $type, string $conf = "111")
    {
        $this->index = $index;
        $this->unique = $index;
        $this->label = $label;
        $this->type = $type;
        $this->setConfig($conf);

    }

    /**
     * @param $index
     * @param $label
     * @param string $conf 11=121
     * @return Column
     */
    public static function id($index = 'id', $label = null, string $conf = "111")
    {
        $label = $label ?? trans('panel_ui::panel.id');
        return new self($index, $label, ColumnType::NUMBER, $conf);
    }

    /**
     * @param $index
     * @param $label
     * @param string $type
     * @param string $conf 11=121
     * @return Column
     */
    public static function sample($index, $label, $type = ColumnType::STRING, string $conf = "111")
    {
        return new self($index, $label, $type, $conf);
    }


    /**
     * @param $index
     * @param $label
     * @param string $conf
     * @return Column
     */
    public static function custom($index, $label, $func, string $conf = "111")
    {
        $instance = new self($index, $label, ColumnType::STRING, $conf);
        $instance->wrapper = 'custom';
        $instance->func = $func;
        return $instance;
    }

    /**
     * @param $index
     * @param $label
     * @param string $conf 11=121
     * @return Column
     */
    public static function date($index, $label, string $conf = "111")
    {
        return new self($index, $label, ColumnType::DATE, $conf);
    }

    /**
     * @param $index
     * @param $label
     * @param string $conf 11=121
     * @return Column
     */
    public static function currency($index, $label, string $conf = "111")
    {
        return new self($index, $label, ColumnType::CURRENCY, $conf);
    }

    /**
     * @return Column
     */
    public static function createdAt()
    {
        return new self('created_at', trans('panel_ui::panel.created_at'), ColumnType::DATE, "111");
    }

    /**
     * @return Column
     */
    public static function updatedAt()
    {
        return new self('updated_at', trans('panel_ui::panel.updated_at'), ColumnType::DATE, "111");
    }

    public static function timeStamp()
    {
        return [
            new self('created_at', trans('panel_ui::panel.created_at'), ColumnType::DATE, "111"),
            new self('updated_at', trans('panel_ui::panel.updated_at'), ColumnType::DATE, "111")
        ];
    }

    /**
     * @param $index
     * @param $label
     * @param string $conf
     * @return Column
     */
    public static function star($index, $label, string $conf = "111")
    {
        $instance = new self($index, $label, ColumnType::NUMBER, $conf);
        $instance->wrapper = "star";
        return $instance;
    }


    /**
     * @param $index
     * @param $label
     * @param string $conf
     * @return Column
     */
    public static function image($index, $label, $func, string $conf = "000")
    {
        $instance = new self($index, $label, ColumnType::IMAGE, $conf);
        $instance->wrapper = "image";
        $instance->func = $func;
        return $instance;
    }

    /**
     * @param $index
     * @param $label
     * @param string $conf
     * @return Column
     */
    public static function multiImage($index, $label, $func, string $conf = "000")
    {
        $instance = new self($index, $label, ColumnType::IMAGES, $conf);
        $instance->wrapper = "multiImage";
        $instance->func = $func;
        return $instance;
    }

    /**
     * @param $index
     * @param $label
     * @param string $conf
     * @return Column
     */
    public static function icon($index, $label, $func, string $conf = "000")
    {
        $instance = new self($index, $label, ColumnType::IMAGES, $conf);
        $instance->wrapper = "icon";
        $instance->func = $func;
        return $instance;
    }

    /**
     * @param $index
     * @param $label
     * @param string $conf
     * @return Column
     */
    public static function badge($index, $label, $func, string $conf = "111")
    {
        $instance = new self($index, $label, ColumnType::STRING, $conf);
        $instance->wrapper = "badge";
        $instance->func = $func;
        return $instance;
    }

    /**
     * @param $index
     * @param $label
     * @param string $conf
     * @return Column
     */
    public static function progress($index, $label, $func, string $conf = "111")
    {
        $instance = new self($index, $label, ColumnType::NUMBER, $conf);
        $instance->wrapper = "progress";
        $instance->func = $func;
        return $instance;
    }

    /**
     * @param $index
     * @param $label
     * @param string $conf
     * @return Column
     */
    public static function multiLine($index, $label, $func, string $conf = "111")
    {
        $instance = new self($index, $label, ColumnType::STRING, $conf);
        $instance->wrapper = "towLine";
        $instance->func = $func;
        return $instance;
    }

    /**
     * @param $index
     * @param $label
     * @param string $conf
     * @return Column
     */
    public static function link($index, $label, $func, string $conf = "111")
    {
        $instance = new self($index, $label, ColumnType::STRING, $conf);
        $instance->wrapper = "link";
        $instance->func = $func;
        return $instance;
    }


    /**
     * @return ColumnType
     */
    public function getType(): ColumnType
    {
        return $this->type;
    }

    /**
     * @return bool
     */
    public function isSearchable(): bool
    {
        return $this->searchable;
    }

    /**
     * @return bool
     */
    public function isSortable(): bool
    {
        return $this->sortable;
    }

    /**
     * @return bool
     */
    public function isFilterable(): bool
    {
        return $this->filterable;
    }


    /**
     * @return string
     */
    public function getWrapper(): string
    {
        return $this->wrapper;
    }

    /**
     * @param string $unique
     * @return Column
     */
    public function setUnique(string $unique): Column
    {
        $this->unique = $unique;
        return $this;
    }

    /**
     * @return Column
     */
    public function makeCopyAble(): Column
    {
        $this->copyable = true;
        return $this;
    }


    private function setConfig(string $conf)
    {
        ;
        $config = str_split($conf);
        $this->searchable = $config[0];
        $this->filterable = $config[1];
        $this->sortable = $config[2];

    }

    /**
     * @param mixed ...$filter
     * @return Column
     */
    public function setFilterList(...$filter): Column
    {
        $this->filterList = $filter;
        return $this;
    }

    /**
     * @return string
     */
    public function getFloat(): string
    {
        $this->float;
    }

    /**
     * @param string $float
     * @return Column
     */
    public function setFloat(string $float): Column
    {
        $this->float = $float;
        return $this;
    }

    /**
     * @param string $type
     * @return Column
     */
    public function setType(string $type): Column
    {
        $this->type = $type;
        return $this;
    }
}
