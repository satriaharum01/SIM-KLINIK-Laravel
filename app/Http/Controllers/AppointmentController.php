<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DataTables;
use App\Models\Appointments;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->data['title'] = 'Data Appointment';
        $this->data[ 'link' ] = '/admin/appointment';
        $this->page = 'admin/appointment';
        $this->view = 'admin/appointment/index';
        $this->data['page'] = $this->page;
    }

    public function destroy($id)
    {
        $rows = User::findOrFail($id);
        $rows->delete();
        return redirect($this->page);

    }

    public function update(Request $request, $id)
    {
        $rows = Appointments::find($id);

        $rows->update([
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
            'update_at' => now()
         ]);


        return redirect($this->page);

    }

    public function store(Request $request)
    {
        Appointments::create([
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level
        ]);
        return redirect($this->page);

    }

    public function json()
    {
        $data = Appointments::select('*')
                ->orderby('appointment_date', 'DESC')
                ->orderby('appointment_time', 'DESC')
                ->get();

        foreach($data as $row)
        {
            $row->waktu = date('d F Y',strtotime($row->appointment_date)) . $row->appointment_time;
            $row->pasien = $row->cari_pasien->name;
            $row->dokter = $row->cari_dokter->name;
        }

        return Datatables::of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function find($id)
    {
        $data = User::select('*')->where('id', $id)->get();

        return json_encode(array('data' => $data));
    }

}
