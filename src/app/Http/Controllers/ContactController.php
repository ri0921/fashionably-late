<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tell_1', 'tell_2', 'tell_3', 'address', 'building', 'category_id', 'detail']);
        $genders = [
            1 => '男性',
            2 => '女性',
            3 => 'その他'
        ];
        $gender = $genders[$request->gender];
        $category = Category::find($request->category_id);

        return view('confirm', compact('contact', 'category', 'gender'));
    }

    public function store(Request $request)
    {
        if($request->input('back') == 'back'){
            return redirect('/')->withInput();
        }

        $tell = $request->tell_1. $request->tell_2. $request->tell_3;
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'address', 'building', 'category_id', 'detail']);
        $contact['tell'] = $tell;
        Contact::create($contact);

        return view('thanks');
    }
}
