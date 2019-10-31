<?php


use Phinx\Seed\AbstractSeed;

class UserRoleSeeder extends AbstractSeed
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
        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'user_id'  => $faker->randomElement($array = range(1, 10)),
                'role_id'  => $faker->randomElement($array = range(1, 3)),
            ];
        }

        $this->table('user_roles')->insert($data)->save();
    }

    public function getDependencies()
    {
        return [
            'RoleSeeder'
        ];
    }
}
