<?php
use Illuminate\View\Component;
use Modules\PanelCore\DataGrid\Columns\Core\Action;
use Modules\PanelCore\DataGrid\Types\Icon;
use Modules\PanelCore\DataGrid\Types\MethodType;
use Modules\PanelCore\Dynamic\enums\ContentType;

function  breadcrumb(string $title, ?string $url = null) {
return new  Modules\PanelCore\Dynamic\core\Breadcrumb($title,$url);
 }
function  avatarUpload(string $name, string $label,string  $value=null) {
return new  Modules\PanelCore\Dynamic\inputs\AvatarUpload($name,$label,$value);
 }
function  checkBox(string $name, string $label, array $items) {
return new  Modules\PanelCore\Dynamic\inputs\CheckBox($name,$label,$items);
 }
function  ckedtiorWithImage(string $name, string $label) {
return new  Modules\PanelCore\Dynamic\inputs\CkedtiorWithImage($name,$label);
 }
function  clear() {
return new  Modules\PanelCore\Dynamic\inputs\Clear();
 }
function  editor(string $name, string $label) {
return new  Modules\PanelCore\Dynamic\inputs\Editor($name,$label);
 }
function  fileInput(string $name, string $label) {
return new  Modules\PanelCore\Dynamic\inputs\FileInput($name,$label);
 }
function  hidden(string $name, string $value) {
return new  Modules\PanelCore\Dynamic\inputs\Hidden($name,$value);
 }
function  imageUpload(string $name, string $label,int $col=12) {
return new  Modules\PanelCore\Dynamic\inputs\ImageUpload($name,$label,$col);
 }
function  inputRepeater(array $elements,string $name, string $label, $value=null,int $col=12) {
return new  Modules\PanelCore\Dynamic\inputs\InputRepeater($elements,$name,$label,$value,$col);
 }
function  item(string $value, string $label, bool $checked=false,string $image=null) {
return new  Modules\PanelCore\Dynamic\inputs\Item($value,$label,$checked,$image);
 }
function  location(string $name, string $label) {
return new  Modules\PanelCore\Dynamic\inputs\Location($name,$label);
 }
function  multiFileInput(string $name, string $label, string $extensions = "",$value=null, int $count = 1,int $col=6) {
return new  Modules\PanelCore\Dynamic\inputs\MultiFileInput($name,$label,$extensions,$value,$count,$col);
 }
function  radio(string $name, string $label, array $items,string $value=null) {
return new  Modules\PanelCore\Dynamic\inputs\Radio($name,$label,$items,$value);
 }
function  select(string $name, string $label, array $items,string $value=null, string $placeholder = null, bool $isMulti = false) {
return new  Modules\PanelCore\Dynamic\inputs\Select($name,$label,$items,$value,$placeholder,$isMulti);
 }
function  select2(string $name, string $label, array $items, string|array $value = null, string $placeholder = null, $onChange = null, bool $isMulti = false, bool $imageable = false, bool $init = true) {
return new  Modules\PanelCore\Dynamic\inputs\Select2($name,$label,$items,$value,$placeholder,$onChange,$isMulti,$imageable,$init);
 }
function  selectStack(string $name, string $label, array $list, string $placeholder = null, bool $isMulti = false) {
return new  Modules\PanelCore\Dynamic\inputs\SelectStack($name,$label,$list,$placeholder,$isMulti);
 }
function  textArea(string $name, string $label, bool $countAble = false) {
return new  Modules\PanelCore\Dynamic\inputs\TextArea($name,$label,$countAble);
 }
function  textInput(string $name, string $label, $contentType = ContentType::TEXT, string $value = null, int $col = 6,bool $hidden=false, string $id = null,bool $isMulti=false,string $familyName=null,$checkbox=null) {
return new  Modules\PanelCore\Dynamic\inputs\TextInput($name,$label,$contentType,$value,$col,$hidden,$id,$isMulti,$familyName,$checkbox);
 }
function  toggle(string $name, string $label, string $onLabel, string $offLabel, string $value=null) {
return new  Modules\PanelCore\Dynamic\inputs\Toggle($name,$label,$onLabel,$offLabel,$value);
 }
function  avatar($image = null, string $name = null, string $bio = null, int $col = 6) {
return new  Modules\PanelCore\Dynamic\view\Avatar($image,$name,$bio,$col);
 }
function  badge(string $text, string $bg_color, string $color,string $icon=null, int $col= 6) {
return new  Modules\PanelCore\Dynamic\view\Badge($text,$bg_color,$color,$icon,$col);
 }
