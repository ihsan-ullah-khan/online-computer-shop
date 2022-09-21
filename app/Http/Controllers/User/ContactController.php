<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        return view('user.menu.contact.index', [
            'messages' => Contact::query()->where('user_id', Auth::id())->paginate(5),
        ]);
    }
    public function create()
    {
        return view('user.menu.contact.create');
    }
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'subject' => 'required|max: 20',
            'message' => 'required|min: 25'
        ]);
        Contact::create($attributes);
        return redirect()
            ->route('contact.index')
            ->with('flash', ['type', 'success', 'message' => 'Message Sent Successfully']);
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        $message = Contact::find($id);
        $message->delete();

        return redirect()
            ->route('contacts.index')
            ->with('flash', ['type', 'success', 'message' => 'Message deleted Successfully']);
    }
}
