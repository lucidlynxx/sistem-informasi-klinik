<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Employee;
use App\Models\Medicine;
use App\Models\Patient;
use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';

        $totalPatients = Patient::count();

        $totalEmployees = Employee::count();

        $result = DB::table('registrations')
            ->selectRaw('COUNT(*) as total, SUM(CASE WHEN status = "menunggu" THEN 1 ELSE 0 END) as waiting')
            ->first();

        $totalRegistrations = $result->total;
        $totalRegistrationsWaitingStatus = $result->waiting;

        $latestDate = Registration::max('tanggal_daftar');
        $sevenDaysAgo = Carbon::parse($latestDate)->subDays(6)->toDateString();

        $registrationsDate = Registration::whereBetween('tanggal_daftar', [$sevenDaysAgo, $latestDate])
            ->orderBy('tanggal_daftar', 'asc')
            ->get('tanggal_daftar');

        $actionsData = Action::withCount('medicalrecords')
            ->has('medicalrecords')
            ->orderByDesc('medicalrecords_count')
            ->take(6)
            ->get()
            ->map(function ($action) {
                return [$action->tindakan, $action->medicalrecords_count];
            })
            ->toArray();

        $medicinesData = Medicine::withCount('medicalrecords')
            ->has('medicalrecords')
            ->orderByDesc('medicalrecords_count')
            ->take(10)
            ->get()
            ->map(function ($action) {
                return [$action->nama_obat, $action->medicalrecords_count];
            })
            ->toArray();

        return view('dashboard.index', compact(
            'title',
            'totalPatients',
            'totalEmployees',
            'totalRegistrations',
            'totalRegistrationsWaitingStatus',
            'registrationsDate',
            'actionsData',
            'medicinesData',
        ));
    }
}
