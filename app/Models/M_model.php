<?php namespace App\Models;

use CodeIgniter\Model;

class M_model extends Model
{
	public function tampil($table){
		return $this->db->table($table)->get()->getResult();
	}

    public function input($table, $where){
		return $this->db->table($table)->update($where);
	}

	public function hapus($table, $where){
		return $this->db->table($table)->delete($where);
	}

	public function simpan($table, $data){
		return $this->db->table($table)->insert($data);
	}

	public function getWhere($table, $where){
		return $this->db->table($table)->getWhere($where)->getRow();
	}

	public function edit($table, $data, $where){
		return $this->db->table($table)->update($data, $where);
	}

	public function join($table, $table2, $on)
	{
		return $this->db->table($table)->join($table2, $on)->get()->getResult();
	}

	public function join2($table1, $table2, $on){
		return $this->db->table($table1)->join($table2, $on, 'left')->get()->getResult();
	}

	public function getWhere2($table, $where){
		return $this->db->table($table)->getWhere($where)->getRowArray();
	}

	public function filter4($table, $awal, $akhir)
    {
        return $this->db->query("SELECT * from " . $table . "  join barang on " . $table . ".id_barang = barang.id_barang where " . $table . ".tanggal BETWEEN '" . $awal . "' and '" . $akhir . "' ")->getResult();
    }
    
	public function join3($table1, $table2,$table3, $on,$on1,$where){
		return $this->db->table($table1)->join($table2, $on, 'left')->join($table3, $on1, 'left')->getWhere($where)->getResult();
	}

	public function join4($table1, $table2, $table3, $on, $on2)
	{
		return $this->db->table($table1)->join($table2, $on, 'left')->join($table3, $on2, 'left')->get()->getResult();
	}

    public function filter_transaksi($table, $awal, $akhir)
    {
        $builder = $this->db->table($table);

        // Join dengan tabel lain
        $builder->join('user', $table . '.user = user.id_user');
        $builder->join('point', $table . '.point = point.id_point');
        $builder->join('kelas', $table . '.kelas = kelas.id_kelas');

        // Buat kondisi filter berdasarkan tanggal
        $builder->where($table . '.tanggal >=', $awal);
        $builder->where($table . '.tanggal <=', $akhir);

        // Execute the query and return the results
        $query = $builder->get();

        return $query->getResult();
    }

	public function filter_barang_masuk($table, $awal, $akhir)
{
    $builder = $this->db->table($table);

    // Join with other tables
    $builder->join('barang', $table . '.barang = barang.id_barang');

    // Add filter conditions based on dates
    $builder->where($table . '.tanggal >=', $awal);
    $builder->where($table . '.tanggal <=', $akhir);

    // Execute the query
    $query = $builder->get();

    // Check if the query was successful
    if ($query === false) {
        // Log the database error
        $error = $this->db->error();
        log_message('error', 'Database Error: ' . $error['message']);

        // Return false or handle the error as needed
        return false;
    }

    // Return the query result
    return $query->getResult();
}
public function filter5($table , $on, $awal, $akhir) 
    {
        return $this->db->query("SELECT * from " . $table . "  
		join barang on " . $table . ".id_barang = barang.id_barang 
		WHERE ".$table.".tanggal_masuk BETWEEN '".$awal."' and '".$akhir."' ")->getResult();
    }


}