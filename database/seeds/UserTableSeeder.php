<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
class UserTableSeeder extends Seeder
{

    public function run()
    {
   
        DB::table('users')->delete();
      
        User::create([
            'email' => 'shouhuni.xue@qq.com',
            'password'=>bcrypt('luhu521xue.'),
            'name'=>'Lu'
        ]);
    }
}

?>