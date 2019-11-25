<?php

namespace Modules\CommonModule\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\CommonModule\Entities\Language;

class CommonModuleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'lang' => 'ar',
            'display_lang' => 'Arabic',
            'active' => 1
        ]);

        Language::create([
            'lang' => 'en',
            'display_lang' => 'English',
            'active' => 0
        ]);
    }
}
