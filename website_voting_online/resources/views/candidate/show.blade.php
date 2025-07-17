<x-app-layout title="Detail Kandidat">
    <x-slot name="header">
        <h2 class="font-semibold text-2xl leading-tight text-white">
            Detail Kandidat: {{ $candidate->ketua }} & {{ $candidate->wakil_ketua }}
        </h2>
    </x-slot>

    <div class="text-indigo-100 min-h-screen" style="background: linear-gradient(to bottom, #0D1B2A, #1B263B, #2C3E50, #3A506B, #0D1B2A); min-height: 100vh;">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class=" rounded-lg overflow-hidden">
                    <div class="p-8">
                        <!-- Header Ketua -->
                        <div class="text-center bg-blue-600 text-white py-4 rounded-t-lg">
                            <h3 class="text-3xl font-bold">{{ $candidate->ketua }}</h3>
                            <p class="text-sm">Calon Ketua</p>
                        </div>
                        <div class="flex justify-center mt-6">
                            <img src="{{ asset('storage/' . $candidate->profile_image_ketua) }}" 
                                 alt="Foto Ketua" 
                                 class="w-40 h-40 rounded-md shadow-md border border-gray-300">
                        </div>

                        <!-- Latar Belakang Ketua -->
                        <div class="mt-8">
                            <h4 class="text-xl font-semibold text-white border-b-2 border-gray-300 pb-2">
                                Latar Belakang
                            </h4>
                            <p class="mt-4 text-gray-300">{{ $candidate->latar_belakang_ketua }}</p>
                        </div>

                        <!-- Visi Ketua -->
                        <div class="mt-8">
                            <h4 class="text-xl font-semibold text-white border-b-2 border-gray-300 pb-2">
                                Visi
                            </h4>
                            <ul class="mt-4 list-disc list-inside text-gray-300">
                                @foreach(explode("\n", $candidate->visi_ketua) as $visi)
                                    <li>{{ $visi }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Misi Ketua -->
                        <div class="mt-8">
                            <h4 class="text-xl font-semibold text-white border-b-2 border-gray-300 pb-2">
                                Misi
                            </h4>
                            <ul class="mt-4 list-disc list-inside text-gray-300">
                                @foreach(explode("\n", $candidate->misi_ketua) as $misi)
                                    <li>{{ $misi }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Divider -->
                        <hr class="my-12 border-gray-300">

                        <!-- Header Wakil Ketua -->
                        <div class="text-center bg-green-600 text-white py-4 rounded-t-lg">
                            <h3 class="text-3xl font-bold">{{ $candidate->wakil_ketua }}</h3>
                            <p class="text-sm">Calon Wakil Ketua</p>
                        </div>
                        <div class="flex justify-center mt-6">
                            <img src="{{ asset('storage/' . $candidate->profile_image_wakil_ketua) }}" 
                                 alt="Foto Wakil Ketua" 
                                 class="w-40 h-40 rounded-md shadow-md border border-gray-300">
                        </div>

                        <!-- Latar Belakang Wakil Ketua -->
                        <div class="mt-8">
                            <h4 class="text-xl font-semibold text-white border-b-2 border-gray-300 pb-2">
                                Latar Belakang
                            </h4>
                            <p class="mt-4 text-gray-300">{{ $candidate->latar_belakang_wakil_ketua }}</p>
                        </div>

                        <!-- Visi Wakil Ketua -->
                        <div class="mt-8">
                            <h4 class="text-xl font-semibold text-white border-b-2 border-gray-300 pb-2">
                                Visi
                            </h4>
                            <ul class="mt-4 list-disc list-inside text-gray-300">
                                @foreach(explode("\n", $candidate->visi_wakil_ketua) as $visi)
                                    <li>{{ $visi }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Misi Wakil Ketua -->
                        <div class="mt-8">
                            <h4 class="text-xl font-semibold text-white border-b-2 border-gray-300 pb-2">
                                Misi
                            </h4>
                            <ul class="mt-4 list-disc list-inside text-gray-300">
                                @foreach(explode("\n", $candidate->misi_wakil_ketua) as $misi)
                                    <li>{{ $misi }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-12 flex justify-between items-center">
                            <a href="{{ route('candidate.index') }}" 
                               class="inline-flex items-center px-6 py-2 text-white bg-blue-800 hover:bg-gray-900 rounded-lg shadow-md transition duration-300">
                                Kembali
                            </a>
                            <form action="{{ route('candidate.destroy', $candidate->id) }}" method="post" 
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus kandidat ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex items-center px-6 py-2 text-white bg-red-600 hover:bg-red-700 rounded-lg shadow-md transition duration-300">
                                    Hapus Kandidat
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
