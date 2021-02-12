<?php
namespace Modules\PanelCore\DataGrid\Types;



abstract class ColumnType
{
    public const NUMBER = 'number';
    public const STRING = 'string';
    public const BOOLEAN = 'boolean';
    public const IMAGE = 'image';
    public const IMAGES = 'images';
    public const DATE = 'datetime';
    public const CURRENCY = 'currency';
}
