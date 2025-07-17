<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Candidate;
use App\Http\Requests\CandidateRequest;

class CandidateController extends Controller
{
    /**
     * Menampilkan daftar kandidat.
     */
    public function index()
    {
        // Mengambil semua data kandidat
        $candidates = Candidate::all();

        // Mengirim data kandidat ke view 'candidate.index'
        return view('candidate.index', compact('candidates'));
    }

    /**
     * Menampilkan form untuk menambah kandidat.
     */
    public function create()
    {
        return view('candidate.form', [
            'candidate' => new Candidate(),
            'page_meta' => [
                'title' => 'Create New Candidate',
                'method' => 'post',
                'header' => 'Form New Candidate',
                'url' => route('candidate.store'),
                'submit_text' => 'Create',
            ],
        ]);
    }

    /**
     * Menyimpan data kandidat baru ke database.
     */
    public function store(CandidateRequest $request)
    {
        // Validasi data dari form request
        $data = $request->validated();

        // Mengupload gambar Ketua
        if ($request->hasFile('profile_image_ketua')) {
            $data['profile_image_ketua'] = $this->uploadFile($request->file('profile_image_ketua'));
        }

        // Mengupload gambar Wakil Ketua
        if ($request->hasFile('profile_image_wakil_ketua')) {
            $data['profile_image_wakil_ketua'] = $this->uploadFile($request->file('profile_image_wakil_ketua'));
        }

        // Simpan data kandidat yang telah divalidasi
        Candidate::create($data);

        return redirect()->route('candidate.index')->with('success', 'Candidate created successfully.');
    }

    /**
     * Menampilkan detail kandidat.
     */
    public function show(Candidate $candidate)
    {
        return view('candidate.show', compact('candidate'));
    }

    /**
     * Menampilkan form untuk mengedit kandidat.
     */
    public function edit(Candidate $candidate)
    {
        return view('candidate.form', [
            'candidate' => $candidate,
            'page_meta' => [
                'title' => 'Edit Candidate',
                'method' => 'put',
                'header' => 'Edit Candidate : ' . $candidate->ketua . ' & ' . $candidate->wakil_ketua,
                'url' => route('candidate.update', $candidate->id),
                'submit_text' => 'Update',
            ],
        ]);
    }

    /**
     * Memperbarui data kandidat yang ada.
     */
    public function update(CandidateRequest $request, Candidate $candidate)
    {
        // Validasi data dari form request
        $data = $request->validated();

        // Mengupdate gambar Ketua jika ada file baru
        if ($request->hasFile('profile_image_ketua')) {
            if ($candidate->profile_image_ketua) {
                Storage::delete($candidate->profile_image_ketua);
            }
            $data['profile_image_ketua'] = $this->uploadFile($request->file('profile_image_ketua'));
        }

        // Mengupdate gambar Wakil Ketua jika ada file baru
        if ($request->hasFile('profile_image_wakil_ketua')) {
            if ($candidate->profile_image_wakil_ketua) {
                Storage::delete($candidate->profile_image_wakil_ketua);
            }
            $data['profile_image_wakil_ketua'] = $this->uploadFile($request->file('profile_image_wakil_ketua'));
        }

        // Update data kandidat
        $candidate->update($data);

        return redirect()->route('candidate.index')->with('success', 'Candidate updated successfully.');
    }

    /**
     * Menghapus kandidat.
     */
    public function destroy(Candidate $candidate)
    {
        // Hapus gambar terkait jika ada
        if ($candidate->profile_image_ketua) {
            Storage::delete($candidate->profile_image_ketua);
        }

        if ($candidate->profile_image_wakil_ketua) {
            Storage::delete($candidate->profile_image_wakil_ketua);
        }

        // Hapus kandidat dari database
        $candidate->delete();

        return redirect()->route('candidate.index')->with('success', 'Candidate deleted successfully.');
    }

    /**
     * Fungsi untuk mengupload file ke penyimpanan.
     */
    private function uploadFile($file)
{
    return $file->storeAs('profile_images', $file->hashName(), 'public');
}

}
