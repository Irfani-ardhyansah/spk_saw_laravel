<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Mahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Prodi;
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
    protected $redirectTo = '/user';

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
        // Validasi Inputan Dari Form Register
        return Validator::make($data, [
            'prodi_id'     => 'required|exists:prodis,id',
            'npm'       => 'required|min:9|max:9|unique:users,npm|digits_between:1,10',
            'email'     => 'required|email|max:255|unique:users,email',
            'password'  => 'required|min:6|confirmed',
            'name'      => 'required|max:50|alpha',
            'semester'  => 'required|digits_between:3,5',
            'address'   => 'required|max:100|alpha',
            'gender'    => 'required|alpha',
            'phone'     => 'required|max:12|min:11',
            'religion'  => 'required|alpha',
            'photo'     => 'mimes:jpg,jpeg,png|max:20000'
        ],[
            'prodi_id.required' => 'Prodi Harus Dipilih !',
            'password.min'        => 'Password Minimalh Harus 6 !',
            'npm.unique'        => 'NPM Sudah Terdaftar !',
            'npm.numeric'        => 'NPM Harus Berupa Angka !',
            'npm.max'        => 'NPM Harus 9 !',
            'npm.digits_between'        => 'NPM Angka !',
            'name.required'     => 'Nama Harus Diisi !',
            'name.alpha'     => 'Nama Harus Berupa Karakter !',
            'email.required'    => 'Email Harus Diisi !',
            'email.unique'      => 'Email Sudah Terdaftar !',
            'phone.required'    => 'No Hp Harus Diisi !',
            'phone.max'        => 'No Hp Maksimal 12 !',
            'address.required'  => 'Alamat Harus Diisi !',
            'gender.alpha'  => 'Gender Harus Dipilih !',
            'semester.between'  => 'Semester Harus Dipilih !',
            'prodi_id.exists'  => 'Prodi Harus Dipilih !',
            'religion.alpha'  => 'Agama Harus Dipilih !',
            'address.alpha'  => 'Alamat Harus Berupa Karakter !',
            'photo.mimes'  => 'Foto Harus Berformat jpg,jpeg,png !',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    
    public function showRegistrationForm()
    {
        $prodis = Prodi::orderBy('name', 'ASC')->get();
        return view('auth.register', compact('prodis'));
    }

    //method untuk menghandle inputan register
    protected function create(array $data)
    {
        //Menginput Pada Tabel User
        $user = User::create([
            'npm'       => $data['npm'],
            'email'     => $data['email'],
            'password'  => bcrypt($data['password']),
        ]);

        //Mengecek apakah ada inputan dari form photo
        if(isset($data['photo'])) {
            //memecah array dan memasukkan ke dalam variabel
            (is_array($file = $data['photo']));
            $extension = $file->getClientOriginalExtension();
            $nama_file = 'profile' . '.' . $extension;
            $data['photo']->move('profile_images/'. $data['npm'] . '/', $nama_file);
            $profile = $nama_file;
        } else {
            $profile = NULL;
        }

        //Menginput pada tabel Mahasiswa
        Mahasiswa::create([
            'user_id'   => $user->id,
            'prodi_id'     => $data['prodi_id'],
            'name'      => $data['name'],
            'semester'  => $data['semester'],
            'address'   => $data['address'],
            'gender'    => $data['gender'],
            'phone'     => $data['phone'],
            'religion'  => $data['religion'],
            'photo'     => $profile,
        ]);
        return ($user);
    }

    // Method untuk mencegah agar langsung login setelah register
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //The auto login code has been removed from here.

        return redirect($this->redirectPath());
    }
}
