<?php

namespace Modules\PanelCore\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\PanelCore\Entities\Lang;


class LangDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Lang::create([
            'name'=>'english',
            'code'=>'en',
            'is_master'=>false
        ]);
        Lang::create([
            'name'=>'فارسی',
            'code'=>'fa',
            'is_master'=>true
        ]);
        Lang::create([
            'name'=>'پشتو',
            'code'=>'pa',
            'is_master'=>false
        ]);
    }
}
