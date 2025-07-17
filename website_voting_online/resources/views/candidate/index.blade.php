<x-app-layout title="Candidate">
<x-slot name="header">
        <h2 class="font-semibold text-2xl  leading-tight">
            {{ __('Candidate Details') }}
        </h2>
    </x-slot>

    <div class="text-indigo-100 min-h-screen" style="background: linear-gradient(to bottom, #0D1B2A, #1B263B, #2C3E50, #3A506B,  #0D1B2A); min-height: 100vh;">

    @if(Auth::check() && Auth::user()->role === 'admin')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 shadow-md rounded-lg p-6">
                <!-- Header Section -->
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-2xl font-bold text-white">List Candidate</h3>
                        <p class="text-gray-300 leading-relaxed">
                            A list of all candidates with their Ketua and Wakil Ketua information.
                        </p>
                    </div>
                    <a href="{{ route('candidate.create') }}" class="inline-block px-4 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition">
                        Add Candidate
                    </a>
                </div>

                <!-- Candidate Table -->
                <div class="overflow-hidden border border-gray-600 rounded-lg">
                    <table class="min-w-full bg-gray-700">
                        <thead class="bg-gray-600">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">#</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Ketua</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Wakil Ketua</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Created</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Updated</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-600">
                            @foreach($candidates as $candidate)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-200">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-200">{{ $candidate->ketua }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-200">{{ $candidate->wakil_ketua }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-200">{{ $candidate->created_at }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-200">{{ $candidate->updated_at }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-200">
                                        <div class="flex items-center gap-4">
                                            <a href="/candidate/{{ $candidate->id }}" class="text-blue-400 hover:underline">View</a>
                                            <a href="/candidate/{{ $candidate->id }}/edit" class="text-green-400 hover:underline">Edit</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Candidate Details Section -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="rounded-lg p-6">
                @foreach($candidates as $candidate)
                    <div class="space-y-8 mb-12" id="candidate-{{ $loop->iteration }}">
                        <!-- Candidate Number -->
                        <div class="flex justify-center mb-6">
                            <div class="relative inline-block">
                                <span class="absolute inset-0 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-lg"></span>
                                <p class="relative text-lg font-semibold text-gray-100 bg-gray-800 px-6 py-3 rounded-lg tracking-wider">
                                    Calon Candidate No {{ $loop->iteration }}
                                </p>
                            </div>
                        </div>

                        <!-- Ketua Section -->
                        <div class="flex items-center justify-between gap-4 bg-gradient-to-r from-blue-600 to-blue-500 text-white py-4 px-6 rounded-lg">
                            <div class="flex items-center gap-4">
                                <img src="{{ asset('storage/' . $candidate->profile_image_ketua) }}" 
                                     alt="Foto Ketua" 
                                     class="w-16 h-16 rounded-full shadow-md border border-gray-300 transition-all duration-300">
                                <h3 class="text-xl font-bold">{{ $candidate->ketua }}</h3>
                            </div>
                            <button class="bg-blue-700 text-white px-4 py-2 rounded toggle-details" 
                                    data-target="ketua-{{ $loop->iteration }}">
                                Lihat Detail
                            </button>
                        </div>

                        <div class="details hidden" id="ketua-{{ $loop->iteration }}">
                            <div class="mt-8">
                                <h4 class="text-xl font-semibold text-gray-200">Latar Belakang Ketua</h4>
                                <p class="mt-4 text-gray-300">{{ $candidate->latar_belakang_ketua }}</p>
                            </div>
                            <div class="mt-8">
                                <h4 class="text-xl font-semibold text-gray-200">Visi Ketua</h4>
                                <ul class="mt-4 list-disc list-inside text-gray-300">
                                    @foreach(explode("\n", $candidate->visi_ketua) as $visi)
                                        <li>{{ $visi }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="mt-8">
                                <h4 class="text-xl font-semibold text-gray-200">Misi Ketua</h4>
                                <ul class="mt-4 list-disc list-inside text-gray-300">
                                    @foreach(explode("\n", $candidate->misi_ketua) as $misi)
                                        <li>{{ $misi }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Wakil Ketua Section -->
                        <div class="flex items-center justify-between gap-4 bg-gradient-to-r from-green-600 to-teal-500 text-white py-4 px-6 rounded-lg mt-8">
                            <div class="flex items-center gap-4">
                                <img src="{{ asset('storage/' . $candidate->profile_image_wakil_ketua) }}" 
                                     alt="Foto Wakil Ketua" 
                                     class="w-16 h-16 rounded-full shadow-md border border-gray-300 transition-all duration-300">
                                <h3 class="text-xl font-bold">{{ $candidate->wakil_ketua }}</h3>
                            </div>
                            <button class="bg-green-700 text-white px-4 py-2 rounded toggle-details" 
                                    data-target="wakil-{{ $loop->iteration }}">
                                Lihat Detail
                            </button>
                        </div>

                        <div class="details hidden" id="wakil-{{ $loop->iteration }}">
                            <div class="mt-8">
                                <h4 class="text-xl font-semibold text-gray-200">Latar Belakang Wakil Ketua</h4>
                                <p class="mt-4 text-gray-300">{{ $candidate->latar_belakang_wakil_ketua }}</p>
                            </div>
                            <div class="mt-8">
                                <h4 class="text-xl font-semibold text-gray-200">Visi Wakil Ketua</h4>
                                <ul class="mt-4 list-disc list-inside text-gray-300">
                                    @foreach(explode("\n", $candidate->visi_wakil_ketua) as $visi)
                                        <li>{{ $visi }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="mt-8">
                                <h4 class="text-xl font-semibold text-gray-200">Misi Wakil Ketua</h4>
                                <ul class="mt-4 list-disc list-inside text-gray-300">
                                    @foreach(explode("\n", $candidate->misi_wakil_ketua) as $misi)
                                        <li>{{ $misi }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-b from-gray-900 to-gray-800 text-white py-12 px-6">
    <h2 class="text-4xl font-extrabold text-center mb-12 ">
        Jadwal Tema Debat
    </h2>

    <!-- Card Container -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card 1 -->
        <div class="bg-gray-800 shadow-lg rounded-lg p-6 border border-gray-700">
            <div class="text-center mb-6">
                <h3 class="text-lg font-bold text-teal-400">12 Januari 2024</h3>
            </div>
            <ul class="space-y-4">
                <li class="flex items-center gap-4">
                    <div class="h-4 w-4 rounded-full bg-teal-500"></div>
                    <p class="text-sm">Keadilan Sosial</p>
                </li>
                <p class="text-xs text-gray-400">Membahas pentingnya kesetaraan dalam distribusi sumber daya dan hak.</p>
                <li class="flex items-center gap-4">
                    <div class="h-4 w-4 rounded-full bg-blue-500"></div>
                    <p class="text-sm">Digitalisasi Pemerintahan</p>
                </li>
                <p class="text-xs text-gray-400">Strategi mempercepat adopsi teknologi dalam birokrasi.</p>
                <li class="flex items-center gap-4">
                    <div class="h-4 w-4 rounded-full bg-green-500"></div>
                    <p class="text-sm">Energi Terbarukan</p>
                </li>
                <p class="text-xs text-gray-400">Mengupayakan sumber energi yang ramah lingkungan.</p>
                <li class="flex items-center gap-4">
                    <div class="h-4 w-4 rounded-full bg-yellow-500"></div>
                    <p class="text-sm">Inklusi Keuangan</p>
                </li>
                <p class="text-xs text-gray-400">Peningkatan akses layanan keuangan untuk semua lapisan masyarakat.</p>
                <li class="flex items-center gap-4">
                    <div class="h-4 w-4 rounded-full bg-purple-500"></div>
                    <p class="text-sm">Pendidikan Inklusif</p>
                </li>
                <p class="text-xs text-gray-400">Mengembangkan sistem pendidikan yang merangkul semua individu.</p>
            </ul>
        </div>

        <!-- Card 2 -->
        <div class="bg-gray-800 shadow-lg rounded-lg p-6 border border-gray-700">
            <div class="text-center mb-6">
                <h3 class="text-lg font-bold text-teal-400">22 Januari 2024</h3>
            </div>
            <ul class="space-y-4">
                <li class="flex items-center gap-4">
                    <div class="h-4 w-4 rounded-full bg-teal-500"></div>
                    <p class="text-sm">Kesejahteraan Anak</p>
                </li>
                <p class="text-xs text-gray-400">Fokus pada perlindungan dan hak anak-anak di segala aspek.</p>
                <li class="flex items-center gap-4">
                    <div class="h-4 w-4 rounded-full bg-blue-500"></div>
                    <p class="text-sm">Keamanan Siber</p>
                </li>
                <p class="text-xs text-gray-400">Meningkatkan keamanan data dan sistem teknologi informasi.</p>
                <li class="flex items-center gap-4">
                    <div class="h-4 w-4 rounded-full bg-green-500"></div>
                    <p class="text-sm">Ketahanan Pangan</p>
                </li>
                <p class="text-xs text-gray-400">Strategi untuk memastikan ketersediaan pangan yang cukup dan aman.</p>
                <li class="flex items-center gap-4">
                    <div class="h-4 w-4 rounded-full bg-yellow-500"></div>
                    <p class="text-sm">Reformasi Birokrasi</p>
                </li>
                <p class="text-xs text-gray-400">Langkah untuk mempercepat pelayanan publik yang lebih efisien.</p>
                <li class="flex items-center gap-4">
                    <div class="h-4 w-4 rounded-full bg-purple-500"></div>
                    <p class="text-sm">Transportasi Publik</p>
                </li>
                <p class="text-xs text-gray-400">Peningkatan aksesibilitas dan efisiensi transportasi umum.</p>
            </ul>
        </div>

        <!-- Card 3 -->
        <div class="bg-gray-800 shadow-lg rounded-lg p-6 border border-gray-700">
            <div class="text-center mb-6">
                <h3 class="text-lg font-bold text-teal-400">5 Februari 2024</h3>
            </div>
            <ul class="space-y-4">
                <li class="flex items-center gap-4">
                    <div class="h-4 w-4 rounded-full bg-teal-500"></div>
                    <p class="text-sm">Pengembangan UMKM</p>
                </li>
                <p class="text-xs text-gray-400">Dukungan untuk pertumbuhan usaha kecil dan menengah.</p>
                <li class="flex items-center gap-4">
                    <div class="h-4 w-4 rounded-full bg-blue-500"></div>
                    <p class="text-sm">Perubahan Iklim</p>
                </li>
                <p class="text-xs text-gray-400">Strategi mitigasi dan adaptasi terhadap perubahan iklim global.</p>
                <li class="flex items-center gap-4">
                    <div class="h-4 w-4 rounded-full bg-green-500"></div>
                    <p class="text-sm">Teknologi dan AI</p>
                </li>
                <p class="text-xs text-gray-400">Menerapkan kecerdasan buatan untuk berbagai sektor pembangunan.</p>
                <li class="flex items-center gap-4">
                    <div class="h-4 w-4 rounded-full bg-yellow-500"></div>
                    <p class="text-sm">Reformasi Pajak</p>
                </li>
                <p class="text-xs text-gray-400">Kebijakan perpajakan untuk mendukung pertumbuhan ekonomi.</p>
                <li class="flex items-center gap-4">
                    <div class="h-4 w-4 rounded-full bg-purple-500"></div>
                    <p class="text-sm">Pengelolaan Pariwisata</p>
                </li>
                <p class="text-xs text-gray-400">Pendekatan berkelanjutan dalam mengelola sektor pariwisata.</p>
            </ul>
        </div>

        <!-- Card 4 -->
        <div class="bg-gray-800 shadow-lg rounded-lg p-6 border border-gray-700">
            <div class="text-center mb-6">
                <h3 class="text-lg font-bold text-teal-400">19 Februari 2024</h3>
            </div>
            <ul class="space-y-4">
                <li class="flex items-center gap-4">
                    <div class="h-4 w-4 rounded-full bg-teal-500"></div>
                    <p class="text-sm">Kebijakan Kesehatan</p>
                </li>
                <p class="text-xs text-gray-400">Memperkuat layanan kesehatan masyarakat di semua tingkatan.</p>
                <li class="flex items-center gap-4">
                    <div class="h-4 w-4 rounded-full bg-blue-500"></div>
                    <p class="text-sm">Perlindungan Perempuan</p>
                </li>
                <p class="text-xs text-gray-400">Meningkatkan hak dan keamanan perempuan di berbagai sektor.</p>
                <li class="flex items-center gap-4">
                    <div class="h-4 w-4 rounded-full bg-green-500"></div>
                    <p class="text-sm">Pembangunan Infrastruktur</p>
                </li>
                <p class="text-xs text-gray-400">Mengatasi kesenjangan infrastruktur antar wilayah.</p>
                <li class="flex items-center gap-4">
                    <div class="h-4 w-4 rounded-full bg-yellow-500"></div>
                    <p class="text-sm">Ekonomi Digital</p>
                </li>
                <p class="text-xs text-gray-400">Mendorong transformasi digital dalam sektor ekonomi.</p>
                <li class="flex items-center gap-4">
                    <div class="h-4 w-4 rounded-full bg-purple-500"></div>
                    <p class="text-sm">Kesenjangan Wilayah</p>
                </li>
                <p class="text-xs text-gray-400">Mengurangi ketimpangan pembangunan antar daerah.</p>
            </ul>
        </div>

        <!-- Card 5 -->
        <div class="bg-gray-800 shadow-lg rounded-lg p-6 border border-gray-700">
            <div class="text-center mb-6">
                <h3 class="text-lg font-bold text-teal-400">4 Maret 2024</h3>
            </div>
            <ul class="space-y-4">
                <li class="flex items-center gap-4">
                    <div class="h-4 w-4 rounded-full bg-teal-500"></div>
                    <p class="text-sm">Kebijakan Agraria</p>
                </li>
                <p class="text-xs text-gray-400">Pendekatan baru dalam pengelolaan sumber daya agraria.</p>
                <li class="flex items-center gap-4">
                    <div class="h-4 w-4 rounded-full bg-blue-500"></div>
                    <p class="text-sm">Startup dan Inovasi</p>
                </li>
                <p class="text-xs text-gray-400">Mendukung ekosistem startup untuk mendorong inovasi.</p>
                <li class="flex items-center gap-4">
                    <div class="h-4 w-4 rounded-full bg-green-500"></div>
                    <p class="text-sm">Krisis Air Bersih</p>
                </li>
                <p class="text-xs text-gray-400">Mengatasi tantangan penyediaan air bersih secara global.</p>
                <li class="flex items-center gap-4">
                    <div class="h-4 w-4 rounded-full bg-yellow-500"></div>
                    <p class="text-sm">Kerja Sama ASEAN</p>
                </li>
                <p class="text-xs text-gray-400">Memperkuat kolaborasi regional untuk stabilitas dan pertumbuhan.</p>
                <li class="flex items-center gap-4">
                    <div class="h-4 w-4 rounded-full bg-purple-500"></div>
                    <p class="text-sm">Ketahanan Nasional</p>
                </li>
                <p class="text-xs text-gray-400">Strategi untuk meningkatkan pertahanan dan keamanan negara.</p>
            </ul>
        </div>

        <!-- Card 6 -->
<div class="bg-gray-800 shadow-lg rounded-lg p-6 border border-gray-700">
    <div class="text-center mb-6">
        <h3 class="text-lg font-bold text-teal-400">14 Februari 2024</h3>
    </div>
    <ul class="space-y-4">
        <li class="flex items-center gap-4">
            <div class="h-4 w-4 rounded-full bg-teal-500"></div>
            <p class="text-sm">Transformasi Digital</p>
        </li>
        <p class="text-xs text-gray-400">Mengakselerasi digitalisasi di sektor publik dan swasta.</p>
        <li class="flex items-center gap-4">
            <div class="h-4 w-4 rounded-full bg-blue-500"></div>
            <p class="text-sm">Energi Terbarukan</p>
        </li>
        <p class="text-xs text-gray-400">Memperluas penggunaan sumber energi yang ramah lingkungan.</p>
        <li class="flex items-center gap-4">
            <div class="h-4 w-4 rounded-full bg-green-500"></div>
            <p class="text-sm">Pendidikan Inklusif</p>
        </li>
        <p class="text-xs text-gray-400">Meningkatkan akses pendidikan untuk semua lapisan masyarakat.</p>
        <li class="flex items-center gap-4">
            <div class="h-4 w-4 rounded-full bg-yellow-500"></div>
            <p class="text-sm">Perdagangan Global</p>
        </li>
        <p class="text-xs text-gray-400">Mendorong ekspor untuk meningkatkan daya saing internasional.</p>
        <li class="flex items-center gap-4">
            <div class="h-4 w-4 rounded-full bg-purple-500"></div>
            <p class="text-sm">Keamanan Siber</p>
        </li>
        <p class="text-xs text-gray-400">Meningkatkan perlindungan data dan infrastruktur digital.</p>
    </ul>
</div>

    </div>
</div>



</div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleButtons = document.querySelectorAll('.toggle-details');

            toggleButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const targetId = button.getAttribute('data-target');
                    const details = document.getElementById(targetId);
                    const image = details.previousElementSibling.querySelector('img');

                    details.classList.toggle('hidden');

                    if (!details.classList.contains('hidden')) {
                        image.classList.remove('rounded-full', 'w-16', 'h-16');
                        image.classList.add('rounded-md', 'w-40', 'h-40');
                    } else {
                        image.classList.add('rounded-full', 'w-16', 'h-16');
                        image.classList.remove('rounded-md', 'w-40', 'h-40');
                    }
                });
            });
        });
    </script>
</x-app-layout>
