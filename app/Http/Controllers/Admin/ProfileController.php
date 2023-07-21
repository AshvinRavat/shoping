<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function index()
    {
        $admin = User::firstWhere('id', auth()->id());
        return view('admin.profile.index', [
            'admin' => $admin
        ]);
    }

    public function profileUpdate(Request $request)
    {
       $admin = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['email', 'max:255',  Rule::unique(User::class)->ignore($request->id)],
            'phone' => ['required', 'max:12']
       ]);

       User::where('id', auth()->id())
       ->update($admin);

       return back()->with('success', 'Profile update successfully');
    }


    public function updatePassword(Request $request)
    {
    
       $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
            'password_confirmation' => ['required']
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('success', 'Password update successfully');
    }

  
}
