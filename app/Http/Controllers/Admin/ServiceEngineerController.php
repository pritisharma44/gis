<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\Datatables\Datatables;
use App\Http\Resources\ServiceEngineerResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ServiceEngineerRequest;

class ServiceEngineerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ServiceEngineerResource::collection(User::where("user_type", "service_engineer")->orderBy('id', 'DESC')->get());
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn ="";
                    $permission = checkPermission('service_engineers');
                    if ($permission == 'modify') {
                        $btn .= '<a href="' . url("admin/service-engineers/" . $row->id) . '" title="Edit" style="margin-left:5px;font-size:20px"><i class="mdi mdi-pencil""></i></a>&nbsp;';
                        $btn .= '<a href="service-engineers/delete/' . $row->id . '" class="deleteUser" title="Delete" data-id="' . $row->id . '" style="margin-left:5px;font-size:20px"><span class="mdi mdi-trash-can"></span></a>&nbsp;';
                    }
                    return $btn;
                })
                ->addColumn('status', function ($row) {
                    $status = "";
                    $btn = "";
                    if ($row->status == "active")
                        $status = "checked";
                    else
                        $status = "";

                    $permission = checkPermission('service_engineers');
                    if ($permission == 'modify')                        
                      $btn = '<label class="switch switch-primary switch-pill form-control-label mr-2" title="' . $row->status . '">
                      <input type="checkbox" class="switch-input form-check-input" '. $status .' data-id="' . $row->id . '" data-key="' . $row->status . '">
                      <span class="switch-label"></span>
                      <span class="switch-handle"></span>
                    </label>';
                    else
                    $btn = '<label class="switch switch-primary switch-pill form-control-label mr-2" title="' . $row->status . '">
                    <input type="checkbox" class="switch-input form-check-input" '. $status .' data-id="' . $row->id . '" data-key="' . $row->status . '" disabled>
                    <span class="switch-label"></span>
                    <span class="switch-handle"></span>
                  </label>';
                    return $btn;
                })
                ->addColumn('image', function ($row) {
                    $image_url = $row->image ? '<a href="' . url('upload/profile-img/' . $row->image) . '" target="_blank"><img src="' . url('upload/profile-img/' . $row->image) . '" style="width:50px;height:50px;"></a>' : 'N/A';
                    return   $image_url;

                })
                ->rawColumns(['action','status','image'])
                ->make(true);
        }
        return view('admin.service-engineer.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service-engineer.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceEngineerRequest $request)
    {
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['contact_no'] = $request->contact_no;
        $data['user_type'] =  $request->user_type;
        if ($request->hasFile('image')) {
            $image = UplaodImages($request->image, 'profile-img');

            $data['image'] = $image;
        }

        User::create($data);
        return redirect('admin/service-engineers')->with('success','Service Engineer added successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::find($id);
        return view('admin.service-engineer.edit',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $data = User::find($id);
        // return view('admin.service-engineer.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceEngineerRequest $request, string $id)
    {
        $oldValue = User::where('id', $id)->first();
        $image = $oldValue->image;

        if ($request->hasFile('image')) {

            if ($oldValue->image) {
                $path = public_path('upload/profile-img/') . $oldValue->image;
                unlink($path);
            }
            $image = UplaodImages($request->image, 'profile-img');
        }

        $data['image'] = $image;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['contact_no'] = $request->contact_no;
        $data['user_type'] = 'service_engineer';
        $user = User::find($id)->update($data);
        return redirect('admin/service-engineers')->with('success','Service Engineer updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = User::find($id);
        $post->delete();
        return response()->json(['success' => 'User deleted successfully.']);
    }
}
