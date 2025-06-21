<div>
    <x-layouts.app>
        <div class="min-h-screen flex">
            <!-- Left Column -->
            <div class="hidden md:flex md:w-6/12 lg:w-6/12 relative text-white bg-center bg-cover bg-no-repeat"
                wire:ignore style="background-image: url('{{ asset('bg.webp') }}');">
                <div class="absolute inset-0 bg-black opacity-60"></div>

                <!-- Content -->
                <div class="relative z-10 flex flex-col justify-between h-full w-full p-12">
                    <!-- Main Text Container -->
                    <div class="space-y-4 max-w-xl">
                        <h1 class="text-4xl lg:text-5xl font-bold">
                            Selamat Datang di <span class="text-red-500">PESMADAR</span>
                        </h1>
                        <p class="text-lg text-white/80 leading-relaxed mt-8">
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

                    <div x-data="wizardForm()">
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
                                <template x-if="currentStep === 1">
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-800">Langkah 1: Data Diri</h3>
                                        <p class="text-sm text-gray-600">Masukkan data pribadi Anda dengan lengkap dan
                                            benar</p>
                                    </div>
                                </template>

                                <template x-if="currentStep === 2">
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-800">Langkah 2: Unggah Dokumen</h3>
                                        <p class="text-sm text-gray-600">Unggah dokumen yang diminta dengan jelas</p>
                                    </div>
                                </template>

                                <template x-if="currentStep === 3">
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-800">Langkah 3: Konfirmasi Data</h3>
                                        <p class="text-sm text-gray-600">Periksa kembali data yang telah Anda isi</p>
                                    </div>
                                </template>
                                <div class="mb-6 mt-2">
                                    <!-- Progress Bar -->
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-primary h-2 rounded-full transition-all duration-500 ease-out"
                                            :style="`width: ${(currentStep / 3) * 100}%`"></div>
                                    </div>
                                </div>
                                <!-- Step 1: Personal Data -->
                                <div x-show="currentStep === 1" x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 transform translate-x-4"
                                    x-transition:enter-end="opacity-100 transform translate-x-0"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 transform translate-x-0"
                                    x-transition:leave-end="opacity-0 transform -translate-x-4">

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                                        <label class="form-control w-full">
                                            <div class="label"><span class="label-text font-medium">Nama Lengkap</span>
                                            </div>
                                            <input wire:model.blur="nama_lengkap" type="text"
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
                                            <div class="label"><span class="label-text font-medium">Asal Kampus</span>
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
                                <div x-show="currentStep === 2" x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 transform translate-x-4"
                                    x-transition:enter-end="opacity-100 transform translate-x-0"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 transform translate-x-0"
                                    x-transition:leave-end="opacity-0 transform -translate-x-4">

                                    {{-- <div class="mb-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Langkah 2: Unggah Dokumen</h3>
                        <p class="text-sm text-gray-600">Unggah dokumen persyaratan dalam format JPG, PNG, atau PDF (max 2MB)</p>
                    </div> --}}

                                    <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                                        <!-- Photo Upload -->
                                        <div class="form-control w-full">
                                            <div class="label"><span class="label-text font-medium">Foto Diri (Formal
                                                    3x4)</span></div>
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
                                                    Mahasiswa (KTM)</span></div>
                                            <input wire:model="ktm" type="file"
                                                class="file-input file-input-bordered w-full focus:file-input-primary transition-colors"
                                                accept="image/*,.pdf" />
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
                                                    Rencana Studi (KRS)</span></div>
                                            <input wire:model="krs" type="file"
                                                class="file-input file-input-bordered w-full focus:file-input-primary transition-colors"
                                                accept="image/*,.pdf" />
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
                                                    Penduduk (KTP)</span></div>
                                            <input wire:model="ktp" type="file"
                                                class="file-input file-input-bordered w-full focus:file-input-primary transition-colors"
                                                accept="image/*,.pdf" />
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
                                <div x-show="currentStep === 3" x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 transform translate-x-4"
                                    x-transition:enter-end="opacity-100 transform translate-x-0"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 transform translate-x-0"
                                    x-transition:leave-end="opacity-0 transform -translate-x-4">

                                    {{-- <div class="mb-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Langkah 3: Konfirmasi Data</h3>
                        <p class="text-sm text-gray-600">Periksa kembali semua data sebelum mengirim. Pastikan semua informasi sudah benar.</p>
                    </div> --}}

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

                                <!-- Navigation Buttons -->
                                <div class="flex justify-between items-center mt-8 pt-6 border-t border-gray-200">
                                    <button type="button" @click="previousStep()" x-show="currentStep > 1"
                                        x-transition class="btn btn-ghost btn-lg">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                        Kembali
                                    </button>

                                    <div class="flex space-x-3">
                                        <button type="button" @click="nextStep()" x-show="currentStep < 3"
                                            x-transition class="btn btn-primary btn-lg">
                                            Lanjutkan
                                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </button>

                                        <button type="submit" x-show="currentStep === 3" x-transition
                                            class="btn btn-success btn-lg">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                            </svg>
                                            Kirim Pendaftaran
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end container --}}
        </div>
    </x-layouts.app>

    <script>
        function wizardForm() {
            return {
                currentStep: 1,

                nextStep() {
                    if (this.currentStep < 3) {
                        this.currentStep++;
                    }
                },

                previousStep() {
                    if (this.currentStep > 1) {
                        this.currentStep--;
                    }
                }
            }
        }
    </script>
</div>
