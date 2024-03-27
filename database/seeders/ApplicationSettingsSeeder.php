<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ApplicationSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $settings = [
                'business_name' => 'Business Name',
                'business_address' => 'Your Business Address',
                'business_number' => '123654789',
                'business_email' => 'admin@email.com',
                'meta_title' => 'Your Meta Title',
                'meta_description' => 'Your Meta Description',
            ];
    
            // Insert data into the 'application_settings' table
            DB::table('application_settings')->insert($settings);
    }
}
