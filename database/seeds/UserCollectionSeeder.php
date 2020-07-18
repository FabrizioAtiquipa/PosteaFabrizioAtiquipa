<?php
use Illuminate\Database\Seeder;
class UserCollectionSeeder extends Seeder
{
public function run()
   {
            DB::table('users')->insert([
                  'name' => 'Fabrizio Atiquipa Mendoza',
                  'email' => 'fabrizio.atiquipa@tecsup.edu.pe',
                  'password' => bcrypt('fabrizio123/'),
            ]);

        $users = factory(App\User::class, 10)
        ->create()
        ->each( function ($user){
            $user->posts()->createMany(
                factory(App\Post::class, 5)->make()->toArray()
            );
        });
    }
}

?>