<?php

namespace App\Controllers;

use App\Models\M_model;
use Dompdf\Dompdf;

class Home extends BaseController
{
    public function index()
    {
        if(session()->get('level') > 0){
            echo view ('header');
            echo view ('menu');
            echo view ('dashboard');
            echo view ('footer');
        } else{
            return redirect()->to('home/login');
        }
    }

    public function login()
    {
        echo view ('login');
    }

    public function aksi_login()
    {
        $model = new M_model();
        $a = $this->request->getPost('username');
        $b = $this->request->getPost('password');

        $isi = array(
            'username' => $a,
            'password' => md5($b)
        );
        $cek=$model->getWhere2('user', $isi);
		if ($cek > 0) {
			session()->set('id', $cek['id_user']);
			session()->set('username', $cek['username']);
			session()->set('level', $cek['level']);
			return redirect()->to('Home/dashboard');
		}else {
			return redirect()->to('home/login');
		}
    }

    public function dashboard()
    {
        echo view ('header');
        echo view ('menu');
        echo view ('dashboard');
        echo view ('footer');
    }

    public function user()
    {
        $model = new M_model();
        $data['dt'] = $model->tampil('user');
        echo view ('header');
        echo view ('menu');
        echo view ('user', $data);
        echo view ('footer');
    }

    public function barang()
    {
        $model = new M_model();
        $data['dt'] = $model->tampil('barang');
        echo view ('header');
        echo view ('menu');
        echo view ('barang', $data);
        echo view ('footer');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('home/login');
    }

    public function barang_masuk()
    {
        $model = new M_model();
        $on = ('barang_masuk.id_barang = barang.id_barang');
        $data['dt'] = $model->join('barang_masuk' , 'barang', $on);
        echo view ('header');
        echo view ('menu');
        echo view ('barang_masuk', $data);
        echo view ('footer');
    }

    public function delete_barang($id)
    {
        $model = new M_model();
        $where = array('id_barang' => $id);
        $model->hapus('barang', $where);
        $model->hapus('barang_masuk', $where);
        return redirect()->to('home/barang');

    }

    public function tambah_barang()
    {
        $model = new M_model();
        $data['dt'] = $model->tampil('barang');
        echo view ('header');
        echo view ('menu');
        echo view ('tambah_barang_masuk', $data);
        echo view ('footer');
    }

    // public function p_t_barang()
    // {
    //     $model = new M_model();
    //     $a = $this->request->getPost('nama_barang');
    //     $b = $this->request->getPost('nama_supplier');
    //     $c = $this->request->getPost('jumlah');

    //     $where = array('stok' => $c);
    //     $id = $model->getWhere2('id_barang', $where);
    //     $id_barang = $id['nama_barang'];
    //     $data = array(
    //         'nama_barang' => $a,
    //         'kode_barang' => 'apple',
    //         'stok'=> $c,
    //         'tanggal' => date('Y-m-d'),
    //     );
    //     $model->input('barang' , $data);

    //     $data2 = array(
    //         'nama_barang' => $id_barang,
    //         'nama_supplier'=> $b,
    //         'jumlah' => $c,
    //         'tanggal_masuk' => date('Y-m-d')
    //     );
    //     $model->simpan('barang_masuk', $data2);
    //     return redirect()->to('home/barang_masuk');
    // }

    public function p_t_barang()
{
    $model = new M_model();
    $a = $this->request->getPost('id_barang');
    $b = $this->request->getPost('nama_supplier');
    $c = $this->request->getPost('jumlah');
    $id = $this->request->getPost('id_barang');

    // Check if the product already exists in the "barang" table
    $where = array('id_barang' => $a);
    $existing_product = $model->getWhere2('barang', $where);

    if ($existing_product !== false) {
        // If the product exists, update its stock quantity
        $updated_stok = $existing_product['stok'] + $c;

        // Update the stock quantity in the "barang" table
        $data_update_barang = array(
            'stok' => $updated_stok
        );
        $model->edit('barang', $data_update_barang, $where);
    }

    
    // Insert data into the "barang_masuk" table
    $data_barang_masuk = array(
        'id_barang' => $id,
        'nama_supplier' => $b,
        'jumlah' => $c,
        'tanggal_masuk' => date('Y-m-d')
    );
    // print_r($data_barang_masuk);
    $model->simpan('barang_masuk', $data_barang_masuk); 
    return redirect()->to('home/barang_masuk');
}

