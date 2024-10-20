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

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
        //$this->middleware('is_admin');
    }

    /*
     * Dashboad Function
    */
    public function index()
    {
        $this->data['title'] = 'Dashboard Admin';
        $this->data['chart'] = $this->graph_area();
        return view('admin/dashboard/index', $this->data);
    }

    public function appointment()
    {
        $this->data['title'] = 'Data Appointment';
        $this->data[ 'link' ] = '/admin/appointment';
        $this->data['page'] = 'admin/appointment';
        $this->view = 'admin/appointment/index';
        return view($this->view, $this->data);
    }

    public function graph_area()
    {
        $out = array();
        $date = date('Y-');
        for ($i = 1; $i <= 12 ; $i++) {
            if ($i < 10) {
                $finder = $date.'0'.$i;
            } else {
                $finder = $date.$i;
            }
            $data = Appointments::select('*')->where('created_at', '>=', $finder.'-00')->where('created_at', '<=', $finder.'-31')->get();
            $result = 0;
            $out[] = $result;
        }

        return json_encode($out);
    }
}
