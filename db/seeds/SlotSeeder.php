<?php


use Phinx\Seed\AbstractSeed;

class SlotSeeder extends AbstractSeed
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
        $current_row = 1;
        $car_park_id = 1;
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'car_park_id' => $car_park_id,
                'row_id'      => $current_row,
                'number'      => $i,
            ];
            if ($count > 3) {
                $current_row++;
                $count = 0;
            }
            if ($i > 5 && $car_park_id === 1) {
                $car_park_id++;
            }
        }

        $this->table('slots')->insert($data)->save();
    }

    public function getDependencies()
    {
        return [
            'CarParkSeeder',
            'RowSeeder',
        ];
    }
}
