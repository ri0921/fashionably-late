<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ContactController;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Admin;

class AdminController extends Controller
{
    public function admin()
    {
        $contacts = Contact::with('category')->get();
        $categories = Category::all();
        $contacts = Contact::Paginate(7);

        return view('admin', compact('contacts', 'categories'));
    }

    public function search(Request $request)
    {
        $contacts = Contact::with('category')->KeywordSearch($request->keyword);

        if ($request->has('gender') && $request->gender != '') {
            $contacts = $contacts->where('gender', $request->gender);
        }

        if ($request->has('category_id') &&    $request->category_id != '') {
            $contacts = $contacts->where('category_id', $request->category_id);
        }

        if ($request->has('calendar') && $request->calendar != '') {
            $contacts = $contacts->whereDate('created_at', $request->calendar);
        }
        $contacts = $contacts->paginate(7);
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }

    public function show($id)
    {
        $contact = Contact::with('category')->findOrFail($id);
        return response()->json([
            'contact' => $contact]);
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('admin');
    }
}
