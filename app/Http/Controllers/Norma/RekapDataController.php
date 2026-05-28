<?php

namespace App\Http\Controllers\Norma;

use App\Http\Controllers\Controller;
use App\Models\KunciNorma;
use App\Models\UserNorma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekapDataController extends Controller
{
    public function getKriteria(){

        return ["se","wa","an","ge","ra","zr","fa","wu","me"];
    }
    public function rekapBiodata(Request $request){

        $user_norma = UserNorma::get();

        $scoreSubtes = $this->getScoreSubtes();

        $kriteria_test = $this->getKriteria();


        return view('livewire.norma.report.rekap-biodata' , [
            'user_norma' => $user_norma,
            'score_subtes' => $scoreSubtes,
            'kriteria_test' => $kriteria_test,  
            'getKunciNorma' => fn($umur, $kriteria, $nilai) => $this->getKunciNorma($umur, $kriteria, $nilai),          
        ]);

    }




    public function getScoreSubtes(){

        $rekapRecords = DB::table('norma_test_log')
                    ->leftJoin('norma_test', function($join) {
                        $join->on('norma_test.user_id', '=', 'norma_test_log.user_id')
                             ->on('norma_test.test_id', '=', 'norma_test_log.test_id');
                    })
                    ->leftJoin('norma', 'norma.id', '=', 'norma_test_log.test_id')
                    ->leftJoin('users', 'users.id', '=', 'norma_test_log.user_id')
                    ->select(
                        'norma_test_log.user_id',
                        'norma_test_log.nomor_test',
                        'users.name',
                        DB::raw('MAX(norma_test_log.created_at) AS created_at'),  // ← tambahan
                        DB::raw('SUM(CASE WHEN norma.tipe = 1 THEN norma_test.nilai ELSE 0 END) AS se'),
                        DB::raw('SUM(CASE WHEN norma.tipe = 2 THEN norma_test.nilai ELSE 0 END) AS wa'),
                        DB::raw('SUM(CASE WHEN norma.tipe = 3 THEN norma_test.nilai ELSE 0 END) AS an'),
                        DB::raw('SUM(CASE WHEN norma.tipe = 4 THEN norma_test.nilai ELSE 0 END) AS ge'),
                        DB::raw('SUM(CASE WHEN norma.tipe = 5 THEN norma_test.nilai ELSE 0 END) AS ra'),
                        DB::raw('SUM(CASE WHEN norma.tipe = 6 THEN norma_test.nilai ELSE 0 END) AS zr'),
                        DB::raw('SUM(CASE WHEN norma.tipe = 7 THEN norma_test.nilai ELSE 0 END) AS fa'),
                        DB::raw('SUM(CASE WHEN norma.tipe = 8 THEN norma_test.nilai ELSE 0 END) AS wu'),
                        DB::raw('SUM(CASE WHEN norma.tipe = 10 THEN norma_test.nilai ELSE 0 END) AS me')
                    )
                    ->groupBy('users.name', 'norma_test_log.user_id', 'norma_test_log.nomor_test')
                    ->orderBy('norma_test_log.user_id', 'asc')
                    ->get();

        return $rekapRecords;


    }

    public function getKunciNorma($umur , $kriteria , $nilai_norma)
    {

        $map = [13=>'A', 14=>'B', 15=>'C', 16=>'D', 17=>'E', 18=>'F'];

        $tipe_usia = match(true) {
            isset($map[$umur])     => $map[$umur],
            $umur <= 20            => 'G',
            $umur <= 24            => 'H',
            $umur <= 28            => 'I',
            $umur <= 33            => 'J',
            $umur <= 39            => 'K',
            $umur <= 45            => 'L',
            $umur > 45             => 'M',
            default                => 'N',
        };
      
        $nilai_sw = KunciNorma::select($kriteria)->where('rw',$nilai_norma)->where('tipe_usia',$tipe_usia)->value($kriteria);

        return $nilai_sw;

    }

   
}
