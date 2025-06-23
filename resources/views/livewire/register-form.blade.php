<div>
    <x-layouts.app>
        <div class="min-h-screen flex flex-col md:flex-row">

            <!-- Left Column -->
            <div class="hidden md:flex md:w-6/12 lg:w-6/12 relative text-white bg-center bg-cover bg-no-repeat"
                wire:ignore style="background-image: url('{{ asset('bg.webp') }}');">
                <div class="absolute inset-0 bg-black opacity-60"></div>

                <!-- Content -->
                <div class="relative z-10 flex flex-col justify-between h-full w-full p-12">
                    <!-- Main Text Container -->
                    <div class="space-y-4 max-w-xl">
                        <h1 class="text-4xl lg:text-5xl font-bold">
                            Selamat Datang di <span class="text-red-500">PERSMADAR</span>
                        </h1>
                        <p class="text-xs md:text-lg text-white/80 leading-relaxed mt-8">
                            Wadah bagi mahasiswa Dawan R di Malang untuk bersatu dan berkembang. Kami berkomitmen untuk
                            mencetak kader pemimpin masa depan yang berintelektual, berbudaya, dan berintegritas untuk
                            membangun tanah leluhur.
                        </p>
                        <!-- Organization Motto -->
                        <p class="pt-4 text-xl font-semibold italic text-white/70">
                            "Toktabu arok, rais mese, tek fi hiat paha"
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right Column - Registration Form -->
            <div class="w-full md:w-6/12 lg:w-6/12 flex justify-center md:px-8 md:py-4 h-[700px]">
                <div class="w-full max-w-2xl mx-auto">

                    <div>

                        <!-- Success Message -->
                        @if (session('sukses'))
                            <div role="alert" class="alert alert-success mb-4" x-show="true" x-transition>
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ session('sukses') }}</span>
                            </div>
                        @endif

                        <!-- Form Container -->
                        <div class="bg-transparent rounded-xl overflow-hidden">

                            <form wire:submit="submitForm" class="p-6">

                                {{-- Step 1 --}}
                                @if ($currentStep === 1)
                                    <div class="mb-4">
                                        <h3 class="text-xl font-bold text-gray-800">Langkah 1: Data Diri</h3>
                                        <p class="text-sm text-gray-600">Masukkan data pribadi Anda dengan lengkap dan
                                            benar</p>
                                    </div>
                                @endif

                                {{-- Step 2 --}}
                                @if ($currentStep === 2)
                                    <div class="mb-4">
                                        <h3 class="text-xl font-bold text-gray-800">Langkah 2: Unggah Dokumen</h3>
                                        <p class="text-sm text-gray-600">Unggah dokumen yang diminta dengan jelas</p>
                                    </div>
                                @endif

                                {{-- Step 3 --}}
                                @if ($currentStep === 3)
                                    <div class="mb-4">
                                        <h3 class="text-xl font-bold text-gray-800">Langkah 3: Konfirmasi Data</h3>
                                        <p class="text-sm text-gray-600">Periksa kembali data yang telah Anda isi</p>
                                    </div>
                                @endif

                                <!-- Step 1: Personal Data -->
                                <div class="@if ($currentStep !== 1) hidden @endif transition-all">

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                                        <label class="form-control w-full">
                                            <div class="label"><span class="label-text font-medium">Nama Lengkap</span>
                                            </div>
                                            <input wire:model="nama_lengkap" type="text"
                                                class="input input-bordered w-full focus:input-primary transition-colors"
                                                placeholder="Masukkan nama lengkap Anda" />
                                            @error('nama_lengkap')
                                                <span class="text-error text-xs mt-1">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <label class="form-control w-full">
                                            <div class="label"><span class="label-text font-medium">Email</span></div>
                                            <input wire:model.blur="email" type="email"
                                                class="input input-bordered w-full focus:input-primary transition-colors"
                                                placeholder="nama@email.com" />
                                            @error('email')
                                                <span class="text-error text-xs mt-1">{{ $message }}</span>
                                            @enderror
                                        </label>

                                        <label class="form-control w-full">
                                            <div class="label"><span class="label-text font-medium">Nomor
                                                    Telepon</span></div>
                                            <input wire:model.blur="telepon" type="tel"
                                                class="input input-bordered w-full focus:input-primary transition-colors"
                                                placeholder="08xxxxxxxxxx" />
                                            @error('telepon')
                                                <span class="text-error text-xs mt-1">{{ $message }}</span>
                                            @enderror
                                        </label>

                                        <label class="form-control w-full">
                                            <div class="label"><span class="label-text font-medium">Tanggal
                                                    Lahir</span></div>
                                            <input wire:model.blur="tanggal_lahir" type="date"
                                                class="input input-bordered w-full focus:input-primary transition-colors" />
                                            @error('tanggal_lahir')
                                                <span class="text-error text-xs mt-1">{{ $message }}</span>
                                            @enderror
                                        </label>

                                        <label class="form-control w-full">
                                            <div class="label"><span class="label-text font-medium">Jenis
                                                    Kelamin</span></div>
                                            <select wire:model.blur="jenis_kelamin"
                                                class="select select-bordered w-full focus:select-primary transition-colors">
                                                <option value="">Pilih jenis kelamin</option>
                                                <option value="male">Laki-laki</option>
                                                <option value="female">Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <span class="text-error text-xs mt-1">{{ $message }}</span>
                                            @enderror
                                        </label>

                                        <label class="form-control w-full">
                                            <div class="label"><span class="label-text font-medium">Asal
                                                    Kampus</span>
                                            </div>
                                            <input wire:model.blur="kampus" type="text"
                                                class="input input-bordered w-full focus:input-primary transition-colors"
                                                placeholder="Nama universitas/kampus" />
                                            @error('kampus')
                                                <span class="text-error text-xs mt-1">{{ $message }}</span>
                                            @enderror
                                        </label>

                                        <label class="form-control w-full md:col-span-2">
                                            <div class="label"><span class="label-text font-medium">Alamat Lengkap
                                                    (saat ini)</span></div>
                                            <input wire:model.blur="alamat"
                                                class="input input-bordered w-full focus:input-primary transition-colors"
                                                placeholder="Masukkan alamat lengkap tempat tinggal saat ini"></input>
                                            @error('alamat')
                                                <span class="text-error text-xs mt-1">{{ $message }}</span>
                                            @enderror
                                        </label>

                                        <label class="form-control w-full md:col-span-2">
                                            <div class="label"><span class="label-text font-medium">Asal Daerah
                                                    (Kabupaten/Kota di NTT)</span></div>
                                            <input wire:model.blur="asal_daerah" type="text"
                                                class="input input-bordered w-full focus:input-primary transition-colors"
                                                placeholder="Contoh: Kupang, Ende, Flores Timur" />
                                            @error('asal_daerah')
                                                <span class="text-error text-xs mt-1">{{ $message }}</span>
                                            @enderror
                                        </label>
                                    </div>
                                </div>

                                <!-- Step 2: Document Upload -->
                                <div class="@if ($currentStep !== 2) hidden @endif transition-all">

                                    {{-- <div class="mb-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Langkah 2: Unggah Dokumen</h3>
                        <p class="text-sm text-gray-600">Unggah dokumen persyaratan dalam format JPG, PNG, atau PDF (max 2MB)</p>
                    </div> --}}

                                    <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                                        <!-- Photo Upload -->
                                        <div class="form-control w-full">
                                            <div class="label"><span class="label-text font-medium">Foto Diri (Formal
                                                    3x4) (.jpg)</span></div>
                                            <input wire:model="photo" type="file"
                                                class="file-input file-input-bordered w-full focus:file-input-primary transition-colors"
                                                accept="image/*" />
                                            <div wire:loading wire:target="photo" class="text-xs mt-1 text-primary">
                                                <span class="loading loading-spinner loading-xs"></span> Mengunggah...
                                            </div>
                                            @if ($photo && !$errors->has('photo'))
                                                <div class="mt-3 p-3 bg-base-200 rounded-lg">
                                                    <img src="{{ $photo->temporaryUrl() }}"
                                                        class="w-24 h-32 object-cover rounded shadow-md mx-auto"
                                                        alt="Pratinjau Foto">
                                                </div>
                                            @endif
                                            @error('photo')
                                                <span class="text-error text-xs mt-1">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- KTM Upload -->
                                        <div class="form-control w-full">
                                            <div class="label"><span class="label-text font-medium">Scan Kartu Tanda
                                                    Mahasiswa (KTM) (.jpg)</span></div>
                                            <input wire:model="ktm" type="file"
                                                class="file-input file-input-bordered w-full focus:file-input-primary transition-colors"
                                                accept="image/*,.pdf" />
                                            <div wire:loading wire:target="ktm" class="text-xs mt-1 text-primary">
                                                <span class="loading loading-spinner loading-xs"></span> Mengunggah...
                                            </div>
                                            @if ($ktm && !$errors->has('ktm'))
                                                <div class="text-success text-xs mt-1 flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    File dipilih: {{ $ktm->getClientOriginalName() }}
                                                </div>
                                            @endif
                                            @error('ktm')
                                                <span class="text-error text-xs mt-1">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- KRS Upload -->
                                        <div class="form-control w-full">
                                            <div class="label"><span class="label-text font-medium">Scan Kartu
                                                    Rencana Studi (KRS)(.jpg)</span></div>
                                            <input wire:model="krs" type="file"
                                                class="file-input file-input-bordered w-full focus:file-input-primary transition-colors"
                                                accept="image/*,.pdf" />
                                            <div wire:loading wire:target="krs" class="text-xs mt-1 text-primary">
                                                <span class="loading loading-spinner loading-xs"></span> Mengunggah...
                                            </div>

                                            @if ($krs && !$errors->has('krs'))
                                                <div class="text-success text-xs mt-1 flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    File dipilih: {{ $krs->getClientOriginalName() }}
                                                </div>
                                            @endif
                                            @error('krs')
                                                <span class="text-error text-xs mt-1">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- KTP Upload -->
                                        <div class="form-control w-full">
                                            <div class="label"><span class="label-text font-medium">Scan Kartu Tanda
                                                    Penduduk (KTP) (.jpg)</span></div>
                                            <input wire:model="ktp" type="file"
                                                class="file-input file-input-bordered w-full focus:file-input-primary transition-colors"
                                                accept="image/*,.pdf" />
                                            <div wire:loading wire:target="ktp" class="text-xs mt-1 text-primary">
                                                <span class="loading loading-spinner loading-xs"></span> Mengunggah...
                                            </div>

                                            @if ($ktp && !$errors->has('ktp'))
                                                <div class="text-success text-xs mt-1 flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    File dipilih: {{ $ktp->getClientOriginalName() }}
                                                </div>
                                            @endif
                                            @error('ktp')
                                                <span class="text-error text-xs mt-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 3: Confirmation -->
                                <div class="@if ($currentStep !== 3) hidden @endif transition-all">

                                    <div class="space-y-6">
                                        <!-- Personal Data Summary -->
                                        <div
                                            class="bg-gradient-to-r from-blue-50 to-indigo-50 p-6 rounded-xl border border-blue-100">
                                            <h4 class="font-bold text-lg text-gray-800 mb-4 flex items-center">
                                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                    </path>
                                                </svg>
                                                Data Diri
                                            </h4>
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                                                <div class="space-y-2">
                                                    <div><strong class="text-gray-600">Nama:</strong>
                                                        <p class="text-gray-800">{{ $nama_lengkap ?: '-' }}</p>
                                                    </div>
                                                    <div><strong class="text-gray-600">Email:</strong>
                                                        <p class="text-gray-800">{{ $email ?: '-' }}</p>
                                                    </div>
                                                    <div><strong class="text-gray-600">Telepon:</strong>
                                                        <p class="text-gray-800">{{ $telepon ?: '-' }}</p>
                                                    </div>
                                                    <div><strong class="text-gray-600">Tanggal Lahir:</strong>
                                                        <p class="text-gray-800">{{ $tanggal_lahir ?: '-' }}</p>
                                                    </div>
                                                </div>
                                                <div class="space-y-2">
                                                    <div><strong class="text-gray-600">Jenis Kelamin:</strong>
                                                        <p class="text-gray-800">
                                                            {{ $jenis_kelamin == 'male' ? 'Laki-laki' : ($jenis_kelamin == 'female' ? 'Perempuan' : '-') }}
                                                        </p>
                                                    </div>
                                                    <div><strong class="text-gray-600">Kampus:</strong>
                                                        <p class="text-gray-800">{{ $kampus ?: '-' }}</p>
                                                    </div>
                                                    <div><strong class="text-gray-600">Alamat:</strong>
                                                        <p class="text-gray-800">{{ $alamat ?: '-' }}</p>
                                                    </div>
                                                    <div><strong class="text-gray-600">Asal Daerah:</strong>
                                                        <p class="text-gray-800">{{ $asal_daerah ?: '-' }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Documents Summary -->
                                        <div
                                            class="bg-gradient-to-r from-green-50 to-emerald-50 p-6 rounded-xl border border-green-100">
                                            <h4 class="font-bold text-lg text-gray-800 mb-4 flex items-center">
                                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                    </path>
                                                </svg>
                                                Dokumen Terunggah
                                            </h4>
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                                @if ($photo)
                                                    <div
                                                        class="flex items-center p-3 bg-white rounded-lg border border-green-200">
                                                        <svg class="w-5 h-5 mr-3 text-green-600" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="text-sm text-gray-700">Foto Diri</span>
                                                    </div>
                                                @endif
                                                @if ($ktm)
                                                    <div
                                                        class="flex items-center p-3 bg-white rounded-lg border border-green-200">
                                                        <svg class="w-5 h-5 mr-3 text-green-600" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="text-sm text-gray-700">KTM</span>
                                                    </div>
                                                @endif
                                                @if ($krs)
                                                    <div
                                                        class="flex items-center p-3 bg-white rounded-lg border border-green-200">
                                                        <svg class="w-5 h-5 mr-3 text-green-600" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="text-sm text-gray-700">KRS</span>
                                                    </div>
                                                @endif
                                                @if ($ktp)
                                                    <div
                                                        class="flex items-center p-3 bg-white rounded-lg border border-green-200">
                                                        <svg class="w-5 h-5 mr-3 text-green-600" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="text-sm text-gray-700">KTP</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <!-- Success Notification Page - Replace the form content after submission -->
                                    <div class="@if ($isSubmitted !== true) hidden @endif transition-all">
                                        <div class="text-center py-12">
                                            <!-- Success Icon -->
                                            <div
                                                class="mx-auto mb-6 w-20 h-20 bg-green-100 rounded-full flex items-center justify-center">
                                                <svg class="w-12 h-12 text-green-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>

                                            <!-- Success Title -->
                                            <h3 class="text-2xl font-bold text-gray-800 mb-4">Pendaftaran Berhasil!
                                            </h3>

                                            <!-- Success Message -->
                                            <div
                                                class="bg-gradient-to-r from-green-50 to-emerald-50 p-6 rounded-xl border border-green-100 mb-6">
                                                <p class="text-gray-700 leading-relaxed mb-4">
                                                    Terima kasih,
                                                    Data pendaftaran Anda telah berhasil dikirim dan sedang dalam proses
                                                    verifikasi.
                                                </p>
                                                <div class="space-y-2 text-sm text-gray-600">
                                                    <div class="flex items-center justify-center">
                                                        <svg class="w-4 h-4 mr-2 text-green-600" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        Tim kami akan menghubungi Anda dalam 1-3 hari
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Action Button -->
                                            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                                                <button type="button" class="btn btn-primary"
                                                    onclick="window.location.reload()">
                                                    Daftar Lagi
                                                </button>
                                                <button type="button" class="btn btn-ghost"
                                                    onclick="window.close()">
                                                    Tutup
                                                </button>
                                            </div>

                                            <!-- Contact Info -->
                                            <div class="mt-8 pt-6 border-t border-gray-200">
                                                <p class="text-sm text-gray-600 mb-2">Butuh bantuan?</p>
                                                <div class="flex flex-col sm:flex-row gap-4 justify-center text-sm">
                                                    <a href="tel:+628123456789"
                                                        class="text-blue-600 hover:text-blue-800 flex items-center justify-center">
                                                        <svg class="w-4 h-4 mr-1" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path
                                                                d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z">
                                                            </path>
                                                        </svg>
                                                        +62 812-3456-789
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Navigation Buttons -->
                                <div
                                    class="@if ($isSubmitted === true) hidden @endif transition-all
                                flex justify-between items-center mt-8 pt-6 border-t border-gray-200">
                                    @if ($currentStep > 1)
                                        <button type="button" wire:click="previousStep"
                                            class="btn btn-ghost"wire:loading.attr="disabled">
                                            <span wire:loading.remove wire:target="previousStep">Kembali</span>
                                            <span wire:loading wire:target="previousStep" class="flex items-center">
                                                <svg class="animate-spin h-4 w-4 text-white mr-2"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24">
                                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                                        stroke="currentColor" stroke-width="4"></circle>
                                                    <path class="opacity-75" fill="currentColor"
                                                        d="M4 12a8 8 0 018-8v8z"></path>
                                                </svg>

                                            </span>

                                        </button>
                                    @endif

                                    @if ($currentStep < 3)
                                        <button type="button" wire:click="nextStep"
                                            class="btn btn-primary min-w-[120px]" wire:target="nextStep"
                                            wire:loading.attr="disabled">
                                            <span wire:loading.remove wire:target="nextStep">Lanjutkan</span>

                                            <span class="flex flex-row" wire:loading wire:target="nextStep">
                                                Memproses...
                                            </span>
                                        @else
                                            <button type="submit" wire:click="submitForm"
                                                wire:loading.attr="disabled" wire:target="submitForm"
                                                class="btn btn-success">
                                                Kirim
                                            </button>
                                    @endif
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end container --}}
        </div>
    </x-layouts.app>
</div>
