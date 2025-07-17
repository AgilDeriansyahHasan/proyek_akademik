<x-app-layout title="{{ $page_meta['title'] }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl  leading-tight">
        {{ $page_meta['header'] }}
        </h2>
    </x-slot>

    <div class="text-indigo-100 min-h-screen" style="background: linear-gradient(to bottom, #0D1B2A, #1B263B, #2C3E50, #3A506B,  #0D1B2A); min-height: 100vh;">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class=" rounded-lg p-6 ">
                    <form action="{{ $page_meta['url'] }}" method="post" enctype="multipart/form-data">
                        @method($page_meta['method'])
                        @csrf    

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Form Ketua -->
                            <div class="space-y-4 border border-gray-300 p-4 rounded-lg  ">
                                <h3 class="text-lg font-bold mb-4">Data Ketua</h3>
                                <div class="space-y-4">
                                    <div>
                                        <label for="ketua" class="block font-semibold">Nama Ketua</label>
                                        <input value="{{ old('ketua', $candidate->ketua ?? '') }}" 
                                               class="border border-gray-300 px-4 py-2 rounded-lg w-full focus:border-indigo-500 focus:ring-indigo-500 text-black" 
                                               type="text" name="ketua" id="ketua" placeholder="Masukkan nama ketua" required>
                                        @error('ketua')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="calon_ketua" class="block font-semibold">Calon Ketua</label>
                                        <input value="{{ old('calon_ketua', $candidate->calon_ketua ?? '') }}" 
                                               class="border border-gray-300 px-4 py-2 rounded-lg w-full focus:border-indigo-500 focus:ring-indigo-500 text-black" 
                                               type="text" name="calon_ketua" id="calon_ketua" placeholder="Masukkan calon ketua">
                                        @error('calon_ketua')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="latar_belakang_ketua" class="block font-semibold">Latar Belakang Ketua</label>
                                        <textarea name="latar_belakang_ketua" id="latar_belakang_ketua" rows="4" 
                                                  class="border border-gray-300 px-4 py-2 rounded-lg w-full focus:border-indigo-500 focus:ring-indigo-500 text-black" 
                                                  placeholder="Masukkan latar belakang ketua">{{ old('latar_belakang_ketua', $candidate->latar_belakang_ketua ?? '') }}</textarea>
                                        @error('latar_belakang_ketua')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="visi_ketua" class="block font-semibold">Visi Ketua</label>
                                        <textarea name="visi_ketua" id="visi_ketua" rows="4" 
                                                  class="border border-gray-300 px-4 py-2 rounded-lg w-full focus:border-indigo-500 focus:ring-indigo-500 text-black" 
                                                  placeholder="Masukkan visi ketua">{{ old('visi_ketua', $candidate->visi_ketua ?? '') }}</textarea>
                                        @error('visi_ketua')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="misi_ketua" class="block font-semibold">Misi Ketua</label>
                                        <textarea name="misi_ketua" id="misi_ketua" rows="4" 
                                                  class="border border-gray-300 px-4 py-2 rounded-lg w-full focus:border-indigo-500 focus:ring-indigo-500 text-black" 
                                                  placeholder="Masukkan misi ketua">{{ old('misi_ketua', $candidate->misi_ketua ?? '') }}</textarea>
                                        @error('misi_ketua')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="profile_image_ketua" class="block font-semibold">Foto Ketua</label>
                                        <input type="file" name="profile_image_ketua" id="profile_image_ketua" 
                                               class="border border-gray-300 px-4 py-2 rounded-lg w-full">
                                        @error('profile_image_ketua')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Form Wakil Ketua -->
                            <div class="space-y-4 border border-gray-300 p-4 rounded-lg ">
                                <h3 class="text-lg font-bold mb-4">Data Wakil Ketua</h3>
                                <div class="space-y-4">
                                    <div>
                                        <label for="wakil_ketua" class="block font-semibold">Nama Wakil Ketua</label>
                                        <input value="{{ old('wakil_ketua', $candidate->wakil_ketua ?? '') }}" 
                                               class="border border-gray-300 px-4 py-2 rounded-lg w-full focus:border-indigo-500 focus:ring-indigo-500 text-black" 
                                               type="text" name="wakil_ketua" id="wakil_ketua" placeholder="Masukkan nama wakil ketua" required>
                                        @error('wakil_ketua')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="calon_wakil_ketua" class="block font-semibold">Calon Wakil Ketua</label>
                                        <input value="{{ old('calon_wakil_ketua', $candidate->calon_wakil_ketua ?? '') }}" 
                                               class="border border-gray-300 px-4 py-2 rounded-lg w-full focus:border-indigo-500 focus:ring-indigo-500 text-black" 
                                               type="text" name="calon_wakil_ketua" id="calon_wakil_ketua" placeholder="Masukkan calon wakil ketua">
                                        @error('calon_wakil_ketua')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="latar_belakang_wakil_ketua" class="block font-semibold">Latar Belakang Wakil Ketua</label>
                                        <textarea name="latar_belakang_wakil_ketua" id="latar_belakang_wakil_ketua" rows="4" 
                                                  class="border border-gray-300 px-4 py-2 rounded-lg w-full focus:border-indigo-500 focus:ring-indigo-500 text-black" 
                                                  placeholder="Masukkan latar belakang wakil ketua">{{ old('latar_belakang_wakil_ketua', $candidate->latar_belakang_wakil_ketua ?? '') }}</textarea>
                                        @error('latar_belakang_wakil_ketua')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="visi_wakil_ketua" class="block font-semibold">Visi Wakil Ketua</label>
                                        <textarea name="visi_wakil_ketua" id="visi_wakil_ketua" rows="4" 
                                                  class="border border-gray-300 px-4 py-2 rounded-lg w-full focus:border-indigo-500 focus:ring-indigo-500 text-black" 
                                                  placeholder="Masukkan visi wakil ketua">{{ old('visi_wakil_ketua', $candidate->visi_wakil_ketua ?? '') }}</textarea>
                                        @error('visi_wakil_ketua')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="misi_wakil_ketua" class="block font-semibold">Misi Wakil Ketua</label>
                                        <textarea name="misi_wakil_ketua" id="misi_wakil_ketua" rows="4" 
                                                  class="border border-gray-300 px-4 py-2 rounded-lg w-full focus:border-indigo-500 focus:ring-indigo-500 text-black" 
                                                  placeholder="Masukkan misi wakil ketua">{{ old('misi_wakil_ketua', $candidate->misi_wakil_ketua ?? '') }}</textarea>
                                        @error('misi_wakil_ketua')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="profile_image_wakil_ketua" class="block font-semibold">Foto Wakil Ketua</label>
                                        <input type="file" name="profile_image_wakil_ketua" id="profile_image_wakil_ketua" 
                                               class="border border-gray-300 px-4 py-2 rounded-lg w-full">
                                        @error('profile_image_wakil_ketua')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end mt-6">
                            <button type="submit" class="px-6 py-2 bg-indigo-600  font-semibold rounded hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                {{ $page_meta['submit_text'] }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
