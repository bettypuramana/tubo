<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Client;
use DB;
use App\Models\Career;
use App\Models\Contact;

class UserController extends Controller
{
    
    public function index()
    {
        $services=Services::orderBy('id', 'ASC')->get();
        $clients=Client::orderBy('id', 'ASC')->get();
        return view('user.home',compact('services','clients'));
    }
    public function about_us(){
        return view('user.about');
    }
    public function services(){
        $services=Services::orderBy('id', 'ASC')->get();
        return view('user.services',compact('services'));
    }
    public function projects()
    {
        // Eager load 'projects' relationship to avoid N+1 problem
        $clients = Client::with('projects')->orderBy('id', 'ASC')->get();
        return view('user.projects', compact('clients'));
    }
    public function careers(){
        return view('user.careers');
    }
    public function contact(){
        return view('user.contact');
    }
    public function store_contact(Request $request){

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',            
            ],
            [
            'name.required' => 'This field is required',
            'email.required' => 'This field is required',
            'subject.required' => 'This field is required', 
            'message.required' => 'This field is required',        
            ]
        );
        $insertcontact= new Contact;
        $insertcontact->name=$request->input('name');
        $insertcontact->email=$request->input('email');
        $insertcontact->subject=$request->input('subject');
        $insertcontact->message=$request->input('message');        
        $save= $insertcontact->save();

        if($save){
            return redirect()->back()->with('success', 'Message sent successfully!');
        }
        else{
            return redirect()->back()->with('fail', 'Looks like an error please try again later!');
        }
    }

    public function store_career(Request $request)
    {
        $validated = $request->validate([
            
            'name' => 'required',
            'email' => 'required',
            'position' => 'required',
            'image' => 'required|mimes:pdf,png,jpg,jpeg|max:1024',            
            ],
            [
            'name.required' => 'This field is required',
            'email.required' => 'This field is required',
            'position.required' => 'This field is required', 
            'image.required' => 'This field is required',  
            ]
            
        );

        $insertCareer= new Career;
        $insertCareer->name=$request->input('name');
        $insertCareer->email=$request->input('email');
        $insertCareer->position=$request->input('position');

        if ($request->file('image')!=null)
        {
        // echo "dasfafs";
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/cv',$filename);
            $insertCareer->cv=$filename;
        }
        $save= $insertCareer->save();
        if($save){
            return redirect()->back()->with('success', 'Details sent successfully!!! We will connect you soon!!!');
        }
        else{
            return redirect()->back()->with('fail', 'Looks like an error please try again later!');
        }
    }

}