    public function stok_barang()
    {
        $model = new M_model();
        $data['dt'] = $model->tampil('barang');
        echo view ('header');
        echo view ('menu');
        echo view ('stok_barang', $data);
        echo view ('footer');
    }

    public function transaksi()
    {
        $model = new M_model();
        $data['dt'] = $model->tampil('barang');
        echo view ('header');
        echo view ('menu');
        echo view ('transaksi', $data);
        echo view ('footer');
    }

    public function laporan()
    {
        $filter['kunci'] = 'view_laporan';

        echo view ('header', $filter);
        echo view ('menu', $filter);
        echo view ('filter', $filter);
        echo view ('footer');
    }

    public function pdf_transaksi()
    {
        $model = new M_model();
        $awal = $this->request->getPost('awal');
        $akhir = $this->request->getPost('akhir');
        $data['dt'] = $model->filter_siswa('siswa', $awal, $akhir);
        // $img = file_get_contents(
        //     'C:\xampp\htdocs\koperasi-simpan-pinjam\public\images\ksp.png');

        // $kui['user'] = base64_encode($img);

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->loadHtml(view('head'));
        $dompdf->loadHtml(view('c_siswa', $data));
        $dompdf->render();
        $dompdf->stream('my.pdf', array('Attachment' => 0));
    }

    // public function laporan_pdf()
    // {
    //     $model = new M_model();
    //     $awal = $this->request->getPost('awal');
    //     $akhir = $this->request->getPost('akhir');
    //     $data['dt'] = $model->filter_transaksi('transaksi', $awal, $akhir);
    //     // $img = file_get_contents(
    //     //     'C:\xampp\htdocs\koperasi-simpan-pinjam\public\images\ksp.png');

    //     // $kui['user'] = base64_encode($img);
    //     echo view('header');

    //     echo view('laporan_pdf', $data);
    // }

    public function laporan_barang_masuk()
    {
        $model = new M_model();
        // $awal = $this->request->getPost('awal');
        // $akhir = $this->request->getPost('akhir');
        $data['kunci'] = 'view_laporan_masuk';
        
        echo view('header');
        echo view ('menu');
            echo view('filter', $data);
            echo view ('footer');
    }

    public function laporan_bm()
    {
        $model = new M_model();
        $awal = $this->request->getpost('awal');
        $akhir = $this->request->getpost('akhir');
        $where = array('tanggal >' . $awal . 'and tanggal <' . $akhir);
        $on = 'barang_masuk.id_barang=barang.id_barang';
        $data['dt'] = $model->filter5('barang_masuk', $on,  $awal, $akhir);
        // echo view('laporan_bm', $data);
        $dompdf = new Dompdf();
        $dompdf->set_option('isRemoteEnabled', TRUE);
        $dompdf->loadHtml(view('laporan_bm', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        // $dompdf -> stream();
        $dompdf->stream('my.pdf', array('Attachment' => 0));
    }

    public function activity()
    {
        $model = new M_model();
        $on = ('log.id_barang_masuk = barang_masuk.id_barang_masuk');
        $data['dt'] = $model->join('log' , 'barang_masuk', $on);
        echo view ('header');
        echo view ('menu');
        echo view ('activity', $data);
        echo view ('footer');
    }

    public function t_barang()
    {
        echo view ('header');
        echo view ('menu');
        echo view ('t_barang');
        echo view ('footer');
    }

    public function pt_barang()
    {
        $model = new M_model();
        $a = $this->request->getPost('nama_barang');
        $b = $this->request->getPost('kode_barang');
        $c = $this->request->getPost('harga');
        $d = $this->request->getPost('stok');

        $isi = array(
            'nama_barang' => $a,
            'kode_barang' => $b,
            'harga' => $c,
            'stok' => '0',
            'tanggal' => date('Y-m-d')
        );
        $model->simpan('barang', $isi);
        return redirect()->to('home/barang');
    }

    public function proses_transaksi()
    {
        $model = new M_model();
        $a = $this->request->getPost('nama_barang');
        $b = $this->request->getPost('total_pesan');
        $c = $this->request->getPost('harga');

        $isi = array (
            'keranjang' => $a,
            'total_pesan' => $b,
            'harga' => $c,
            'tanggal' => date('Y-m-d')
        );
        $model->simpan('keranjang', $isi);
        return redirect()->to('home/keranjang');

    }

    public function keranjang()
    {
        $model = new M_model();
        $data['dt'] = $model->tampil('keranjang');
        echo view ('header');
        echo view ('menu');
        echo view ('keranjang');
        echo view ('footer');

    }

}
