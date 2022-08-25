<?php

namespace App\Controllers;

use App\Models\ImunisasiBalitaModel;
use App\Models\PeriksaBalitaModel;
use App\Models\PeriksaIbuModel;
use App\Controllers\BaseController;
use TCPDF;

class Laporan extends BaseController
{
    public function __construct()
    {
        $this->imunisasiBalita = new ImunisasiBalitaModel();
        $this->periksaBalita = new PeriksaBalitaModel();
        $this->periksaIbu = new PeriksaIbuModel();
    }

    public function imunisasiBalita()
    {
        $dari_tanggal = $this->request->getGet('tanggal_dari');
        $sampai_tanggal = $this->request->getGet('tanggal_sampai');

        if (empty($dari_tanggal) || empty($sampai_tanggal)) {
            $imunisasiBalita = '';
        } else {
            $imunisasiBalita = $this->imunisasiBalita->filterImunisasiBalita($dari_tanggal, $sampai_tanggal);
        }

        $data = [
            'title' => 'Laporan Imunisasi Balita',
            'imunisasiBalita' => $imunisasiBalita,
        ];

        return view('laporan/imunisasi_balita', $data);
    }

    public function imunisasiBalitaPrint()
    {
        $dari_tanggal = $this->request->getGet('tanggal_dari');
        $sampai_tanggal = $this->request->getGet('tanggal_sampai');

        if (empty($dari_tanggal) || empty($sampai_tanggal)) {
            $imunisasiBalita = '';
        } else {
            $imunisasiBalita = $this->imunisasiBalita->filterImunisasiBalita($dari_tanggal, $sampai_tanggal);
        }

        $data = [
            'title' => 'Cetak Laporan Imunisasi Balita',
            'imunisasiBalita' => $imunisasiBalita,
        ];

        return view('laporan/print_imunisasi_balita', $data);
    }

    public function imunisasiBalitaPdf()
    {
        $dari_tanggal = $this->request->getGet('tanggal_dari');
        $sampai_tanggal = $this->request->getGet('tanggal_sampai');

        if (empty($dari_tanggal) || empty($sampai_tanggal)) {
            $imunisasiBalita = '';
        } else {
            $imunisasiBalita = $this->imunisasiBalita->filterImunisasiBalita($dari_tanggal, $sampai_tanggal);
        }

        $data = [
            'title' => 'PDF Laporan Imunisasi Balita',
            'imunisasiBalita' => $imunisasiBalita,
        ];

        view('laporan/pdf_imunisasi_balita', $data);

        $pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Posyandu Kamboja');
        $pdf->SetTitle('PDF Laporan Imunisasi Balita');
        $pdf->SetSubject('Laporan Imunisasi Balita');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->AddPage('L', 'mm', 'A4');
        $pdf->SetFont('times', 'B', 14);
        $pdf->Cell(277, 10, "POSYANDU KAMBOJA", 0, 1, 'C');
        $pdf->SetAutoPageBreak(true, 0);

        $pdf->SetFont('', 'I', 12);
        $pdf->Cell(277, 3, "Jatinegara RW03", 0, 1, 'C');
        $pdf->SetAutoPageBreak(true, 0);

        $pdf->SetFont('', 'I', 12);
        $pdf->Cell(277, 3, "___________________________________________________________________________________________________________________________________", 0, 1, 'C');
        $pdf->SetAutoPageBreak(true, 0);

        $pdf->Ln(4);
        $pdf->SetFont('', 'B', 12);
        $pdf->Cell(277, 3, "Laporan Imunisasi Balita", 0, 1, 'C');
        $pdf->SetAutoPageBreak(true, 0);

        $petugas = "Petugas : " . session('nama');
        $dari_tanggal_d = "Dari tanggal : " . $dari_tanggal;
        $sampai_tanggal_s = "Sampai tanggal : " . $sampai_tanggal;
        $pdf->Ln(4);
        $pdf->SetFont('', '', 12);
        //Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
        $pdf->Cell(55, 5, $petugas, 0, 1, 'L', 0, 0, 0);
        $pdf->Cell(55, 5, $dari_tanggal_d, 0, 1, 'L', 0, 0, 0);
        $pdf->Cell(55, 5, $sampai_tanggal_s, 0, 1, 'L', 0, 0, 0);
        $pdf->SetAutoPageBreak(true, 0);

        $pdf->Ln(3);
        $pdf->SetFont('', 'B', 12);
        $pdf->Cell(10, 8, "No", 1, 0, 'C');
        $pdf->Cell(65, 8, "Nama Balita", 1, 0, 'C');
        $pdf->Cell(40, 8, "Jenis Kelamin", 1, 0, 'C');
        $pdf->Cell(50, 8, "Tanggal Lahir", 1, 0, 'C');
        $pdf->Cell(45, 8, "Imunisasi", 1, 0, 'C');
        $pdf->Cell(70, 8, "Keterangan", 1, 1, 'C');
        $pdf->SetFont('', '', 12);
        $no = 0;
        foreach ($imunisasiBalita as $value) {
            $no++;
            $pdf->Cell(10, 8, $no, 1, 0, 'C');
            $pdf->Cell(65, 8, $value['nama_balita'], 1, 0);
            $pdf->Cell(40, 8, $value['jk_balita'], 1, 0);
            $pdf->Cell(50, 8, date_indo($value['tanggal_lahir_balita']), 1, 0);
            $pdf->Cell(45, 8, $value['nama_imunisasi'], 1, 0);
            $pdf->Cell(70, 8, $value['keterangan_imunisasi'], 1, 1);
        }
        $pdf->SetFont('', 'B', 10);
        $this->response->setContentType('application/pdf');

        $pdf->Output('imunisasi_balita.pdf', 'I');
    }

