<?php

use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create(); //import library faker

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('mahasiswa')->insert([
                'nama' => $faker->name,
                'email' => $faker->unique()->email, //email unique
                'nohp' => $faker->phoneNumber,
                'alamat' => $faker->address,
            ]);
        }
    }
}
