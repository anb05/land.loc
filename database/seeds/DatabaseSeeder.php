<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(seeder_table_pages::class);
        $this->call(seeder_table_people::class);
        $this->call(seeder_table_portfolios::class);
        $this->call(seeder_table_services::class);
    }
}
