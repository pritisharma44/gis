<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\CustomerRequest;
use App\Models\User;
use App\Http\Resources\CustomerResource;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = CustomerResource::collection(User::where(['user_type'=>'user'])->orderBy('id','DESC')->get());
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn ="";
                $permission = checkPermission('customers');
                if ($permission == 'modify') {
                    $btn .= '<a href="' . url("admin/customers/" . $row->id) . '" title="Edit" style="margin-left:5px;font-size:20px"><i class="mdi mdi-pencil""></i></a>&nbsp;';
                    $btn .= '<a href="customers/delete/' . $row->id . '" class="deleteUser" title="Delete" data-id="' . $row->id . '" style="margin-left:5px;font-size:20px"><span class="mdi mdi-trash-can"></span></a>&nbsp;';
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

                $permission = checkPermission('customers');
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
        return view('admin.customers.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customers.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['client_type'] = $request->client_type;
        $data['address'] = $request->address;
        $data['contact_no'] = $request->contact_no;
        $data['user_type'] =  $request->user_type;
        if ($request->hasFile('image')) {
            $image = UplaodImages($request->image, 'profile-img');

            $data['image'] = $image;
        }

        User::create($data);
        return redirect('admin/customers')->with('success','Customer added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::find($id);
        return view('admin.customers.edit',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, string $id)
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
        $data['client_type'] = $request->client_type;
        $data['address'] = $request->address;
        $data['user_type'] = 'user';
        $user = User::find($id)->update($data);
        return redirect('admin/customers')->with('success','Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = User::find($id);
        $post->delete();
        return response()->json(['success' => 'Customer deleted successfully.']);
    }
    public function changeStatus($id)
    {
        $user = User::where('id',$id)->first();
        if($user)
        {
            if($user->status == 'active')
            {
                $user->status = 'inactive';
            }
            else{
                $user->status = 'active';
            }
            $user->save();
            return redirect('admin/customers')->with('success','Status updated successfully.');
        }
    }
}
