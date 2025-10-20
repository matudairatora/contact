<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Models\User;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class AdminController extends Controller
{
    public function index()
{
    $categories = Category::all();
    $contacts = Contact::all();
  
    return view('admin.index',compact('categories','contacts'));
}



}
