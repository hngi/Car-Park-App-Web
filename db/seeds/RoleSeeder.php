<?php


use Phinx\Seed\AbstractSeed;

class RoleSeeder extends AbstractSeed
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
        $data = [
            [
                'id'        => 1,
                'authority' => 'Super Admin',
            ],[
                'id'        => 2,
                'authority' => 'Admin',
            ],[
                'id'        => 3,
                'authority' => 'User',
            ]
        ];
        $this->table('roles')->insert($data)->save();
    }

}
