<?php

interface KontrakView{
	public function tampil();
	public function tambahPasien();
	public function editPasien($id);
	public function hapusPasien($id);
}

?>