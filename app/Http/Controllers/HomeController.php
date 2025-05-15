<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Contact;
use App\Models\Career;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $services=Services::orderBy('id', 'DESC')->limit(4)->get();
        $contact=Contact::orderBy('id', 'DESC')->limit(6)->get();
        $career=Career::orderBy('id', 'DESC')->limit(6)->get();
        return view('admin.home',compact('services','contact','career'));
    }
}
