<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact as ContactModel;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function index()
    {
        $contact = ContactModel::paginate(PAGINATION_COUNT);
        return view('admin.contact.index', compact('contact'));

    }

}
