<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Voting;
use App\Models\Home;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Fetching data for candidates and voting results
        $candidates = Candidate::all();
        $feedbacks = Home::all();
        $votings = Voting::select('candidate', \DB::raw('count(*) as total'))
            ->groupBy('candidate')
            ->get();
        $totalVotes = Voting::count();

        // Passing the data to the view
        return view('dashboard', compact('candidates', 'votings', 'totalVotes','feedbacks'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'feedback' => 'required|string|max:1000',
        ]);

        if ($validated['name'] !== auth()->user()->name) {
            return redirect()->back()->withErrors(['name' => 'Nama yang Anda masukkan tidak sesuai dengan nama pengguna Anda.']);
        }
        // Simpan data ke database
        Home::create([
            'user_id' => auth()->id(), // ID pengguna yang sedang login
            'name' => $validated['name'],
            'feedback' => $validated['feedback'],
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Terima kasih atas masukan Anda!');
    }
}
