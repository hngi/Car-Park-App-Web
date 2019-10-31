<?php


use Phinx\Seed\AbstractSeed;

class CarParkSeeder extends AbstractSeed
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
        $count = 1;
        $current_owner = 1;
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'owner_id'  => $current_owner,
                'name'      => $faker->word,
                'location'  => $faker->city,
            ];
            if ($count > 3) {
                $current_owner++;
                $count = 0;
            }
        }

        $this->table('car_parks')->insert($data)->save();
    }

    public function getDependencies()
    {
        return [
            'UserSeeder'
        ];
    }
}
