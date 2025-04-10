<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    /**
     * Display a listing of users.
     */
    public function index()
    {
        $data = User::latest()->paginate(5); // or User::paginate(10) for pagination
        return view("users.index", ['users' => $data])->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']), // Always hash passwords
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    /**
     * Display the specified user.
     */
    public function show($id)
    {
        return view('users.show', [
            'users' => User::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit($id)
    {
        return view('users.edit', [
            'users' => User::findOrFail($id)
        ]);
    }
    /**
     * Update the specified user.
     */
    public function update(Request $request, User $users)
    {
        // Validation for required fields (and using some regex to validate our numeric value)
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
        ]);
        $users = User::find($request->get('id'));
        // this can be used for debugging
        // it displays in the console
        // Getting values from the blade template form
        $users->Name = $request->get('name');
        $users->Email = $request->get('email');
        $users->save();
        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified user.
     */
    public function destroy($id)
    {
        // find the student
        $users = User::find($id);
        // delete the student

        $users->delete();
        // redirect to students list page
        return redirect()->route('users.index')
            ->with('success', 'user deleted successfully');
    }
}
