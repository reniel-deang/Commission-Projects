<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UploadImage;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    public function becometeacher(): View
    {
        return view('auth.becometeacher');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'usertype' => ['required', 'string'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'firstname' => ucfirst($request->firstname),
            'lastname' => ucfirst($request->lastname),
            'usertype' => $request->usertype,
            'verification' => 'false',
            'email' => $request->email,
            'password' => Hash::make($request->string('password')),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }

    public function storeteacher(Request $request): RedirectResponse
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'usertype' => ['required', 'string'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'number' => ['required', 'regex:/^(09|\+639)\d{9}$/'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif', //max:2048
        ]);

        //Image Handling
        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->storeAs('images', $imageName, 'public');
        $imageUrl = Storage::url('images/' . $imageName);


        $user = User::create([
            'firstname' => ucfirst($request->firstname),
            'lastname' =>  ucfirst($request->lastname),
            'usertype' => $request->usertype,
            'verification' => 'unverified',
            'email' => $request->email,
            'phonenumber' => $request->number,
            'password' => Hash::make($request->string('password')),
            'imagelink' => $imageUrl
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
    

    // public function storeImage(Request $request){
    //     $data= new UploadImage();

    //     if($request->file('image')){
    //         $file= $request->file('image');
    //         $filename= date('YmdHi').$file->getClientOriginalName();
    //         $file-> move(public_path('public/Image'), $filename);
    //         $data['image']= $filename;
    //     }
    //     $data->save();
    //     return redirect()->route('images.view');
       
    // }

}
