<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Hour;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {

       
        return view('auth.registri');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);
        
            
      
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'start_date' => $request->start_date,
            'is_admin' => $request->is_admin,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

       

        return redirect(RouteServiceProvider::HOME);
    }

    public function delete($id) {
        $users = User::All(); 
        if (!$user = User::find($id)) {
            return redirect()->route('users');
        }

        
        return view('pages/users/confirmDelete', compact('user'));
        
       
}

public function destroyUser($id) {

    
    if (!$user = User::find($id)) {
        return redirect()->route('users');
    }

   
    Hour::where('user_id', $id)->delete();

  
    $user->delete();

    return redirect()->route('users');
}

public function edit($id) {

    if (!$user = User::find($id)) {
        return redirect()->route('users');
    }
    
    

    return view('pages/users/viewUser', 
         compact('user'));
       
    
   
}

public function update(Request $request,$id) {

    if (!$user = User::find($id)) {
        return redirect()->route('users');
    }
    
   
    $user->update($request->all());

    return redirect()->route('users');
       
    
   
}


}