    public function periksaBalita()
    {
        $dari_tanggal = $this->request->getGet('tanggal_dari');
        $sampai_tanggal = $this->request->getGet('tanggal_sampai');

        if (empty($dari_tanggal) || empty($sampai_tanggal)) {
            $periksaBalita = '';
        } else {
            $periksaBalita = $this->periksaBalita->filterperiksaBalita($dari_tanggal, $sampai_tanggal);
        }

        $data = [
            'title' => 'Laporan Pemeriksaan Balita',
            'periksaBalita' => $periksaBalita,
        ];

        return view('laporan/periksa_balita', $data);
    }

    public function periksaBalitaPrint()
    {
        $dari_tanggal = $this->request->getGet('tanggal_dari');
        $sampai_tanggal = $this->request->getGet('tanggal_sampai');

        if (empty($dari_tanggal) || empty($sampai_tanggal)) {
            $periksaBalita = '';
        } else {
            $periksaBalita = $this->periksaBalita->filterperiksaBalita($dari_tanggal, $sampai_tanggal);
        }

        $data = [
            'title' => 'Cetak Laporan Pemeriksaan Balita',
            'periksaBalita' => $periksaBalita,
        ];

        return view('laporan/print_periksa_balita', $data);
    }

    public function periksaBalitaPdf()
    {
        $dari_tanggal = $this->request->getGet('tanggal_dari');
        $sampai_tanggal = $this->request->getGet('tanggal_sampai');

        if (empty($dari_tanggal) || empty($sampai_tanggal)) {
            $periksaBalita = '';
        } else {
            $periksaBalita = $this->periksaBalita->filterperiksaBalita($dari_tanggal, $sampai_tanggal);
        }

        $data = [
            'title' => 'Cetak Laporan Pemeriksaan Balita',
            'periksaBalita' => $periksaBalita,
        ];

        view('laporan/print_periksa_balita', $data);

        $pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Posyandu Kamboja');
        $pdf->SetTitle('PDF Laporan Pemeriksaan Balita');
        $pdf->SetSubject('Laporan Pemeriksaan Balita');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->AddPage('L', 'mm', 'A4');
        $pdf->SetFont('times', 'B', 14);
        $pdf->Cell(277, 10, "POSYANDU KAMBOJA", 0, 1, 'C');
        $pdf->SetAutoPageBreak(true, 0);

        $pdf->SetFont('', 'I', 12);
        $pdf->Cell(277, 3, "Jatinegara RW03", 0, 1, 'C');
        $pdf->SetAutoPageBreak(true, 0);

        $pdf->SetFont('', 'I', 12);
        $pdf->Cell(277, 3, "___________________________________________________________________________________________________________________________________", 0, 1, 'C');
        $pdf->SetAutoPageBreak(true, 0);

        $pdf->Ln(4);
        $pdf->SetFont('', 'B', 12);
        $pdf->Cell(277, 3, "Laporan Pemeriksaan Balita", 0, 1, 'C');
        $pdf->SetAutoPageBreak(true, 0);

        $petugas = "Petugas : " . session('nama');
        $dari_tanggal_d = "Dari tanggal : " . $dari_tanggal;
        $sampai_tanggal_s = "Sampai tanggal : " . $sampai_tanggal;
        $pdf->Ln(4);
        $pdf->SetFont('', '', 12);
        //Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
        $pdf->Cell(55, 5, $petugas, 0, 1, 'L', 0, 0, 0);
        $pdf->Cell(55, 5, $dari_tanggal_d, 0, 1, 'L', 0, 0, 0);
        $pdf->Cell(55, 5, $sampai_tanggal_s, 0, 1, 'L', 0, 0, 0);
        $pdf->SetAutoPageBreak(true, 0);

        $pdf->Ln(3);
        $pdf->SetFont('', 'B', 12);
        $pdf->Cell(10, 8, "No", 1, 0, 'C');
        $pdf->Cell(65, 8, "Nama Balita", 1, 0, 'C');
        $pdf->Cell(35, 8, "Jenis Kelamin", 1, 0, 'C');
        $pdf->Cell(30, 8, "Tinggi Badan", 1, 0, 'C');
        $pdf->Cell(30, 8, "Berat Badan", 1, 0, 'C');
        $pdf->Cell(35, 8, "Lingkar Kepala", 1, 0, 'C');
        $pdf->Cell(72, 8, "Keterangan", 1, 1, 'C');
        $pdf->SetFont('', '', 12);
        $no = 0;
        foreach ($periksaBalita as $value) {
            $no++;
            $pdf->Cell(10, 8, $no, 1, 0, 'C');
            $pdf->Cell(65, 8, $value['nama_balita'], 1, 0);
            $pdf->Cell(35, 8, $value['jk_balita'], 1, 0);
            $pdf->Cell(30, 8, $value['tb_periksa'], 1, 0);
            $pdf->Cell(30, 8, $value['bb_periksa'], 1, 0);
            $pdf->Cell(35, 8, $value['lk_periksa'], 1, 0);
            $pdf->Cell(72, 8, $value['keterangan_periksa'], 1, 1);
        }
        $pdf->SetFont('', 'B', 10);
        $this->response->setContentType('application/pdf');

        $pdf->Output('pemeriksaan_balita.pdf', 'I');
    }

