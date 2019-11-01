<?php


use Phinx\Seed\AbstractSeed;

class RowSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'name'      => $faker->name,
            ];
        }

        $this->table('rows')->insert($data)->save();
    }
}
