<?php

namespace Modules\PanelCore\Dynamic\core;

interface IForm
{
    public function getBreadcrumbs();
    public function rules();
    public function columns();
    public function action();

}
