<?php

namespace App\Database\Seeds;

use Nova\Database\ORM\Model;
use Nova\Database\Seeder;
use Nova\Support\Facades\Hash;
use Nova\Support\Str;

use App\Models\User;


class UsersTableSeeder extends Seeder
{
    protected $tokens = array();


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate the table before seeding.
        User::truncate();

        User::create(array(
            'id'             => 1,
            'role_id'        => 1,
            'username'       => 'admin',
            'password'       => Hash::make('admin'),
            'realname'       => 'Site Administrator',
            'email'          => 'admin@novaframework.dev',
            'activated'      => 1,
            'remember_token' => '',
            'api_token'      => $this->uniqueToken(),
        ));

        User::create(array(
            'id'             => 2,
            'role_id'        => 2,
            'username'       => 'marcus',
            'password'       => Hash::make('marcus'),
            'realname'      => 'Marcus Spears',
            'email'          => 'marcus@novaframework.dev',
            'activated'      => 1,
            'remember_token' => '',
            'api_token'      => $this->uniqueToken(),
        ));

        User::create(array(
            'id'             => 3,
            'role_id'        => 3,
            'username'       => 'michael',
            'password'       => Hash::make('michael'),
            'realname'       => 'Michael White',
            'email'          => 'michael@novaframework.dev',
            'activated'      => 1,
            'remember_token' => '',
            'api_token'      => $this->uniqueToken(),
        ));

        User::create(array(
            'id'             => 4,
            'role_id'        => 5,
            'username'       => 'john',
            'password'       => Hash::make('john'),
            'realname'       => 'John Kennedy',
            'email'          => 'john@novaframework.dev',
            'activated'      => 1,
            'remember_token' => '',
            'api_token'      => $this->uniqueToken(),
        ));

        User::create(array(
            'id'             => 5,
            'role_id'        => 5,
            'username'       => 'mark',
            'password'       => Hash::make('mark'),
            'realname'       => 'Mark Black',
            'email'          => 'mark@novaframework.dev',
            'activated'      => 1,
            'remember_token' => '',
            'api_token'      => $this->uniqueToken(),
        ));
    }

    protected function uniqueToken($length = 60)
    {
        while (true) {
            $token = Str::random($length);

            if (! in_array($token, $this->tokens)) {
                array_push($this->tokens, $token);

                return $token;
            }
        }
    }
}