function  barChart(array $data, array $labels, string $title = null, int $col= 6) {
return new  Modules\PanelCore\Dynamic\view\BarChart($data,$labels,$title,$col);
 }
function  button(string $title, string $link=null,string $method=MethodType::GET, $target = '_self', int $col= 6) {
return new  Modules\PanelCore\Dynamic\view\Button($title,$link,$method,$target,$col);
 }
function  chart(array $data, array $labels, string $title = null, int $col= 6) {
return new  Modules\PanelCore\Dynamic\view\Chart($data,$labels,$title,$col);
 }
function  dataset(string $label, array $data,string $borderColor = '#3160D8', array $borderDash = []) {
return new  Modules\PanelCore\Dynamic\view\Chart\Dataset($label,$data,$borderColor,$borderDash);
 }
function  col(array $elements, string $title = null, int $col = 12,bool $transparent=false) {
return new  Modules\PanelCore\Dynamic\view\Col($elements,$title,$col,$transparent);
 }
function  donutChart(array $data, array $labels, string $title = null, int $col= 6) {
return new  Modules\PanelCore\Dynamic\view\DonutChart($data,$labels,$title,$col);
 }
function  formCol(array $elements, array $rules, string $action, string $title = null, int $col = 12) {
return new  Modules\PanelCore\Dynamic\view\FormCol($elements,$rules,$action,$title,$col);
 }
function  image(string $title, string $src=null, int $col= 6) {
return new  Modules\PanelCore\Dynamic\view\Image($title,$src,$col);
 }
function  imageBox(string $title, string $src, int $col = 6) {
return new  Modules\PanelCore\Dynamic\view\ImageBox($title,$src,$col);
 }
function  lineChart(array $data, array $labels, string $title = null, int $col= 6) {
return new  Modules\PanelCore\Dynamic\view\LineChart($data,$labels,$title,$col);
 }
function  listItem(Component $start = null, Component $bottom = null, Component $end = null, Component $end2 = null, string $image=null, int $col = 12) {
return new  Modules\PanelCore\Dynamic\view\ListItem($start,$bottom,$end,$end2,$image,$col);
 }
function  pieChart(array $data, array $labels, string $title = null, int $col= 6) {
return new  Modules\PanelCore\Dynamic\view\PieChart($data,$labels,$title,$col);
 }
function  progress(float $progress, int $col= 6) {
return new  Modules\PanelCore\Dynamic\view\Progress($progress,$col);
 }
function  reportBox(string $title, ?string $value, ?string $end, ?Component $end2, ?string  $icon, int $col= 6) {
return new  Modules\PanelCore\Dynamic\view\ReportBox($title,$value,$end,$end2,$icon,$col);
 }
function  tab(string $title, array $elements, int $col= 6) {
return new  Modules\PanelCore\Dynamic\view\Tab($title,$elements,$col);
 }
function  tabCol(array $tabs, int $col = 12, string $title = null) {
return new  Modules\PanelCore\Dynamic\view\TabCol($tabs,$col,$title);
 }
function  table(array $columns, $records, int $col= 6) {
return new  Modules\PanelCore\Dynamic\view\Table($columns,$records,$col);
 }
function  text(string $text=null) {
return new  Modules\PanelCore\Dynamic\view\Text($text);
 }
function  timeLine(string $title, array $elements, int $col = 12) {
return new  Modules\PanelCore\Dynamic\view\TimeLine($title,$elements,$col);
 }
function  title(string $title, string $link = null, string $linkText = null, string $linkIcon = null) {
return new  Modules\PanelCore\Dynamic\view\Title($title,$link,$linkText,$linkIcon);
 }
function  chatBox($messages) {
return new  Modules\PanelCore\Dynamic\view\chatBox\ChatBox($messages);
 }
function  message(string $message, $isYou, $user,$attaches, string $created_at) {
return new  Modules\PanelCore\Dynamic\view\chatBox\Message($message,$isYou,$user,$attaches,$created_at);
 }

function colAction(string $label, string $icon, string $methodType, $route, string $color = "#000", $visible = null): Action
{
    return new Action($label, $icon, $methodType, $route, $color, $visible);
}

function multiColAction(string $label, string $icon, string $color = "#000", ...$actions): Action
{
    return (new Action($label, $icon, MethodType::JAVASCRIPT, "javascript:;", $color))->withChildren($actions);
}

function deleteColAction($route): Action
{
    return new Action(trans("panel_ui::panel.delete"), Icon::delete, MethodType::DELETE, $route, "red");
}

function editColAction($func): Action
{
    return new Action(trans("panel_ui::panel.edit"), Icon::edit, MethodType::GET, $func);
}
