<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index()
    {
        $kantor = [
            ['wilayah' => 'KALBAR', 'nama' => 'AAN DWI SANJAYA', 'penempatan' => 'UIP KALBAGBAR', 'lat' => -0.0507, 'lng' => 109.3415],
            ['wilayah' => 'SULSELBAR', 'nama' => 'ADI KURNIAWAN', 'penempatan' => 'UIP3B SULAWESI', 'lat' => -5.1477, 'lng' => 119.4327],
            ['wilayah' => 'JAKARTA 1', 'nama' => 'BUDI LESTARI', 'penempatan' => 'PUSHARLIS UP2W II KLENDER', 'lat' => -6.2251, 'lng' => 106.9187],
            ['wilayah' => 'LAMPUNG', 'nama' => 'BUDI SANTOSO', 'penempatan' => 'ULP KALIANDA', 'lat' => -5.6789, 'lng' => 105.6746],
            ['wilayah' => 'JABAR', 'nama' => 'CACA CAHYANA', 'penempatan' => 'UP3 TASIKMALAYA', 'lat' => -7.3274, 'lng' => 108.2207],
            ['wilayah' => 'JATIM', 'nama' => 'CAHYO PURBOHARTANTO', 'penempatan' => 'UID Jatim', 'lat' => -7.2575, 'lng' => 112.7521],
            ['wilayah' => 'LAMPUNG', 'nama' => 'CANDRA KURNIA SAPUTRA', 'penempatan' => 'UP3 PRINGSEWU', 'lat' => -5.3582, 'lng' => 104.9744],
            ['wilayah' => 'JATENG & DIY', 'nama' => 'CATUR AHMAD JUANDA', 'penempatan' => 'ULTG YOGYAKARTA', 'lat' => -7.8014, 'lng' => 110.3644],
            ['wilayah' => 'SUMSEL', 'nama' => 'CHIKA AINI PUTRI', 'penempatan' => 'UPT BENGKULU-BENGKULU', 'lat' => -3.8004, 'lng' => 102.2655],
            ['wilayah' => 'SUMUT', 'nama' => 'CHRISTIAN PARHUSIP', 'penempatan' => 'UNIT PELAKSANA TRANSMISI MEDAN', 'lat' => 3.5952, 'lng' => 98.6722],
            ['wilayah' => 'JAKARTA 2', 'nama' => 'CIPTO INDARNO', 'penempatan' => 'UP3 LENTENG AGUNG', 'lat' => -6.3388, 'lng' => 106.8236],
        ];

        return view('lokasi-pln', compact('kantor'));
    }
}
