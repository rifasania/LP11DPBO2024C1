<?php


include("KontrakView.php");
include("presenter/ProsesPasien.php");

class TampilPasien implements KontrakView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil()
	{
		$this->prosespasien->prosesDataPasien();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$id = $this->prosespasien->getId($i);
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getTelp($i) . "</td>
			<td>
                    <a href='index.php?id_edit=" . $id .  "' class='btn btn-primary'>Update</a>
                    <a href='index.php?id_hapus=" . $id .  "' class='btn btn-danger'>Delete</a>
                </td>
            </tr>";
		}

		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	public function tambahPasien()
    {	
		$judul = 'Tambah';
		$dataGender = null;
		$dataGender .= "<option value='Laki-laki'>Laki-laki</option>
						<option value='Perempuan'>Perempuan</option>";

		if (isset($_POST['submit'])) {
			$data = array(
				'nik' => $_POST['nik'],
				'nama' => $_POST['nama'],
				'tempat' => $_POST['tempat'],
				'tl' => $_POST['tl'],
				'gender' => $_POST['gender'],
				'email' => $_POST['email'],
				'telp' => $_POST['telp'],
			);

            $result = $this->prosespasien->addPasien($data);
            header("Location: index.php");
        }

		$this->tpl = new Template("templates/form.html");
		$this->tpl->replace("DATA_GENDER", $dataGender);
		$this->tpl->replace("DATA_JUDUL", $judul);
        $this->tpl->write();
    }

	public function editPasien($id)
    {	
		$judul = 'Edit';
		$data_awal = $this->prosespasien->getPasienById($id);
		$id = $data_awal['id'];
		$nik = $data_awal['nik'];
		$nama = $data_awal['nama'];
		$tempat = $data_awal['tempat'];
		$tl = $data_awal['tl'];
		$gender = $data_awal['gender'];
		$email = $data_awal['email'];
		$telp = $data_awal['telp'];

		$dataGender = null;
		if($gender == 'Laki-laki') {
			$dataGender .= "<option value='Laki-laki' selected>Laki-laki</option>
						<option value='Perempuan'>Perempuan</option>";
		} else {
			$dataGender .= "<option value='Laki-laki'>Laki-laki</option>
						<option value='Perempuan' selected>Perempuan</option>";
		}
        
		if (isset($_POST['submit'])) {
			$data = array(
				'nik' => $_POST['nik'],
				'nama' => $_POST['nama'],
				'tempat' => $_POST['tempat'],
				'tl' => $_POST['tl'],
				'gender' => $_POST['gender'],
				'email' => $_POST['email'],
				'telp' => $_POST['telp'],
			);

            $result = $this->prosespasien->updatePasien($id, $data);
            header("Location: index.php");
        }		

		$this->tpl = new Template("templates/form.html");
		$this->tpl->replace("DATA_JUDUL", $judul);
		$this->tpl->replace("DATA_VAL_NIK", $nik);
		$this->tpl->replace("DATA_VAL_NAMA", $nama);
		$this->tpl->replace("DATA_VAL_TEMPAT", $tempat);
		$this->tpl->replace("DATA_VAL_TL", $tl);
		$this->tpl->replace("DATA_GENDER", $dataGender);
		$this->tpl->replace("DATA_VAL_EMAIL", $email);
		$this->tpl->replace("DATA_VAL_TELP", $telp);
        $this->tpl->write();
    }

	public function hapusPasien($id)
    {	
        $this->prosespasien->deletePasien($id);
        header("Location: index.php");
    }
}
