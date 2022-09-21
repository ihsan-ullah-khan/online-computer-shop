<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('user_type', 'U')->orderByDesc('id')->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required|min:4|max:20',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);
        User::create($attributes);

        return redirect()
            ->route('users.index')
            ->with('flash', ['type', 'success', 'message' => 'User Added Successfully.']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        if ($user = User::find($id)) {
            $attributes = request()->validate([
                'name' => ' required|min:4|max:20',
                'user_type' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'email' => 'required|unique:users,email, ' . $id,
            ]);

            $user->update($attributes);

            return redirect()
                ->route('users.index')
                ->with('flash', ['type', 'success', 'message' => 'User Updated Successfully']);

        }


    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('flash', ['type', 'success', 'message' => 'User Deleted Successfully.']);
    }
}
