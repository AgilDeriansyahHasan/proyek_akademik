<x-app-layout title="Admin Area">
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-indigo-100">
            {{ __('Admin Area') }}
        </h2>
    </x-slot>

    <!-- Full Gradient Background -->
    <div class="min-h-screen bg-gradient-to-b from-[#0D1B2A] via-[#1B263B] to-[#2C3E50]">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-lg sm:rounded-lg bg-gray-900 p-6 border border-gray-700">
                    <h3 class="text-2xl font-bold text-teal-400 mb-4 text-center">
                        {{ __('Riwayat Voting') }}
                    </h3>
                    <p class="text-sm text-gray-400 mb-6 text-center">
                        {{ __('Berikut adalah daftar riwayat voting Anda. Anda dapat mencari berdasarkan nama menggunakan kotak pencarian di bawah ini.') }}
                    </p>

                    <!-- Form Pencarian -->
                    <form method="GET" action="{{ route('users.search') }}" class="flex items-center gap-3 mb-6">
                        <input 
                            type="text" 
                            name="search" 
                            value="{{ request('search') }}" 
                            placeholder="Cari berdasarkan nama..." 
                            class="flex-1 px-5 py-3 border border-gray-700 rounded-md bg-gray-800 text-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                        <button 
                            type="submit" 
                            class="px-4 py-2 text-sm font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                            Cari
                        </button>
                    </form>

                    <!-- Tabel Riwayat Voting -->
                    <div class="overflow-hidden border border-gray-700 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead class="bg-gray-800">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">#</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">NPM</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Candidate</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Waktu Voting</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Status Voting</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                @foreach($users as $user)
                                <tr class="hover:bg-gray-800">
                                    <td class="px-6 py-4 text-sm text-gray-300">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-300">{{ $user->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-300">{{ $user->npm }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-300">{{ $user->email }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-300">
                                        @if($user->votings->isNotEmpty())
                                            {{ $user->votings->first()->candidate }}
                                        @else
                                            {{ 'Belum Voting' }}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-300">
                                        @if($user->votings->isNotEmpty())
                                            {{ $user->votings->first()->created_at->format('d M Y, H:i') }}
                                        @else
                                            {{ 'Belum Voting' }}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        @if($user->votings->isNotEmpty())
                                            <span class="text-green-400">Sudah Voting</span>
                                        @else
                                            <span class="text-red-400">Belum Voting</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        @if($user->votings->isNotEmpty())
                                            @foreach($user->votings as $voting)
                                            <form action="{{ route('users.destroy', $voting->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-400 hover:text-red-600">
                                                    Hapus Voting
                                                </button>
                                            </form>
                                            @endforeach
                                        @else
                                            <span class="text-gray-500">Tidak ada voting untuk dihapus</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Statistik Voting -->
            <div class="mt-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
                    <div class="bg-gray-900 p-6 rounded-lg shadow-lg">
                        <h5 class="text-lg font-semibold text-gray-200">Total Pengguna</h5>
                        <p class="text-3xl font-bold text-teal-400 mt-2">{{ $users->count() }}</p>
                    </div>
                    <div class="bg-gray-900 p-6 rounded-lg shadow-lg">
                        <h5 class="text-lg font-semibold text-gray-200">Sudah Voting</h5>
                        <p class="text-3xl font-bold text-green-400 mt-2">
                            {{ $users->filter(fn($user) => $user->votings->isNotEmpty())->count() }}
                        </p>
                    </div>
                    <div class="bg-gray-900 p-6 rounded-lg shadow-lg">
                        <h5 class="text-lg font-semibold text-gray-200">Belum Voting</h5>
                        <p class="text-3xl font-bold text-red-400 mt-2">
                            {{ $users->filter(fn($user) => $user->votings->isEmpty())->count() }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Daftar Masukan -->
            <div class="mt-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-lg sm:rounded-lg bg-gray-900 p-6 border border-gray-700">
                    <h3 class="text-2xl font-bold text-teal-400 mb-4 text-center">
                        {{ __('Daftar Masukan') }}
                    </h3>
                    <p class="text-sm text-gray-400 mb-6 text-center">
                        {{ __('Berikut adalah daftar masukan dari pengguna. Anda dapat mencari berdasarkan nama atau masukan menggunakan kotak pencarian di bawah ini.') }}
                    </p>

                    <!-- Tabel Daftar Masukan -->
                    <div class="overflow-hidden border border-gray-700 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead class="bg-gray-800">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">#</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Nama</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Masukan</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Waktu</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                @foreach($feedbacks as $index => $feedback)
                                <tr class="hover:bg-gray-800">
                                    <td class="px-6 py-4 text-sm text-gray-300">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-300">{{ $feedback->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-300">{{ $feedback->feedback }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-300">{{ $feedback->created_at->format('d M Y, H:i') }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-300">
                                        <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-400 ml-2">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Tombol Kembali -->
            <div class="mt-6 text-center">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
