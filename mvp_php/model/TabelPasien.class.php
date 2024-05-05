<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/

class TabelPasien extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		
		// Mengeksekusi query
		return $this->execute($query);
	}

	public function getPasienById($id)
    {
		// Query mysql select data pasien berdasarkan id
        $query = "SELECT * FROM pasien WHERE id = '$id'";

		// Mengeksekusi query
        $this->execute($query);
        return $this->getResult();
    }

	function insertPasien($data)
	{
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];

		$query = "INSERT into pasien values ('', '$nik', '$nama', '$tempat', '$tl', '$gender', '$email','$telp')";

		// Mengeksekusi query
        return $this->execute($query);
	}

	function updatePasien($id, $data)
	{
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];

		$query = "UPDATE pasien SET nik='$nik', nama='$nama', tempat='$tempat', tl='$tl', gender='$gender', email='$email', telp='$telp' WHERE id='$id'";

		// Mengeksekusi query
        return $this->execute($query);
	}

	public function deletePasien($id)
    {
        $query = "DELETE FROM pasien WHERE id='$id'";
        return $this->execute($query);
    }
}
