<?php


use Phinx\Seed\AbstractSeed;

class SlotUserSeeder extends AbstractSeed
{

    public function getDependencies()
    {
        return [
            'UserSeeder',
            'SlotSeeder',
        ];
    }

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
        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'user_id'  => $faker->randomElement($array = range(1, 10)),
                'slot_id'  => $faker->randomElement($array = range(1, 10)),
                'time_in'  => $faker->dateTimeBetween($startDate = '-3 hour', $endDate = '-1 hour')->format('Y-m-d-H-i-s'),
                'time_out'  => $faker->randomElement([$faker->dateTimeBetween($startDate = '-1 hour', $endDate = 'now')->format('Y-m-d-H-i-s'), null]),
            ];
        }

        $this->table('slot_users')->insert($data)->save();
    }

}
