<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\KaryawanModel;
use App\Models\SuratkontrakModel; 
use App\Models\JabatanModel;
use App\Models\PengelolaanskModel;
use App\Models\KategoriModel;
use App\Models\ValidasiModel;
use App\Models\RoleModel;
use App\Models\CalonkaryawanModel;
use App\Models\ProsesseleksiModel;
use App\Models\HasilseleksiModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class Auth extends BaseController
{
    protected $userModel;
    protected $karyawanModel;
    protected $suratkontrakModel;
    protected $jabatanModel;
    protected $pengelolaanskModel;
    protected $kategoriModel;
    protected $validasiModel;
    protected $roleModel;
    protected $calonkaryawanModel;
    protected $prosesseleksiModel;
    protected $hasilseleksiModel;


    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->karyawanModel = new KaryawanModel();
        $this->suratkontrakModel = new SuratkontrakModel();
        $this->jabatanModel = new JabatanModel();
        $this->pengelolaanskModel = new PengelolaanskModel();
        $this->kategoriModel = new KategoriModel();
        $this->validasiModel = new ValidasiModel();
        $this->roleModel = new RoleModel();
        $this->calonkaryawanModel = new CalonkaryawanModel();
        $this->prosesseleksiModel = new ProsesseleksiModel();
        $this->hasilseleksiModel = new HasilseleksiModel();
    }

    public function login()
    {
        return view('login');
    }

