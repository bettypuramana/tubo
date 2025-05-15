<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use DB;
use App\Models\Services;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $services=Services::orderBy('id', 'DESC')->get();
        return view('admin.services',compact('services'));
    }
    public function delete(Request $request, $id)
    {
        DB::table('services')->where('id',$id)->delete();

        return redirect()->route('services-list')->with('success', 'Services deleted successfully.');
    }
    public function create()
    {
        return view('admin/services_add');
    }
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:3000',            
        ],
        [
            'title.required' => 'This field is required',
            'description.required' => 'This field is required',
            'image.required' => 'This field is required',        
        ]);

        $insertservice = new Services;
        $insertservice->title = $request->input('title');
        $insertservice->description = $request->input('description');
        $insertservice->created_by = $user_id;

        if ($request->file('image') != null)
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            // Create Intervention Image instance
            $img = Image::make($file->getPathname());

            // Crop to 1023x1104 from top-left corner (adjust x,y if needed)
            $img->crop(1023, 1104, 0, 0);

            // Save cropped image to uploads/services folder
            $img->save(public_path('uploads/services/' . $filename));

            $insertservice->image = $filename;
        }

        $save = $insertservice->save();

        if ($save)
        {
            return redirect(route('services-list'))->with('success', 'Details Saved Successfully !');
        }
        else
        {
            return redirect()->back()->with('Fail', 'Something Went Wrong');
        }
    }
    public function edit($id)
    {
        $services=Services::where('id',$id)->first();
        return view('admin/servicesedit',compact('services'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ],
        [
            'title.required' => 'This field is required',
            'description.required' => 'This field is required',
        ]);

        $old = $request->input('old');

        $updateservice = Services::find($id);
        $updateservice->title = $request->input('title');
        $updateservice->description = $request->input('description');

        if ($request->file('image') != null) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            // Create Intervention Image instance and crop image
            $img = Image::make($file->getPathname());

            // Crop the image (adjust the size and position as needed)
            $img->crop(1023, 1104, 0, 0);

            // Save cropped image to uploads/services folder
            $img->save(public_path('uploads/services/' . $filename));

            // Delete old image if exists
            $imagePath = public_path('uploads/services/') . $old;
            if (file_exists($imagePath) && $old != null) {
                unlink($imagePath);
            }

            $updateservice->image = $filename;
        }

        $update = $updateservice->save();

        if ($update) {
            return redirect(route('services-list'))->with('status', 'Details Updated Successfully !');
        } else {
            return redirect()->back()->with('Fail', 'Something Went Wrong');
        }
    }
}