    public function periksaIbu()
    {
        $dari_tanggal = $this->request->getGet('tanggal_dari');
        $sampai_tanggal = $this->request->getGet('tanggal_sampai');

        if (empty($dari_tanggal) || empty($sampai_tanggal)) {
            $periksaIbu = '';
        } else {
            $periksaIbu = $this->periksaIbu->filterperiksaIbu($dari_tanggal, $sampai_tanggal);
        }

        $data = [
            'title' => 'Laporan Pemeriksaan Ibu Hamil',
            'periksaIbu' => $periksaIbu,
        ];

        return view('laporan/periksa_ibu', $data);
    }

    public function periksaIbuPrint()
    {
        $dari_tanggal = $this->request->getGet('tanggal_dari');
        $sampai_tanggal = $this->request->getGet('tanggal_sampai');

        if (empty($dari_tanggal) || empty($sampai_tanggal)) {
            $periksaIbu = '';
        } else {
            $periksaIbu = $this->periksaIbu->filterperiksaIbu($dari_tanggal, $sampai_tanggal);
        }

        $data = [
            'title' => 'Cetak Laporan Pemeriksaan Ibu Hamil',
            'periksaIbu' => $periksaIbu,
        ];

        return view('laporan/print_periksa_ibu', $data);
    }

    public function periksaIbuPdf()
    {
        $dari_tanggal = $this->request->getGet('tanggal_dari');
        $sampai_tanggal = $this->request->getGet('tanggal_sampai');

        if (empty($dari_tanggal) || empty($sampai_tanggal)) {
            $periksaIbu = '';
        } else {
            $periksaIbu = $this->periksaIbu->filterperiksaIbu($dari_tanggal, $sampai_tanggal);
        }

        $data = [
            'title' => 'Cetak Laporan Pemeriksaan Balita',
            'periksaIbu' => $periksaIbu,
        ];

        view('laporan/print_periksa_ibu', $data);

        $pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Posyandu Kamboja');
        $pdf->SetTitle('PDF Laporan Pemeriksaan Ibu Hamil');
        $pdf->SetSubject('Laporan Pemeriksaan Ibu Hamil');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->AddPage('L', 'mm', 'A4');
        $pdf->SetFont('times', 'B', 14);
        $pdf->Cell(277, 10, "POSYANDU KAMBOJA", 0, 1, 'C');
        $pdf->SetAutoPageBreak(true, 0);

        $pdf->SetFont('', 'I', 12);
        $pdf->Cell(277, 3, "Jatinegara RW03", 0, 1, 'C');
        $pdf->SetAutoPageBreak(true, 0);

        $pdf->SetFont('', 'I', 12);
        $pdf->Cell(277, 3, "___________________________________________________________________________________________________________________________________", 0, 1, 'C');
        $pdf->SetAutoPageBreak(true, 0);

        $pdf->Ln(4);
        $pdf->SetFont('', 'B', 12);
        $pdf->Cell(277, 3, "Laporan Pemeriksaan Ibu Hamil", 0, 1, 'C');
        $pdf->SetAutoPageBreak(true, 0);

        $petugas = "Petugas : " . session('nama');
        $dari_tanggal_d = "Dari tanggal : " . $dari_tanggal;
        $sampai_tanggal_s = "Sampai tanggal : " . $sampai_tanggal;
        $pdf->Ln(4);
        $pdf->SetFont('', '', 12);
        //Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
        $pdf->Cell(55, 5, $petugas, 0, 1, 'L', 0, 0, 0);
        $pdf->Cell(55, 5, $dari_tanggal_d, 0, 1, 'L', 0, 0, 0);
        $pdf->Cell(55, 5, $sampai_tanggal_s, 0, 1, 'L', 0, 0, 0);
        $pdf->SetAutoPageBreak(true, 0);

        $pdf->Ln(3);
        $pdf->SetFont('', 'B', 12);
        $pdf->Cell(10, 8, "No", 1, 0, 'C');
        $pdf->Cell(65, 8, "Nama", 1, 0, 'C');
        $pdf->Cell(35, 8, "Usia Kandungan", 1, 0, 'C');
        $pdf->Cell(30, 8, "Berat Badan", 1, 0, 'C');
        $pdf->Cell(35, 8, "Lingkar Lengan", 1, 0, 'C');
        $pdf->Cell(30, 8, "Tinggi Fundus", 1, 0, 'C');
        $pdf->Cell(72, 8, "Keterangan", 1, 1, 'C');
        $pdf->SetFont('', '', 12);
        $no = 0;
        foreach ($periksaIbu as $value) {
            $no++;
            $pdf->Cell(10, 8, $no, 1, 0, 'C');
            $pdf->Cell(65, 8, $value['nama_ibu'], 1, 0);
            $pdf->Cell(35, 8, $value['uk_periksa_ibu'], 1, 0);
            $pdf->Cell(30, 8, $value['bb_periksa_ibu'], 1, 0);
            $pdf->Cell(35, 8, $value['lila_periksa_ibu'], 1, 0);
            $pdf->Cell(30, 8, $value['tfundus_periksa_ibu'], 1, 0);
            $pdf->Cell(72, 8, $value['keterangan_periksa_ibu'], 1, 1);
        }
        $pdf->SetFont('', 'B', 10);
        $this->response->setContentType('application/pdf');

        $pdf->Output('pemeriksaan_ibu_hamil.pdf', 'I');
    }
}
