<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voting;
use App\Models\User;
use App\Models\Home;

class VotingController extends Controller
{
    // Menampilkan daftar semua voting
    public function index()
    {
        $votings = Voting::with('user')->get();
        $users = User::all(); // Mengambil semua data pengguna
        return view('users.voting', compact('votings', 'users'));
    }

    // Menyimpan data voting
public function store(Request $request)
{
    // Validasi input tanpa email, karena email akan diambil langsung dari tabel users
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'npm' => 'required|string|max:20',
        'candidate' => 'required|string',
        'user_id' => 'required|exists:users,id',
    ]);

    // Cek apakah Nama dan NPM cocok di tabel users
    $user = User::findOrFail($validatedData['user_id']);

    if ($user->npm !== $validatedData['npm']) {
        // Jika Nama atau NPM tidak cocok, kembali dengan pesan error
        return redirect()->back()->with('error', 'Nama atau NPM tidak valid atau tidak terdaftar.');
    }

    // Periksa apakah pengguna sudah voting
    $existingVote = Voting::where('user_id', $user->id)->first();

    if ($existingVote) {
        // Jika sudah voting, beri pesan error dan kembalikan ke halaman sebelumnya
        return redirect()->back()->with('error', 'Anda sudah memberikan suara. Voting hanya bisa dilakukan satu kali.');
    }

    // Menambahkan email ke data voting yang akan disimpan
    $validatedData['email'] = $user->email;

    // Menyimpan voting
    Voting::create($validatedData);

    // Redirect ke halaman hasil voting setelah sukses
    return redirect()->route('dashboard')->with('success', 'Voting berhasil disimpan!');
}


    // Menampilkan hasil voting
    public function result()
    {
        $votings = Voting::select('candidate', \DB::raw('count(*) as total'))
            ->groupBy('candidate')
            ->get();

        $totalVotes = Voting::count(); // Menghitung total voting
        return view('users.result', compact('votings', 'totalVotes'));
    }

    // Menampilkan detail voting berdasarkan ID
    public function show()
    {
        $users = User::with('votings')->get();
        $feedbacks = Home::all(); // Mengambil semua data voting
        $votings = Voting::all(); // Mengambil semua data voting
        return view('admin.show', compact('votings','users','feedbacks'));
    }

    // Mencari voting berdasarkan nama atau atribut lain
    public function search(Request $request)
    {
        // Validasi input pencarian
        $request->validate([
            'search' => 'required|string|max:255',
        ]);

        $search = $request->input('search');

        // Membuat query untuk pencarian
        $votings = Voting::where('name', 'like', '%' . $search . '%')
            ->orWhere('npm', 'like', '%' . $search . '%')
            ->orWhere('candidate', 'like', '%' . $search . '%')
            ->get();

        return view('admin.show', compact('votings', 'search'));
    }

    // Menghapus voting berdasarkan ID
    public function destroy($id)
    {
        // Pastikan hanya satu record yang diambil berdasarkan ID
        $voting = Voting::findOrFail($id);

        // Hapus record tersebut
        $voting->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('history')->with('success', 'Voting berhasil dihapus.');
    }

    // Menghapus voting berdasarkan ID
    public function destroyfeed($id)
    {
        // Pastikan hanya satu record yang diambil berdasarkan ID
        $feedbacks = Home::findOrFail($id);

        // Hapus record tersebut
        $feedbacks->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('history')->with('success', 'Feedback berhasil dihapus.');
    }

}
