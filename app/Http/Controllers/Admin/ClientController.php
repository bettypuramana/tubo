<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use DB;
use App\Models\Client;
use App\Models\ClientProject;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $clients=Client::orderBy('id', 'DESC')->get();
        return view('admin.clients',compact('clients'));
    }
    public function delete(Request $request, $id)
    {
        DB::table('clients')->where('id',$id)->delete();

        return redirect()->route('clients-list')->with('success', 'clients deleted successfully.');
    }
    public function create()
    {
        return view('admin/clients_add');
    }
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $validated = $request->validate([
            
            'title' => 'required',
            // 'subtitle' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:1024',            
            ],
            [
            'title.required' => 'This field is required',
            // 'subtitle.required' => 'This field is required',
            'image.required' => 'This field is required',        
            ]
            
        );

        $insertservice= new Client;
        $insertservice->title=$request->input('title');
        $insertservice->sub_title=$request->input('subtitle');
        $insertservice->created_by=$user_id;

        if ($request->file('image')!=null)
        {
        // echo "dasfafs";
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/clients',$filename);
            $insertservice->image=$filename;
        }
        $save= $insertservice->save();
        if($save)
        {
            return redirect(route('clients-list'))->with('success','Details Saved Successfully !');
        }
       else
        {
            return redirect()->back()->with('Fail','Something Went Wrong');
        }
    }
    public function edit($id)
    {
        $clients=Client::where('id',$id)->first();
        return view('admin/clientsedit',compact('clients'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            
            'title' => 'required',
            // 'subtitle' => 'required',
            ],
            [
            'title.required' => 'This field is required',
            // 'subtitle.required' => 'This field is required',
            ]
            
        );
        
        $old=$request->input('old');

        $updateservice= Client::find($id);
        $updateservice->title=$request->input('title');
        $updateservice->sub_title=$request->input('subtitle');
            
        
        if ($request->file('image')!=null)
        {
        // echo "dasfafs";
          $file=$request->file('image');
          $extension=$file->getClientOriginalExtension();
          $filename=time().'.'.$extension;
          $file->move('uploads/clients',$filename);
          $updateservice->image=$filename;

        $imagePath = public_path('uploads/clients/') . $old;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
      }
      $update= $updateservice->save();
      if($update)
      {
        return redirect(route('clients-list'))->with('status','Details Updated Successfully !');		
      }
     else
      {
        return redirect()->back()->with('Fail','Something Went Wrong');
      }
    }

    public function manage($client_id)
    {
        $client = Client::findOrFail($client_id);
        $projects = ClientProject::where('client_id', $client_id)->paginate(25); // ← paginate instead of get
        return view('admin.projects', compact('client', 'projects'));
    }
    public function storeOrUpdate(Request $request, $client_id)
    {
        $validated = $request->validate([
            'project_name' => 'required',
            'contractor' => 'required',
            'project_id' => 'nullable|exists:client_projects,id',
        ]);

        if ($request->project_id) {
            $project = ClientProject::findOrFail($request->project_id);
            $project->update($validated);

            if ($request->wantsJson()) {
                return response()->json([
                    'id' => $project->id,
                    'project_name' => $project->project_name,
                    'contractor' => $project->contractor,
                    'message' => 'Project updated.'
                ]);
            }
            return redirect()->back()->with('success', 'Project updated.');
        } else {
            $project = ClientProject::create([
                'client_id' => $client_id,
                'project_name' => $validated['project_name'],
                'contractor' => $validated['contractor'],
            ]);

            if ($request->wantsJson()) {
                return response()->json([
                    'id' => $project->id,
                    'project_name' => $project->project_name,
                    'contractor' => $project->contractor,
                    'message' => 'Project added.'
                ]);
            }
            return redirect()->back()->with('success', 'Project added.');
        }
    }

    public function editprojects($id)
    {
        return response()->json(ClientProject::findOrFail($id));
    }

    public function destroy($id)
    {
        ClientProject::destroy($id);
        return back()->with('success', 'Project deleted.');
    }
    

}
