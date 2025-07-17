<x-app-layout title="Dashboard">
    <x-slot name="header">
        <h2 class="font-semibold text-xl  leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div class="text-indigo-300 min-h-screen" style="background: radial-gradient(circle, #0D1B2A, #1B263B, #2C3E50, #3A506B, #5C6F82); min-height: 100vh; display: flex; justify-content: center; align-items: center;">
    <div class="max-w-4xl w-full p-6 shadow-lg rounded-lg text-center bg-gray-800">
        <h1 class="text-3xl font-extrabold mb-6">
            @if(Auth::check())
            Selamat Datang {{ strtoupper(Auth::user()->name) }} di Platform Voting Online
            @else
                Selamat Datang di Platform Voting Online!
            @endif
        </h1>

        @if(!Auth::check())
            <p class="text-lg  mb-4">
                Anda belum login. Silakan login terlebih dahulu untuk dapat mengakses fitur-fitur voting yang tersedia di platform ini.
            </p>
            <div class="space-x-4">
                <a href="{{ route('login') }}" class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200">
                    Login
                </a>
                <a href="{{ route('register') }}" class="inline-block px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition duration-200">
                    Daftar Sekarang
                </a>
            </div>
        @else
            <p class="text-lg  mt-4">
                Anda dapat mulai berpartisipasi dalam voting yang tersedia di platform ini.
            </p>
        @endif
    </div>
</div>


    <div class="text-indigo-100 min-h-screen" style="background: linear-gradient(to bottom, #0D1B2A, #1B263B, #2C3E50, #3A506B,  #0D1B2A); min-height: 100vh;">

    <!-- Tujuan Page -->
    <div class="py-12 " >
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" rounded-lg p-8 flex flex-col lg:flex-row items-center gap-16">
            <!-- Tujuan Voting -->
            <div class="w-full lg:w-2/3 flex items-center text-center lg:text-left">
                <div>
                    <h3 class="text-3xl text-center font-extrabold text-white-800 mb-6">Tujuan Voting Ini</h3>
                    <p class="text-white-600 leading-relaxed text-lg text-center">
                        Voting ini bertujuan untuk memberikan kesempatan kepada semua pemilih untuk berpartisipasi aktif dalam menentukan pemimpin terbaik. 
                        Transparansi dan keadilan menjadi prioritas utama platform ini. 
                        Dengan demikian, setiap suara dihargai dan mencerminkan pilihan yang adil serta demokratis.
                    </p>
                </div>
            </div>
            <!-- Gambar -->
            <div class="w-full lg:w-1/3 flex justify-end">
                <img src="{{ asset('img/logo1.png') }}" alt="Logo" class="w-full h-auto rounded-lg shadow-md hover:scale-105 transition-transform duration-300">
            </div>
        </div>
    </div>
</div>

<!-- Card Page -->
 <div class="py-12 ">
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 max-w-2xl mx-auto mt-2">
    <!-- Voting Sekarang -->
    <a href="{{ route('voting') }}" class="flex flex-col items-center px-6 py-4  text-blue-400 rounded-lg hover:bg-gray-700 transition duration-300 ease-in-out transform hover:scale-105 border-l-4 border-blue-400">
        <div class="mb-2">
            <!-- Ikon untuk voting -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8" viewBox="0 0 24 24">
                <path d="M21 2H3c-.55 0-1 .45-1 1v18c0 .55.45 1 1 1h18c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zm-1 18H4V4h16v16zm-7-6h-2v-4h-2v4H9v2h6v-2z"/>
            </svg>
        </div>
        <span class="text-lg ">Voting</span>
    </a>
    <!-- Lihat Kandidat -->
    <a href="{{ route('candidate.index') }}" class="flex flex-col items-center px-6 py-4  text-yellow-400 rounded-lg hover:bg-gray-700 transition duration-300 ease-in-out transform hover:scale-105 border-l-4 border-yellow-400">
        <div class="mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8" viewBox="0 0 24 24">
                <path d="M12 12c3.31 0 6-2.69 6-6S15.31 0 12 0 6 2.69 6 6s2.69 6 6 6zm0 2c-4.41 0-8 3.59-8 8h16c0-4.41-3.59-8-8-8z" />
            </svg>
        </div>
        <span class="text-lg ">Detail Candidate</span>
    </a>
    <!-- Quick Count -->
    <a href="{{ route('result') }}" class="flex flex-col items-center px-6 py-4  text-red-400 rounded-lg  hover:bg-gray-700 transition duration-300 ease-in-out transform hover:scale-105 border-l-4 border-red-400">
        <div class="mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8" viewBox="0 0 24 24">
                <path d="M5 20h14v2H5zM6.39 8l-.28.72-2.8 7.03h17.38l-2.8-7.03L17.61 8H6.39z" />
            </svg>
        </div>
        <span class="text-lg ">Quick Count</span>
    </a>
</div>
</div>

<!-- Kandidat Ketua dan Wakil Ketua -->
<div class="py-12 ">
    <div class="max-w-7xl mx-auto sm:px-8 lg:px-8">
        <h3 class="text-center text-4xl font-bold mb-12">
            Candidate Calon Ketua & Wakil Ketua
        </h3>

        <!-- Container Kandidat dalam Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-8 px-8">
    @foreach($candidates as $candidate)
    <!-- Card Kandidat -->
    <div class="candidate-card  rounded-lg p-6 space-y-4 flex-shrink-0 transform transition-transform duration-500 hover:scale-105 cursor-pointer border border-gray-300 hover:border-yellow-400">
        <!-- Iterasi Nomor Urut -->
        <h5 class="text-lg font-semibold text-center ">
            Candidate {{ $loop->iteration }}
        </h5>
        <!-- Nama Ketua & Wakil Ketua -->
        <h4 class="text-2xl font-bold text-center">
            {{ explode(' ', $candidate->ketua)[0] }} & 
            {{ explode(' ', $candidate->wakil_ketua)[0] }}
        </h4>

        <div class="flex justify-center gap-8">
            <!-- Foto Ketua -->
            <div class="text-center">
                <img src="{{ asset('storage/' . $candidate->profile_image_ketua) }}" 
                    alt="Foto Ketua" 
                    class="w-36 h-48 object-cover rounded-lg border border-gray-200">
                <p class="mt-2 text-m font-semibold">{{ $candidate->ketua }}</p>
                <p class="text-m text-gray-500">Ketua</p>
            </div>
            <!-- Foto Wakil Ketua -->
            <div class="text-center">
                <img src="{{ asset('storage/' . $candidate->profile_image_wakil_ketua) }}" 
                    alt="Foto Wakil Ketua" 
                    class="w-36 h-48 object-cover rounded-lg border border-gray-200">
                <p class="mt-2 text-m font-semibold">{{ $candidate->wakil_ketua }}</p>
                <p class="text-m text-gray-500">Wakil Ketua</p>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Elemen Baru -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 ">
            <!-- Card Praktis -->
            <div class="rounded-lg shadow-xl  p-6 text-center flex flex-col items-center hover:scale-105 transition-transform duration-300 border-x-4 border-blue-500 hover:border hover:border-blue-700">
                <div class="mb-4 text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2a10 10 0 110 20 10 10 0 010-20z"></path>
                        <line x1="12" y1="6" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12" y2="16"></line>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Praktis</h3>
                <p>Proses yang mudah dan cepat untuk semua pengguna.</p>
            </div>

            <!-- Card Kelayakan -->
            <div class="rounded-lg shadow-xl p-6 text-center flex flex-col items-center hover:scale-105 transition-transform duration-300 border-x-4 border-green-500 hover:border hover:border-green-700">
                <div class="mb-4 text-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="9 11 12 14 16 10"></polyline>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Kelayakan</h3>
                <p>Hanya pemilih yang terdaftar yang dapat melakukan pemilihan.</p>
            </div>

            <!-- Card Time-Saving -->
            <div class="rounded-lg shadow-xl p-6 text-center flex flex-col items-center hover:scale-105 transition-transform duration-300 border-x-4 border-purple-500 hover:border hover:border-purple-700">
                <div class="mb-4 text-purple-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Time-Saving</h3>
                <p>Proses voting yang efisien dan hemat waktu.</p>
            </div>

            <!-- Card Unreusability -->
            <div class="rounded-lg shadow-xl p-6 text-center flex flex-col items-center hover:scale-105 transition-transform duration-300 border-x-4 border-red-500 hover:border hover:border-red-700">
                <div class="mb-4 text-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="6" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Unreusability</h3>
                <p>Setiap suara hanya dapat digunakan satu kali.</p>
            </div>

            <!-- Card Fleksibel -->
            <div class="rounded-lg shadow-xl p-6 text-center flex flex-col items-center hover:scale-105 transition-transform duration-300 border-x-4 border-yellow-500 hover:border hover:border-yellow-700">
                <div class="mb-4 text-yellow-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 8 12 12 15 15"></polyline>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Fleksibel</h3>
                <p>Bisa diakses kapan saja dan di mana saja.</p>
            </div>

            <!-- Card Aman -->
            <div class="rounded-lg shadow-xl p-6 text-center flex flex-col items-center hover:scale-105 transition-transform duration-300 border-x-4 border-indigo-500 hover:border hover:border-indigo-700">
                <div class="mb-4 text-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 16 12 12 8 8"></polyline>
                        <line x1="16" y1="16" x2="16.01" y2="16"></line>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Aman</h3>
                <p>Keamanan data dan transparansi terjamin.</p>
            </div>
        </div>
    </div>
</div>

    <!-- Hasil Perolehan Suara -->
    <div class="py-12 ">
        <div class="max-w-6xl mx-auto text-center">
            <h3 class="text-3xl font-extrabold  mb-4">
                {{ __('Hasil Perolehan Suara') }}
            </h3>
            <h4 class="text-xl font-semibold  mb-8">
                {{ __('Total Suara Keseluruhan: ***') }}
            </h4>

            <!-- Voting Results -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 mb-8 ">
        @foreach ($votings as $voting)
        <div class="rounded-lg p-6 shadow-xl transform transition duration-300 ease-in-out hover:scale-105  hover:bg-gray-700 border-l-4 border-blue-600 hover:border-blue-800">
        <h4 class="text-lg font-semibold  mb-2">
                <span class="text-indigo-600">{{ $voting->candidate }}</span>
            </h4>
            <p class="text-xl font-bold ">
                {{ __('Jumlah Suara: ***') }}
            </p>
            <div class="mt-4 h-2 bg-gray-300 rounded-full relative">
                <div 
                    class="bg-gradient-to-r from-indigo-500 to-indigo-700 h-2 rounded-full"
                    style="width: {{ ($voting->total / $totalVotes) * 100 }}%;"></div>
            </div>
        </div>
        @endforeach
    </div>
        </div>
    </div>

    <!-- Feedback Page -->
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="rounded-lg shadow-xl p-6  bg-opacity-10 backdrop-filter backdrop-blur-lg border border-white border-opacity-20">
                <h3 class="text-2xl font-semibold mb-6">Apa Kata Mereka?</h3>

                @if($feedbacks->isEmpty())
                    <p class="text-gray-400">Belum ada masukan.</p>
                @else
                    <div x-data="{ currentSlide: 0, interval: null }" 
                         x-init="interval = setInterval(() => currentSlide = (currentSlide + 1) % {{ count($feedbacks) }}, 5000)"
                         @mouseenter="clearInterval(interval)"
                         @mouseleave="interval = setInterval(() => currentSlide = (currentSlide + 1) % {{ count($feedbacks) }}, 5000)"
                         class="relative">
                        
                        <!-- Slides -->
                        <div class="overflow-hidden">
                            <div class="flex transition-transform duration-700" 
                                 :style="{ transform: `translateX(-${currentSlide * 100}%)` }">
                                @foreach($feedbacks as $feedback)
                                    <div class="w-full flex-shrink-0 px-8 py-6 text-center">
                                        <p class="text-lg italic mb-4 text-white">{{ $feedback->feedback }}</p>
                                        <p class="text-sm font-bold text-gray-300">{{ strtoupper($feedback->name) }}, Mahasiswa</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Indicators -->
                        <div class="flex justify-center space-x-2 mt-4">
                            @foreach($feedbacks as $index => $feedback)
                                <button @click="currentSlide = {{ $index }}"
                                        :class="{ 'bg-blue-500': currentSlide === {{ $index }}, 'bg-gray-500': currentSlide !== {{ $index }} }"
                                        class="w-3 h-3 rounded-full"></button>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="py-12">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 flex flex-wrap items-center bg-opacity-10 backdrop-filter backdrop-blur-lg rounded-lg shadow-lg p-6 border border-white border-opacity-20">
        <!-- Bagian Kiri -->
        <div class="w-full lg:w-1/2 lg:pr-8 mb-8 lg:mb-0 flex flex-col justify-center">
            <h3 class="text-3xl font-bold text-center mb-6">Terima Kasih atas Partisipasi Anda!</h3>
            <p class="text-lg leading-relaxed text-center">
                Kami sangat menghargai waktu dan perhatian yang Anda luangkan untuk memberikan suara Anda. 
                Masukan Anda sangat berarti bagi kami untuk terus berkembang dan memberikan pelayanan yang lebih baik di masa depan. 
                Terima kasih telah menjadi bagian penting dari perjalanan kami!
            </p>
        </div>
        <!-- Bagian Kanan -->
        <div class="w-full lg:w-1/2">
            <div class="rounded-lg p-8 bg-white bg-opacity-10 border border-white border-opacity-20 backdrop-filter backdrop-blur-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4 text-center">Formulir Masukan</h3>

                <!-- Pesan Sukses -->
                @if(session('success'))
                    <div class="p-4 mb-6 text-green-800 bg-green-100 border border-green-400 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Formulir -->
                <form action="{{ route('feedback') }}" method="POST" class="space-y-6">
                    @csrf
                    <!-- Input Nama -->
                    <input type="text" name="name"
                        class="text-black w-full border border-gray-300 rounded-lg p-4 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 
                        @error('name') border-red-500 focus:ring-red-500 @enderror" 
                        placeholder="Masukkan Nama Anda" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <!-- Input Feedback -->
                    <textarea name="feedback" rows="4" 
                        class="text-black w-full border border-gray-300 rounded-lg p-4 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 
                        @error('feedback') border-red-500 focus:ring-red-500 @enderror text-gray-600" 
                        placeholder="Tulis saran atau masukan Anda di sini...">{{ old('feedback') }}</textarea>
                    @error('feedback')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <!-- Tombol Kirim -->
                    <button type="submit" 
                        class="w-full px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold rounded-lg hover:from-blue-600 hover:to-blue-700 transition duration-300 ease-in-out">
                        Kirim Masukan
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
</div>

</x-app-layout>
