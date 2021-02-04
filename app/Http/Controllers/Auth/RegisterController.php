<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Mahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Auth;
use Carbon\Carbon;

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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
            'npm'       => 'required|max:9|unique:users',
            'email'     => 'required|email|max:255|unique:users',
            'password'  => 'required|min:6|confirmed',
            'name'      => 'required|max:50',
            'prodi'     => 'required',
            'semester'  => 'required',
            'address'   => 'required|max:100',
            'gender'    => 'required',
            'phone'     => 'required|max:12',
            'religion'  => 'required',
            'photo'     => 'mimes:jpg,jpeg,png|max:20000'
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
            'npm'       => $data['npm'],
            'email'     => $data['email'],
            'password'  => bcrypt($data['password']),
        ]);

        if(is_array(file($file = $data['photo']))) {
            $extension = $file->getClientOriginalExtension();
            $nama_file = rand(99,999) . '_' . Carbon::now()->format('Y-m-d') . '_' . '_profile' . '.' . $extension;
            $data['photo']->move('profile_images/', $nama_file);
            $profile = $nama_file;
        } else {
            $profile = NULL;
        }

        Mahasiswa::create([
            'user_id'   => $user->id,
            'name'      => $data['name'],
            'npm'       => $data['npm'],
            'prodi'     => $data['prodi'],
            'semester'  => $data['semester'],
            'address'   => $data['address'],
            'gender'    => $data['gender'],
            'phone'     => $data['phone'],
            'religion'  => $data['religion'],
            'photo'     => $profile
        ]);
        return ($user);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //The auto login code has been removed from here.

        return redirect($this->redirectPath());
    }
}
