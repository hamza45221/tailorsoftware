<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $orders = Order::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        $dailyLabels = $orders->pluck('date');
        $dailyData = $orders->pluck('total');

        $monthly = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month', 'ASC')
            ->get();

        $monthlyLabels = $monthly->pluck('month');
        $monthlyData = $monthly->pluck('total');

        $yearly = Order::selectRaw('YEAR(created_at) as year, COUNT(*) as total')
            ->groupBy('year')
            ->orderBy('year', 'ASC')
            ->get();

        $yearlyLabels = $yearly->pluck('year');
        $yearlyData = $yearly->pluck('total');


        $total_customers = Order::all()->count();
        $total_employee = User::where('role', 'employee')->count();
        $total_pending_orders = Order::where('status', 'pending')->count();


        return view('admin.dashboard', compact(
            'dailyLabels', 'dailyData',
            'monthlyLabels', 'monthlyData',
            'yearlyLabels', 'yearlyData','total_customers','total_employee','total_pending_orders'
        ));
    }
    public function fetchPendingOrders()
    {
        $data = Order::where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->select('*');

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
                $color = strtolower($row->status) == 'completed' ? 'success' : 'danger';
                return '<span class="badge badge-light-' . $color . '">' . ucfirst($row->status) . '</span>';
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
                return '
                        <div class="d-flex justify-content-center align-items-center ">
                        <div class="px-2">
                            <a data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer" data-dt=\''.json_encode($program).'\' data-id="'.$program->id.'" class="menu-link btn-edit "> <i class="fa-solid fa-pen "></i></a>
                        </div>

                        <div class="menu-item ">
                            <a data-id="'.$program->id.'"
                            style=""
                           data-bs-toggle="modal"
                           data-bs-target="#viewOrderModal"
                           data-dt=\''.json_encode($program).'\'
                           class="btn-view px-2"> <i class="fa-solid fa-eye text-info"></i> </a>
                        </div>
                        </div>
                     ';
            })
            ->rawColumns(['id', 'status', 'actions'])
            ->make(true);
    }


}
