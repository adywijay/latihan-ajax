<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DumpRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'access_name' => "Dept@CE-Group",
                'access_desc' => "Departement Chief Excecutive Groups",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'access_name' => "Dept@IT-Group",
                'access_desc' => "Departement Information Technology Groups",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'access_name' => "Dept@HR/GA-Group",
                'access_desc' => "Departement Human Resource / General Affairs Groups",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'access_name' => "Dept@CS-Group",
                'access_desc' => "Departement Customer Service Groups",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'access_name' => "Dept@SECG-Group",
                'access_desc' => "Departement Security General Groups",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'access_name' => "Dept@MNG-Group",
                'access_desc' => "Departement Team Management Groups",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'access_name' => "BSC@AC-Group",
                'access_desc' => "Bassic of Access Groups",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
        ]);
    }
}