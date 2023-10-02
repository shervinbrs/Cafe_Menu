<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'username'=>'09350000000'
        // ]);
        \App\Models\setting::create([
            'name'=>'cafeName',
            'value'=>'default'
        ]);
        \App\Models\widget::create([
            'name'=>'aboutUs',
            'type'=>'ckeditor'
        ]);
        \App\Models\widget::create([
            'name'=>'alert',
            'type'=>'input'
        ]);
    }
}
