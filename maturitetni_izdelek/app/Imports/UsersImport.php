<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Mail\WelcomeMail;
use Illuminate\Support\Str; 

class UsersImport implements ToModel,  WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $temp_password = Str::random(12);

        do {
            $randomString = Str::random(12);
        } while (User::where('user_stringID', $randomString)->exists());

        $user = new User([
            'name' => $row['name'],
            'surname' => $row['surname'],
            'email' => $row['email'],
            'user_stringID' => Str::random(12), // Generate unique ID
            'temp_password' => $temp_password, // Store temp password
            'password' => Hash::make($temp_password), // Store hashed password
            'admin' => 0, // Default to regular user
        ]);

        $user -> save();

        Mail::to($user->email)->send(new WelcomeMail($user, $temp_password));

        return $user;
    }
}
