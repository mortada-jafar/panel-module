<?php

use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationData;
use Illuminate\Validation\ValidationRuleParser;
use Modules\PanelCore\Dynamic\inputs\Item;
use Modules\PanelCore\Dynamic\view\chatBox\Message;


/**
 * @param UploadedFile $file
 * @param string $disk
 * @return string
 */
function upload(UploadedFile $file, $disk = "public")
{
    return '/storage/' . $file->store('images/certs', $disk);
}

/**
 * @return string
 */
function getLocal(): string
{
    return app()->getLocale();
}

/**
 * @param $column
 * @return string
 */
function getLocalColumn($column): string
{
    return app()->getLocale() . '_' . $column;
}


/**
 * @param $date
 * @return string
 */
function getOriginalDate($date)
{
    if (!$date) {
        return null;
    }
    return Verta::parse($date)->datetime()->format('Y/n/j');
}

function getLocalDate($date, $format = 'Y/n/j H:i')
{

    if (!$date) {
        return null;
    }

    try {

        if (app()->getLocale() == "fa") {
            return verta($date)->timezone('Asia/Tehran')->format($format);

        } else {
            if ($date instanceof Carbon) {
                return $date->format($format);
            } else {
                return Carbon::parse($date)->format($format);
            }
        }
    } catch (Exception $exception) {
        return $date;
    }
}


function formatDate($date, $format = 'Y/n/j')
{
    if (!$date) {
        return null;
    }

    try {

        if (app()->getLocale() == "fa") {
            return Verta::parse($date)->timezone('Asia/Tehran')->format($format);

        } else {
            if ($date instanceof Carbon) {
                return $date->format($format);
            } else {
                return Carbon::parse($date)->format($format);
            }
        }
    } catch (Exception $exception) {
        return $date;
    }
}


function getCurrentLocaleDirection()
{
    switch (\Illuminate\Support\Facades\App::getLocale()) {

        case 'ar':
        case 'fa':
            return 'rtl';
        default:
            return 'ltr';
    }
}

function getCurrentLocalDateType(): string
{
    switch (\Illuminate\Support\Facades\App::getLocale()) {
        case 'fa':
            return "persian";
        default:
            return "gregorian";
    }
}

function getMessages($messages, $isYou, $user, $attachFunc, $message = 'content', $created_at = 'created_at')
{

    $options = [];
    foreach ($messages as $element) {
//        dd($element->{$name});
        $options[] = new Message(
            $element->{$message},
            ($isYou)($element),
            ($user)($element),
            ($attachFunc)($element),
            $element->{$created_at},
        );
    }
    return $options;
}

function getOptions($elements, $selected = null, $value = 'name', string $key = 'id', $image = null)
{

    $options = [];
    foreach ($elements as $element) {
        $options[] = new Item(
            $element->{$key},
            is_callable($value) ? ($value)($element) : $element->{$value},
            isSelected($element->{$key}, $selected), $image ? ($image)($element) : null
        );
    }
    return $options;
}

function isSelected($value, $data): bool
{
    if (is_array($data)) {
        return in_array($value, $data);
    } else {
        return $data == $value;
    }
}

function getYearOptions()
{
    $items = [];
    $thisYear = (int)now()->format('Y');
    for ($i = $thisYear; $i > $thisYear - 70; $i--) {
        $items[] = new Item($i, $i);
    }
    return $items;
}

function getJQRules($rules)
{

//    dd($rules);
    $rules = fixArrayJQ($rules);
    $v = new ValidationRuleParser($rules);
    $rules = $v->explode($rules);
    $jqRules = [];
    foreach ($rules->rules as $key => $rule) {

        foreach ($rule as $r) {
            switch ($r) {
                case "required":
                    $jqRules[$key]['required'] = true;
                    break;
                case "persian_alpha":
                    $jqRules[$key]['persian_alpha'] = true;
                    break;
                case "allRequired":
                    $jqRules[$key]['allRequired'] = true;
                    break;
                case Str::startsWith($r, 'min:'):
                    //check if is number
                    if (isset($jqRules[$key]['number'])) {
                        $jqRules[$key]['min'] = intval(substr($r, 4, strlen($r)));
                    } else {
                        $jqRules[$key]['minlength'] = intval(substr($r, 4, strlen($r)));
                    }
                    break;
                case Str::startsWith($r, 'max:'):
                    //check if is number
                    if (isset($jqRules[$key]['number'])) {
                        $jqRules[$key]['max'] = intval(substr($r, 4, strlen($r)));
                    } else {
                        $jqRules[$key]['maxlength'] = intval(substr($r, 4, strlen($r)));
                    }
                    break;
                case Str::startsWith($r, 'regex:'):
                    $jqRules[$key]['regex'] = substr($r, 6, strlen($r));
                    break;
                case Str::startsWith($r, 'step:'):
                    $jqRules[$key]['step'] = substr($r, 5, strlen($r));
                    break;
                case "email":
                    $jqRules[$key]['email'] = true;
                    break;
                case "numeric":
                    $jqRules[$key]['number'] = true;
                    break;
                case Str::startsWith($r, "mimes:"):
                    //extension: "jpg|jpeg|png",
                    $jqRules[$key]['extension'] = str_replace(',', '|', substr($r, 6, strlen($r)));
                    break;
                case Str::startsWith($r, 'same:'):
                    $jqRules[$key]['equalto'] = '#' . substr($r, 5, strlen($r));
                    break;
            }
        }
    }
    return $jqRules;
}

function fixArrayJQ($rules)
{

    foreach ($rules as $key => $rule) {
        if (Str::contains($key, '*')) {
            $attr = explode(".", $key);
            unset($rules[$key]);
            for ($i = 0; $i < 10; $i++) {
                $rules[getAttrRule($attr, $i)] = $rule;
            }
        }
    }
    return $rules;
}

function getAttrRule($attr, $i)
{
    $res = "";
    foreach ($attr as $index => $key) {

        if ($index == 0) {
            $res .= $key;
            continue;
        } else if ($key == "*") {
            $res .= '[' . $i . ']';
        } else {
            $res .= '[' . $key . ']';
        }
    }
    return $res;
}