public function processLogin()
{
    $session = session();
    $nama_user = $this->request->getPost('nama_user');
    $password  = $this->request->getPost('password');

    $user = $this->userModel->where('nama_user', $nama_user)->first();

    if ($user) {
        if ($password == $user['password']) {
            $sessionData = [
                'id_user'    => $user['id_user'],
                'nama_user'  => $user['nama_user'],
                'email'      => $user['email'],
                'logged_in'  => true
            ];
            switch ($user['id_role']) {
            case 1:
                return redirect()->to('/hrd');
            case 2:
                return redirect()->to('/karyawandirektur');
            default:
                return redirect()->to('/login')->with('error', 'Role tidak valid.');
        }
    } else {
        return redirect()->back()->withInput()->with('error', 'Username atau password salah.');
    }
}
}
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function hrd()
    {
        $data['karyawan'] = $this->karyawanModel->findAll();
        return view('hrd', $data);
    }

    //karyawan

    public function kelolakaryawan()
    {
        $data['karyawan'] = $this->karyawanModel->findAll();
        $calonkaryawan = $this->calonkaryawanModel->findAll();
        $hasilseleksi = $this->hasilseleksiModel->findAll();

        $hasilMap = [];
        foreach ($hasilseleksi as $v) {
            // Filter hanya yang "lolos"
            if ($v['keputusan'] === 'lolos') {
                $hasilMap[$v['id_calonkaryawan']] = $v['keputusan'];
            }
        }

        $filteredCalon = [];
        foreach ($calonkaryawan as $row) {
            if (isset($hasilMap[$row['id_calonkaryawan']])) {
                $row['keputusan'] = $hasilMap[$row['id_calonkaryawan']];
                $filteredCalon[] = $row;
            }
        }

        $data['calon_karyawan'] = $filteredCalon;

        return view('kelolakaryawan', $data);
    }

    public function tambahkaryawan()
    {
        return view('tambahkaryawan');
    }

    public function simpankaryawan()
    {
        $this->karyawanModel->insert([
            'id_karyawan' => $this->request->getPost('id_karyawan'),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telp' => $this->request->getPost('no_telp'),
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('/kelolakaryawan');
    }

    public function editkaryawan($id_karyawan)
    {
        $data['karyawan'] = $this->karyawanModel->find($id_karyawan);
        return view('editkaryawan', $data);
    }

    public function updatekaryawan($id_karyawan)
    {
        $this->karyawanModel->update($id_karyawan, [
            'id_karyawan' => $this->request->getPost('id_karyawan'),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telp' => $this->request->getPost('no_telp'),
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('/kelolakaryawan');
    }

    public function deletekaryawan($id_karyawan)
    {
        $this->karyawanModel->delete($id_karyawan);
        return redirect()->to('/kelolakaryawan');
    }

    public function kelolasuratkontrak()
    {
        $data['kontrakk'] = $this->suratkontrakModel->findAll();
        return view('kelolasuratkontrak', $data);
    }

    // Form tambah kontrak
    public function tambahsuratkontrak()
    {
        return view('tambahsuratkontrak');
    }

    // Simpan data kontrak baru
    public function simpansuratkontrak()
    {
        $this->suratkontrakModel->insert([
            'id_kontrak' => $this->request->getPost('id_kontrak'),
            'jenis_kontrak' => $this->request->getPost('jenis_kontrak'),
        ]);

        return redirect()->to('/kelolasuratkontrak');
    }

    // Form edit kontrak
    public function editsuratkontrak($id_kontrak)
    {
        $data['kontrakk'] = $this->suratkontrakModel->find($id_kontrak);
        return view('editsuratkontrak', $data);
    }

    // Update data kontrak
    public function updatesuratkontrak($id_kontrak)
    {
        $this->suratkontrakModel->update($id_kontrak, [
            'id_kontrak' => $this->request->getPost('id_kontrak'),
            'jenis_kontrak' => $this->request->getPost('jenis_kontrak'),
        ]);

        return redirect()->to('/kelolasuratkontrak');
    }

    // Delete kontrak
    public function deletesuratkontrak($id_kontrak)
    {
        $this->suratkontrakModel->delete($id_kontrak);
        return redirect()->to('/kelolasuratkontrak');
    }

    //cetak surat kontrak

    public function cetakSuratKontrak($id_sk)
    {
        $model = new PengelolaanskModel();
        $data['pengelolaansk'] = $model->find($id_sk);

        if (!$data['pengelolaansk']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

        $html = view('pdf/cetakpdf', $data);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Ganti 'Attachment' => true agar otomatis download
        $dompdf->stream('pengelolaansk'.$data['pengelolaansk']['id_sk'].'.pdf', ['Attachment' => false]);
    }

    public function tambahjabatan()
    {
       return view('tambahjabatan');
    }

    // Simpan data jabatan baru
    public function simpanjabatan()
    {
        $id_jabatan = $this->request->getPost('id_jabatan');
        $nama_jabatan = $this->request->getPost('nama_jabatan');

        $this->jabatanModel->insert([
            'id_jabatan' => $id_jabatan,
            'nama_jabatan' => $nama_jabatan,
        ]);

        return redirect()->to('/kelolajabatan');
    }

        public function kelolajabatan()
    {
        $data['jabatan'] = $this->jabatanModel->findAll();
        return view('kelolajabatan', $data);
    }

    // Form edit jabatan
    public function editjabatan($id_jabatan)
    {
        $data['jabatann'] = $this->jabatanModel->find($id_jabatan);
        return view('editjabatan', $data);
    }

    // Update data jabatan
    public function updatejabatan($id_jabatan)
    {
        $this->jabatanModel->update($id_jabatan, [
            'id_jabatan' => $this->request->getPost('id_jabatan'),
            'nama_jabatan' => $this->request->getPost('nama_jabatan'),
        ]);

        return redirect()->to('/kelolajabatan');
    }

    // Delete jabatan
    public function deletejabatan($id_jabatan)
    {
        $this->jabatanModel->delete($id_jabatan);
        return redirect()->to('/kelolajabatan');
    }

        public function kelolapengelolaansk()
        {
            $pengelolaansk = $this->pengelolaanskModel->findAll();
            $validasi = $this->validasiModel->findAll();
        
            $validasiMap = [];
            foreach ($validasi as $v) {
                $validasiMap[$v['id_sk']] = $v['status'];
            }
        
            foreach ($pengelolaansk as &$item) {
                $item['status'] = $validasiMap[$item['id_sk']] ?? 'pending';
            }
        
            $data['pengelolaansk'] = $pengelolaansk;
            return view('kelolapengelolaansk', $data);
        }
                
    // Form tambah pengelolaansk
    public function tambahpengelolaansk()
    {
        $data['jabatan'] = $this->jabatanModel->findAll();
        $data['k'] = $this->karyawanModel->findAll();
        $data['kategori'] = $this->kategoriModel->findAll();
        $data['kontrak'] = $this->suratkontrakModel->findAll();
        $data['direktur'] = $this->userModel->where('LOWER(nama_user)', 'direktur')->first();
        return view('tambahpengelolaansk', $data);
    }

    // Simpan data pengelolaansk baru
    public function simpanpengelolaansk()
    {
    $data = [
        'id_jabatan' => $this->request->getPost('id_jabatan'),
        'id_kategori' => $this->request->getPost('id_kategori'),
        'id_karyawan' => $this->request->getPost('id_karyawan'),
        'id_kontrak' => $this->request->getPost('id_kontrak'),
        'id_user' => $this->request->getPost('id_user'),
        'id_sk' => $this->request->getPost('id_sk'),
        'nama' => $this->request->getPost('nama'),
        'jenis_kontrak' => $this->request->getPost('jenis_kontrak'),
        'tanggal_kontrak_mulai' => $this->request->getPost('tanggal_kontrak_mulai'),
        'tanggal_berakhir_kontrak' => $this->request->getPost('tanggal_berakhir_kontrak'),
        'nama_jabatan' => $this->request->getPost('nama_jabatan'),
        'kategori_karyawan' => $this->request->getPost('kategori_karyawan'),
        'nama_user' => $this->request->getPost('nama_user'),
    ];

    $this->pengelolaanskModel->insert($data);
    return redirect()->to('/kelolapengelolaansk');
    }


    // Form edit pengelolaansk
    public function editpengelolaansk($id_sk)
    {
        $data['pengelolaansk'] = $this->pengelolaanskModel->find($id_sk);
        return view('editpengelolaansk', $data);
    }

    // Update data pengelolaansk
    public function updatepengelolaansk($id_sk)
    {
        $this->pengelolaanskModel->update($id_sk, [
            'id_jabatan' => $this->request->getPost('id_jabatan'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'id_karyawan' => $this->request->getPost('id_karyawan'),
            'id_user' => $this->request->getPost('id_user'),
            'id_kontrak' => $this->request->getPost('id_kontrak'),
            'id_sk' => $this->request->getPost('id_sk'),
            'nama' => $this->request->getPost('nama'),
            'jenis_kontrak' => $this->request->getPost('jenis_kontrak'),
            'tanggal_kontrak_mulai' => $this->request->getPost('tanggal_kontrak_mulai'),
            'tanggal_berakhir_kontrak' => $this->request->getPost('tanggal_berakhir_kontrak'),
            'nama_jabatan' => $this->request->getPost('nama_jabatan'),
            'kategori_karyawan' => $this->request->getPost('kategori_karyawan'),
            'nama_user' => $this->request->getPost('nama_user'),
        ]);

        return redirect()->to('/kelolapengelolaansk');
    }

    // Delete pengelolaansk
    public function deletepengelolaansk($id_sk)
    {
        $this->pengelolaanskModel->delete($id_sk);
        return redirect()->to('/kelolapengelolaansk');
    }

        //Tambah Kategori
    public function kelolakategori()
    {
        $data['kategori'] = $this->kategoriModel->findAll();
        return view('kelolakategori', $data);
    }

    // Form tambah Kategori
    public function tambahkategori()
    {
        return view('tambahkategori');
    }

    // Simpan data Kategori baru
    public function simpankategori()
    {
        $this->kategoriModel->insert([
            'id_kategori' => $this->request->getPost('id_kategori'),
            'kategori_karyawan' => $this->request->getPost('kategori_karyawan'),
        ]);

        return redirect()->to('/kelolakategori');
    }

    // Form edit Kategori
    public function editkategori($id_kategori)
    {
        $data['kategori'] = $this->kategoriModel->find($id_kategori);
        return view('editkategori', $data);
    }

    // Update data Kategori
    public function updatekategori($id_kategori)
    {
        $this->kategoriModel->update($id_kategori, [
            'id_kategori' => $this->request->getPost('id_kategori'),
            'kategori_karyawan' => $this->request->getPost('kategori_karyawan'),
        ]);

        return redirect()->to('/kelolakategori');
    }

    // Delete Kategori
    public function deletekategori($id_kategori)
    {
        $this->kategoriModel->delete($id_kategori);
        return redirect()->to('/kelolakategori');
    }

        //Tambah Role
    public function kelolarole()
    {
        $data['role'] = $this->roleModel->findAll();
        return view('kelolarole', $data);
    }

    // Form tambah Role
    public function tambahrole()
    {
        return view('tambahrole');
    }

    // Simpan data Role baru
    public function simpanrole()
    {
        $this->roleModel->insert([
            'id_role' => $this->request->getPost('id_role'),
            'role' => $this->request->getPost('role'),
        ]);

        return redirect()->to('/kelolarole');
    }

    // Form edit Role
    public function editrole($id_role)
    {
        $data['role'] = $this->roleModel->find($id_role);
        return view('editrole', $data);
    }

    // Update data Role
    public function updaterole($id_role)
    {
        $this->roleModel->update($id_role, [
            'id_role' => $this->request->getPost('id_role'),
            'role' => $this->request->getPost('role'),
        ]);

        return redirect()->to('/kelolarole');
    }

    // Delete Role
    public function deleterole($id_role)
    {
        $this->roleModel->delete($id_role);
        return redirect()->to('/kelolarole');
    }

        //Tambah User
    public function kelolauser()
    {
        $data['user'] = $this->userModel->findAll();
        return view('kelolauser', $data);
    }

    // Form tambah User
    public function tambahuser()
    {
        return view('tambahuser');
    }

    // Simpan data User baru
    public function simpanuser()
    {
        $this->userModel->insert([
            'id_user' => $this->request->getPost('id_user'),
            'nama_user' => $this->request->getPost('nama_user'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'id_role' => $this->request->getPost('id_role'),
        ]);

        return redirect()->to('/kelolauser');
    }

    // Form edit User
    public function edituser($id_user)
    {
        $data['user'] = $this->userModel->find($id_user);
        return view('edituser', $data);
    }

    // Update data User
    public function updateuser($id_user)
    {
        $this->userModel->update($id_user, [
            'id_user' => $this->request->getPost('id_user'),
            'nama_user' => $this->request->getPost('nama_user'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'id_role' => $this->request->getPost('id_role'),
        ]);

        return redirect()->to('/kelolauser');
    }

    // Delete User
    public function deleteuser($id_user)
    {
        $this->userModel->delete($id_user);
        return redirect()->to('/kelolauser');
    }

    public function validasikontrak()
    {
        $pengelolaansk = $this->pengelolaanskModel->findAll();
        $validasi = $this->validasiModel->findAll();
    
        $validasiMap = [];
        foreach ($validasi as $v) {
            $validasiMap[$v['id_sk']] = $v['status'];
        }
    
        foreach ($pengelolaansk as &$row) {
            $row['status'] = $validasiMap[$row['id_sk']] ?? 'pending'; 
        }
    
        $data['pengelolaansk'] = $pengelolaansk;
        return view('validasikontrak', $data);
    }
    
    public function updateStatusValidasi()
    {
        $request = $this->request;

        $json = $request->getJSON(true); 

        if (!isset($json['id_sk']) || !isset($json['status'])) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Data tidak lengkap'
            ])->setStatusCode(400);
        }

        $id_sk = $json['id_sk'];
        $status = $json['status'];

        $existing = $this->validasiModel->where('id_sk', $id_sk)->first();

        if ($existing) {
            $this->validasiModel
                 ->where('id_sk', $id_sk)
                 ->set(['status' => $status])
                 ->update();
        } else {
            $this->validasiModel->insert([
                'id_sk' => $id_sk,
                'status' => $status
            ]);
        }
    }    

    //Direktur SK
        public function pengelolaanskdirektur()
    {
        $data['pengelolaansk'] = $this->pengelolaanskModel->findAll();
        return view('pengelolaanskdirektur', $data);
    }

    public function karyawandirektur()
    {
        $data['karyawann'] = $this->karyawanModel->findAll();
        return view('karyawandirektur', $data);
    }

        //calonkaryawan

        public function kelolacalonkaryawan()
    {
        $calonkaryawan = $this->calonkaryawanModel->findAll();
        $prosesseleksi = $this->prosesseleksiModel->findAll();

        $prosesMap = [];
        foreach ($prosesseleksi as $v) {
            $prosesMap[$v['id_calonkaryawan']] = $v['status'];
        }

        foreach ($calonkaryawan as &$row) {
            $row['status'] = $prosesMap[$row['id_calonkaryawan']] ?? 'pending'; 
        }

        $data['calon_karyawan'] = $calonkaryawan;
        return view('kelolacalonkaryawan', $data);
    }

    public function tambahcalonkaryawan()
    {
        $data['namajabatan'] = $this->jabatanModel->findAll();
        return view('tambahcalonkaryawan', $data);
    }
    
    public function simpancalonkaryawan()
    {
        $data = [
            'id_calonkaryawan'     => $this->request->getPost('id_calonkaryawan'),
            'id_jabatan'           => $this->request->getPost('id_jabatan'),
            'nama_calonkaryawan'   => $this->request->getPost('nama_calonkaryawan'),
            'nama_jabatan'         => $this->request->getPost('nama_jabatan'),
            'alamat'               => $this->request->getPost('alamat'),
            'no_telp'              => $this->request->getPost('no_telp'),
        ];
    
        $this->calonkaryawanModel->insert($data);
        return redirect()->to('/kelolacalonkaryawan');
    }
    
    public function editcalonkaryawan($id_calonkaryawan)
    {
        $data['calon_karyawan'] = $this->calonkaryawanModel->find($id_calonkaryawan);
        $data['namajabatan'] = $this->jabatanModel->findAll();
        return view('editcalonkaryawan', $data);
    }
    
    public function updatecalonkaryawan($id_calonkaryawan)
    {
        $this->calonkaryawanModel->update($id_calonkaryawan, [
            'id_calonkaryawan' => $this->request->getPost('id_calonkaryawan'),
            'id_jabatan' => $this->request->getPost('id_jabatan'),
            'nama_calonkaryawan' => $this->request->getPost('nama_calonkaryawan'),
            'nama_jabatan' => $this->request->getPost('nama_jabatan'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telp' => $this->request->getPost('no_telp'),
        ]);
    
        return redirect()->to('/kelolacalonkaryawan');
    }
    
    public function deletecalonkaryawan($id_calonkaryawan)
    {
        $this->prosesseleksiModel->where('id_calonkaryawan', $id_calonkaryawan)->delete();
        $this->hasilseleksiModel->where('id_calonkaryawan', $id_calonkaryawan)->delete();
        $this->calonkaryawanModel->delete($id_calonkaryawan);
    
        return redirect()->to('/kelolacalonkaryawan');
    }
    
    public function kelolaprosesseleksi()
    {
        $calonkaryawan = $this->calonkaryawanModel->findAll();
        $prosesseleksi = $this->prosesseleksiModel->findAll();
    
        $prosesMap = [];
        foreach ($prosesseleksi as $v) {
            $prosesMap[$v['id_calonkaryawan']] = $v['status'];
        }
    
        foreach ($calonkaryawan as &$row) {
            $row['status'] = $prosesMap[$row['id_calonkaryawan']] ?? 'pending'; 
        }
    
        $data['calonkaryawan'] = $calonkaryawan;
        return view('kelolaprosesseleksi', $data);
    }
    
    public function updateStatusPenguji()
    {
        $json = $this->request->getJSON(true);
    
        if (!isset($json['id_calonkaryawan']) || !isset($json['status'])) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Data tidak lengkap'
            ])->setStatusCode(400);
        }
    
        $id_calonkaryawan = $json['id_calonkaryawan'];
        $status = $json['status'];
    
        $keputusan = match ($status) {
            'disetujui' => 'lolos',
            'ditolak'   => 'tidak lolos',
            default     => 'pending'
        };
    
        $existingProses = $this->prosesseleksiModel
            ->where('id_calonkaryawan', $id_calonkaryawan)
            ->first();
    
        if ($existingProses) {
            $this->prosesseleksiModel
                ->where('id_calonkaryawan', $id_calonkaryawan)
                ->set(['status' => $status])
                ->update();
        } else {
            $this->prosesseleksiModel->insert([
                'id_calonkaryawan' => $id_calonkaryawan,
                'status' => $status
            ]);
        }
    
        $existingHasil = $this->hasilseleksiModel
            ->where('id_calonkaryawan', $id_calonkaryawan)
            ->first();
    
        if ($existingHasil) {
            $this->hasilseleksiModel
                ->where('id_calonkaryawan', $id_calonkaryawan)
                ->set(['keputusan' => $keputusan])
                ->update();
        } else {
            $this->hasilseleksiModel->insert([
                'id_calonkaryawan' => $id_calonkaryawan,
                'keputusan' => $keputusan
            ]);
        }
    
        return $this->response->setJSON([
            'success'   => true,
            'message'   => 'Status & keputusan berhasil diperbarui',
            'status'    => $status,
            'keputusan' => $keputusan
        ]);
    }
    
    public function kelolahasilseleksi()
    {
        $calonkaryawan = $this->calonkaryawanModel->findAll();
        $hasilseleksi = $this->hasilseleksiModel->findAll();
    
        $hasilMap = [];
        foreach ($hasilseleksi as $v) {
            $hasilMap[$v['id_calonkaryawan']] = $v['keputusan'];
        }
    
        foreach ($calonkaryawan as &$row) {
            $row['keputusan'] = $hasilMap[$row['id_calonkaryawan']] ?? 'pending'; 
        }
    
        $data['calonkaryawan'] = $calonkaryawan;
        return view('kelolahasilseleksi', $data);
    }
    
    public function cetakhasil($id_calonkaryawan)
    {
        // Ambil data dari calon_karyawan
        $model = new calonkaryawanModel();
        $data['calon_karyawan'] = $model->find($id_calonkaryawan);
    
        if (!$data['calon_karyawan']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }
    
        // Ambil data hasil seleksi berdasarkan id_calonkaryawan
        $hasilModel = new \App\Models\hasilseleksiModel();
        $data['hasilseleksi'] = $hasilModel->where('id_calonkaryawan', $id_calonkaryawan)->first();
    
        $html = view('pdf/cetakhasil', $data);
    
        $options = new \Dompdf\Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new \Dompdf\Dompdf($options);
    
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
    
        $dompdf->stream('calon_karyawan_' . $id_calonkaryawan . '.pdf', ['Attachment' => false]);
    }
    
    public function cetakKaryawanView()
    {
        return view('cetakkaryawandirektur');
    }

    public function generatePdf()
    {
    $status = $this->request->getGet('status'); // Ambil status dari form filter

    // Panggil model
    $karyawanModel = new \App\Models\KaryawanModel();

    // Filter data jika status ada
    if ($status) {
        $data['karyawann'] = $karyawanModel->where('status', $status)->findAll();
    } else {
        $data['karyawann'] = $karyawanModel->findAll();
    }

    // Load view ke HTML
    $dompdf = new Dompdf();
    $html = view('pdf/cetakkaryawan', $data);

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Tampilkan PDF di browser
    $dompdf->stream("laporan_karyawan.pdf", ["Attachment" => false]);
    }

    }
