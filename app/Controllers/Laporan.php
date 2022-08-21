<?php

namespace App\Controllers;

use App\Models\ImunisasiBalitaModel;
use App\Models\PeriksaBalitaModel;
use App\Models\PeriksaIbuModel;

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

        return view('laporan/pdf_imunisasi_balita', $data);
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
            'title' => 'Cetak Laporan Pemeriksaan Balita',
            'periksaIbu' => $periksaIbu,
        ];

        return view('laporan/print_periksa_ibu', $data);
    }
}
