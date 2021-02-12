<?php


namespace Modules\PanelCore\Dynamic\enums;


abstract class FieldType
{
    public const TEXT = 'text';
    public const TEXTAREA = 'textarea';
    public const IMAGE = 'image';
    public const RADIO = 'radio';
    public const TOGGLE = 'toggle';
    public const CHECK_BOX = 'checkbox';
    public const SELECT = 'select';
    public const MAP = 'map';
    public const CLEAR = 'clear';
    public const EDITOR = 'editor';
    public const HIDDEN = 'hidden';
    public const FILE = 'file';
    public const SELECT2 = 'select2';
    public const CkeditorWithImage = 'ckeditor_with_image';
}
