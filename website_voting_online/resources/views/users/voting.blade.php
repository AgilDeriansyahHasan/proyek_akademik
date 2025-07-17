<x-app-layout title="Voting">
<x-slot name="header">
        <h2 class="font-semibold text-2xl  leading-tight">
            {{ __('Form Voting') }}
        </h2>
    </x-slot>

    <div class="text-indigo-100 min-h-screen" style="background: linear-gradient(to bottom, #0D1B2A, #1B263B, #2C3E50, #3A506B,  #0D1B2A); min-height: 100vh;">

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-transparent  rounded-lg overflow-hidden">
                    <div class="p-8 text-white">
                        <h3 class="text-3xl font-bold mb-4">
                            {{ __('Silakan Mengisi Formulir Voting') }}
                        </h3>
                        <p class="text-lg leading-relaxed mb-6">
                            {{ __('Partisipasi Anda sangat penting. Harap lengkapi data dengan benar dan pilih salah satu opsi yang sesuai.') }}
                        </p>

                        @if (session('error'))
                            <div class="bg-red-500 text-white p-4 rounded mb-6">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('users.store') }}" method="POST" class="space-y-8">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                            <!-- Input Nama -->
                            <div>
                                <label for="name" class="block text-lg font-medium mb-2">
                                    {{ __('Nama') }}
                                </label>
                                <input type="text" name="name" id="name" required
                                    class="w-full p-4 border rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-400 text-gray-800"
                                    placeholder="Masukkan nama Anda">
                            </div>

                            <!-- Input NPM -->
                            <div>
                                <label for="npm" class="block text-lg font-medium mb-2">
                                    {{ __('NPM') }}
                                </label>
                                <input type="text" name="npm" id="npm" required
                                    class="w-full p-4 border rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-400 text-gray-800"
                                    placeholder="Masukkan NPM Anda">
                            </div>

                            <!-- Pilihan Voting -->
                            <div>
                                <label class="block text-lg font-medium mb-4">
                                    {{ __('Pilih Candidate') }}
                                </label>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                    @for ($i = 1; $i <= 4; $i++)
                                        <div class="bg-gray-800 border rounded-lg p-6 shadow-sm hover:shadow-xl transition duration-300 ease-in-out transform hover:scale-105">
                                            <label for="candidate{{ $i }}" class="flex items-center cursor-pointer">
                                                <input type="radio" id="candidate{{ $i }}" name="candidate" value="Candidate {{ $i }}" required
                                                    class="h-5 w-5 text-blue-600 border-gray-300 focus:ring-blue-500">
                                                <span class="ml-4 text-white font-medium text-lg">
                                                    {{ __('Candidate ') . $i }}
                                                </span>
                                            </label>
                                        </div>
                                    @endfor
                                </div>
                            </div>

                            <!-- Tombol Submit -->
                            <div>
                                <button type="submit"
                                    class="w-full py-4 bg-blue-600 text-white text-lg font-semibold rounded-lg shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-300 transition duration-200">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
