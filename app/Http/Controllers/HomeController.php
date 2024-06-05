<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rombel;
use App\Models\Rayon;
use App\Models\Student;
use App\Models\Late;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Mendapatkan data tambahan untuk dashboard
        $role = Auth::user()->role;
        $statistics = $this->dashboardStatistics($role);

        // Memperbarui nama key yang sesuai
        $statistics['total_rayon_students'] = $statistics['rayon_students'] ?? 0;
        $statistics['total_late_students_today'] = $statistics['lates_today'] ?? 0;

        return view('index', compact('statistics'));
    }

    public function administratorDashboard()
    {
        return view('welcome');
    }

    public function dashboardStatistics($role)
    {
        $statistics = [
            'total_students' => 0,
            'total_administrators' => 0,
            'total_pembimbing_siswa' => 0,
            'total_rombel' => 0,
            'total_rayon' => 0,
            'rayon_students' => 0,
            'lates_today' => 0,
        ];

        if ($role === 'admin') {
            $statistics = [
                'total_students' => Student::count(),
                'total_administrators' => User::where('role', 'admin')->count(),
                'total_pembimbing_siswa' => User::where('role', 'ps')->count(),
                'total_rombel' => Rombel::count(),
                'total_rayon' => Rayon::count(),
            ];
        } elseif ($role === 'ps') {
            $user = Auth::user();

            if ($user->rayon_id) {
                $rayonStudents = Student::where('rayon_id', $user->rayon_id)->count();
                $latesToday = Late::whereDate('created_at', today())->count();

                $statistics = [
                    'rayon_students' => $rayonStudents,
                    'lates_today' => $latesToday,
                ];
            }
        }

        return $statistics;
    }

    }


    // public function pembimbingSiswaDashboard()
    // {
    //     $rayonId = auth()->user()->rayon_id;

    //     $totalRayonStudents = Student::where('rayon_id', $rayonId)->count();

    //     $totalLateStudentsToday = Late::where('rayon_id', $rayonId)
    //         ->whereDate('date_time_late', now()->toDateString())
    //         ->count();

    //     $statistics = $this->dashboardStatistics();
    //     $statistics['total_rayon_students'] = $totalRayonStudents;
    //     $statistics['total_late_students_today'] = $totalLateStudentsToday;

    //     return view('index', compact('statistics'));
    // }
// }