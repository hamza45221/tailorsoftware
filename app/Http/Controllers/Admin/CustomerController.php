<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        return view('admin.customer');
    }

    public function fetch()
    {
        $data = Customer::select('*');
        return datatables()->of($data)
            ->editColumn('id', function ($pg) {
                return ' <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="'.$pg->id.'" />
                    </div>';
            })
            ->addColumn('actions', function ($program) {
                return '<a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                        <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                        <div class="menu-item px-3">
                            <a data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer" data-dt=\''.json_encode($program).'\' data-id="'.$program->id.'" class="menu-link btn-edit px-3">Edit</a>
                        </div>
                        <div class="menu-item px-3">
                            <a href="'.route('admin.user.delete',$program->id).'" data-kt-customer-table-filter="delete_row" class="menu-link px-3">Delete</a>
                        </div>
                    </div>';
            })
            ->rawColumns(['id', 'actions'])
            ->make(true);
    }

    public function store(Request $request){

        $data = Customer::firstOrNew(['id'=>$request->id]);

        $data->name   = $request->name;
        $data->reference_id    = $request->reference_id;
        $data->email        = $request->email;
        $data->phone_number = $request->phone_number;
        $data->address = $request->address;

        $data->save();

        return response()->json([
            'success' => true,
            'message' => 'Customer saved successfully',
        ]);
    }



    public function delete($id)
    {
        $data=Customer::find($id);
        if ($data){
            $data->delete();
            return redirect()->back()->with('success','Customer deleted successfully...');
        }
        return redirect()->back()->with('error','Error While deleting Program...');
    }
    public function deleteMultiple(Request $request){
        $departments = Customer::whereIn('id',$request->id)->delete();
        return response(['success'=>true,'message'=>'Selected row deleted successfully...']);
    }

}
