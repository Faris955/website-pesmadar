<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Anggota;
use Livewire\Attributes\HasForms;
use Livewire\WithFileUploads;
use Filament\Notifications\Notification;


class RegisterForm extends Component
{
    // <-- 2. Gunakan Trait
    // use HasForms; // Removed: trait does not exist in Livewire
    use WithFileUploads; // Untuk mengupload file
    public int $currentStep = 1;
    // Properti untuk Langkah 1
    public $nama_lengkap = '', $email = '', $telepon = '', $tanggal_lahir = '', $jenis_kelamin = '', $kampus = '', $alamat = '', $asal_daerah = '';

    // Properti untuk Langkah 2 (file)
    public $photo, $ktm, $krs, $ktp;
    // 2. Validasi Data
    protected function rulesForStep($step)
    {
        if ($step === 1) {
            return [
                'nama_lengkap' => 'required|string|min:3',
                'email' => 'required|email|unique:anggotas,email', // Cek ke tabel anggotas
                'telepon' => 'required|numeric|min:10', // Pastikan telepon adalah angka dan minimal 10 digit
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required|in:male,female',
                'kampus' => 'required|string',
                'alamat' => 'required|string|min:10',
                'asal_daerah' => 'required|string',
            ];
        }
        if ($step === 2) {
            return [
                'photo' => 'required|image|max:2048', // 2MB Max
                'ktm' => 'required|image|max:2048',
                'krs' => 'required|image|max:2048',
                'ktp' => 'required|image|max:2048',
            ];
        }
        return [];
    }

    // PERBAIKAN 1: Beritahu 'validateOnly' aturan mana yang harus digunakan
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->rulesForStep($this->currentStep));
    }
    public function nextStep()
    {
        $this->validate($this->rulesForStep($this->currentStep));

        if ($this->currentStep < 3) {
            $this->currentStep++;
        }
    }

    // Kembali ke langkah sebelumnya
    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    // Metode ini dipanggil saat validasi gagal untuk memberikan feedback real-time

    // 3. Ganti nama metode menjadi 'submitIdentityForm' agar cocok dengan Blade
    public function submitForm()
    {
        // Jalankan validasi untuk semua data dari semua langkah
        $this->validate(array_merge($this->rulesForStep(1), $this->rulesForStep(2)));

        // Simpan file ke storage
        $photoPath = $this->photo->store('dokumen/foto', 'public');
        $ktmPath = $this->ktm->store('dokumen/ktm', 'public');
        $krsPath = $this->krs->store('dokumen/krs', 'public');
        $ktpPath = $this->ktp->store('dokumen/ktp', 'public');

        // Simpan semua data ke database
        Anggota::create([
            'nama_lengkap' => $this->nama_lengkap,
            'email' => $this->email,
            'telepon' => $this->telepon,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'kampus' => $this->kampus,
            'alamat' => $this->alamat,
            'asal_daerah' => $this->asal_daerah,
            'path_foto' => $photoPath,
            'path_ktm' => $ktmPath,
            'path_krs' => $krsPath,
            'path_ktp' => $ktpPath,
        ]);

        Notification::make()
            ->title('Pendaftaran berhasil!')
            ->body('Terima kasih telah mendaftar. Data Anda akan kami verifikasi.')
            ->success()
            ->send();

        return $this->redirect('/sukses'); // Arahkan ke halaman sukses
    }

    // 3. Simpan ke Database (Langsung panggil Model)
    public function save()
    {
        $validatedData = $this->validate();
        Anggota::create($validatedData);

        // 4. Beri pesan sukses
        session()->flash('sukses', 'Pendaftaran dengan Livewire berhasil!');

        // 5. Kosongkan kembali input setelah berhasil
        $this->reset('nama_lengkap');
    }

    // Mengubah metode menjadi untuk submit data identitas


    public function render()
    {
        return view('livewire.register-form');
    }
}
