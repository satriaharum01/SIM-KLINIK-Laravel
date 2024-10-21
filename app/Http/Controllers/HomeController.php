<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Billing;
use App\Models\Doctors;
use App\Models\MedicalRecords;
use App\Models\Patients;
use App\Models\Prescriptions;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->data['title'] = env('APP_NAME');
        //$this->middleware('is_admin');
    }

    /*
     * Dashboad Function
    */
    public function index()
    {
        $this->data['chart'] = $this->graph_area();
        return view('admin/dashboard/index', $this->data);
    }

    public function login()
    {
        $this->data['alertMessage'] = '';
        return view('auth/login', $this->data);
    }

    public function get_doctors()
    {
        $data = Doctors::select('*')
                ->orderby('name', 'ASC')
                ->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function get_patients()
    {
        $data = Patients::select('*')
                ->orderby('name', 'ASC')
                ->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->make(true);
    }

}
