<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function create()
    {
        return view('admin.order.create');
    }
    public function index(){
        return view('admin.order.index');
    }

    public function fetch()
    {
        $data = Order::orderBy('created_at', 'desc')->select('*');
        return datatables()->of($data)
            ->editColumn('id', function ($pg) {
                return ' <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="'.$pg->id.'" />
                    </div>';
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at ? $row->created_at->format('d/m/Y') : '';
            })
            ->editColumn('status', function ($row) {
                if (strtolower($row->status) === 'complete') {
                    return '<span class="badge badge-light-success">Complete</span>';
                } else {
                    return '<span class="badge badge-light-danger">'.ucfirst($row->status).'</span>';
                }
            })->editColumn('quantity', function ($row) {
                // If main quantity field is empty or null, calculate total manually
                if (empty($row->quantity)) {
                    $sum = ($row->shalwar_kameez_qty ?? 0)
                        + ($row->waistcoat_qty ?? 0)
                        + ($row->kurta_qty ?? 0)
                        + ($row->coat_qty ?? 0);
                    return $sum > 0 ? $sum : '-';
                }
                return $row->quantity;
            })


            ->addColumn('actions', function ($program) {
                return '<a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                        <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                        <div class="menu-item px-3">
                            <a data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer" data-dt=\''.json_encode($program).'\' data-id="'.$program->id.'" class="menu-link btn-edit px-3"> <i class="fa-solid fa-pen me-2"></i> Edit</a>
                        </div>
                        <div class="menu-item px-3">
                            <a href="'.route('admin.order.delete',$program->id).'" data-kt-customer-table-filter="delete_row" class="menu-link px-3"><i class="fa-solid fa-trash-can me-2 "></i>Delete</a>
                        </div>

                        <div class="menu-item px-3">
                            <a data-id="'.$program->id.'"
                           data-bs-toggle="modal"
                           data-bs-target="#viewOrderModal"
                           data-dt=\''.json_encode($program).'\'
                           class="menu-link btn-view px-3"> <i class="fa-solid fa-eye me-2"></i> View</a>
                        </div>
                    </div>';
            })
            ->rawColumns(['id', 'actions','created_at','status','view_details'])
            ->make(true);
    }

    public function store(Request $request){

        $data = Order::firstOrNew(['id'=>$request->id]);
        $isNew = !$data->exists;

        $data->customer_id       = $request->customer_id;
        $data->name              = $request->name;
        $data->phone_number      = $request->phone_number;
        $data->phone_number2     = $request->phone_number2;
        $data->service           = $request->service;
        $data->quantity          = $request->quantity;
        $data->shalwar_kameez_qty = $request->shalwar_kameez_qty;
        $data->waistcoat_qty     = $request->waistcoat_qty;
        $data->kurta_qty         = $request->kurta_qty;
        $data->coat_qty          = $request->coat_qty;
        $data->address           = $request->address;
        $data->reference_person  = $request->reference_person;
        $data->gala              = $request->gala;
        $data->kamar             = $request->kamar;
        $data->chhati_tayar      = $request->chhati_tayar;
        $data->chhati            = $request->chhati;
        $data->bazoo             = $request->bazoo;
        $data->teera             = $request->teera;
        $data->lambai            = $request->lambai;
        $data->button            = $request->button;
        $data->collar             = $request->collar;
        $data->collar_bean             = $request->collar_bean;
        $data->kaff              = $request->kaff;
        $data->pati              = $request->pati;
        $data->gheera_tayar      = $request->gheera_tayar;
        $data->pancha            = $request->pancha;
        $data->shalwar           = $request->shalwar;
        $data->button_style      = $request->button_style;
        $data->pancha_style      = $request->pancha_style;
        $data->shalwar_pocket    = $request->shalwar_pocket;
        $data->side_pocket       = $request->side_pocket;
        $data->front_pocket      = $request->front_pocket;
        $data->note              = $request->note;
        $data->total_amount      = $request->total_amount;
        $data->status            = $request->status;
        $data->gender            = $request->gender;
        $data->payment           = $request->payment;
//        coat measurement
        $data->w_coat_hip           = $request->w_coat_hip;
        $data->w_coat_gala           = $request->w_coat_gala;
        $data->w_coat_kamar           = $request->w_coat_kamar;
        $data->w_coat_chhati           = $request->w_coat_chhati;
        $data->w_coat_bazoo           = $request->w_coat_bazoo;
        $data->w_coat_teera           = $request->w_coat_teera;
        $data->w_coat_lambai           = $request->w_coat_lambai;

        $data->save();


        if ($isNew) {
            return redirect()->route('admin.order')->with('success','Order saved successfully...');
        }

        return response()->json([
            'success' => true,
            'message' => 'Order saved successfully!',
            'redirect' => route('admin.order')
        ]);
    }



    public function delete($id)
    {
        $data=Order::find($id);
        if ($data){
            $data->delete();
            return redirect()->back()->with('success','Order deleted successfully...');
        }
        return redirect()->back()->with('error','Error While deleting Program...');
    }
    public function deleteMultiple(Request $request){

        $departments = Order::whereIn('id',$request->id)->delete();


        return response(['success'=>true,'message'=>'Selected row deleted successfully...']);
    }
}
