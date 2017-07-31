<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use Config;
use Lang;
use App;
use Log;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:'.(new User)->getTable().'',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'verification_code' => str_random(20)
        ]);

        $user_transform = json_decode($user,true);

        Log::info('[RegisterController][create] User_ID: '.$user_transform["id"]);

        if($user_transform["id"]){

            $data['user_id'] = $user_transform["id"];

            //add NORMAL privileges
            $bmsuper = App\Bmsuper::newUser($user_transform["id"],2,$user_transform["id"]);

            //1 FREE
            $bmsusr = App\Bmsusr::actualizarPaquete($user_transform["id"],1);

        }

        //send verification mail to user
        //---------------------------------------------------------
        $data['verification_code']  = $user->verification_code;

        $mail = new \App\library\classes\queueMails($data);
        $mail->welcome();

        return $user;
    }
}
