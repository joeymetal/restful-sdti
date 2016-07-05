<?php

use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
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
      #$faker = Faker\Factory::create();
      $data = [];
     # for ($i = 0; $i < 1; $i++) {
          $data[] = [
              'username'      => 'admin',
              'password'      => '$2y$07$sdtiSDTIsdtiSDTIsdtiS.pzapZkxTGGCC9ACpuirC/yewj1yQy9G', #1234
              'password_salt' => 'sdtiSDTIsdtiSDTIsdtiSDTI',
              'email'         => 'admin@admin.com',
              'first_name'    => 'joey',
              'last_name'     => 'h',
              'created'       => date('Y-m-d H:i:s'),
              
            //   'username'      => $faker->userName,
            //   'password'      => sha1($faker->password),
            //   'password_salt' => sha1('foo'),
            //   'email'         => $faker->email,
            //   'first_name'    => $faker->firstName,
            //   'last_name'     => $faker->lastName,
            //   'created'       => date('Y-m-d H:i:s'),
          ];
      #}

      $this->insert('users', $data);
    }
}
