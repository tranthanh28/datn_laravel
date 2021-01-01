<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name= 'Nguyễn Văn Hoàng';
        $user->email= 'Hoang@gmail.com';
        $user->password= '123456';
        $user->wallet= 1000000;
        $user->address= 'Tp. Thái Bình';
        $user->phone= '09261212';
        $user->fullname= 'Nguyễn Văn Hoàng';
        $user->save();
    }
}
