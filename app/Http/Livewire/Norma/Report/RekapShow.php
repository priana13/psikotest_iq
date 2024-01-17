<?php

namespace App\Http\Livewire\Norma\Report;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\NormaTest;
use App\Models\NormaTestLog;
use App\Models\DataUserNorma;
use App\Models\User;
use App\Models\KunciNorma;
use App\Models\KunciIQ;
use DB;

class RekapShow extends Component
{
    protected $debug = true;    
    public $prompt;

    protected $listeners = ['getRekap'];
  
    public $user_id;
    public $rekap;
    public $userNorma;
    public $normaTest;
    public $name;
    public $sw;
    public $total_rw;
    public $total_sw;
    public $iq;
    public $kategori;


    public function getRekap($userId)
    {   
        $this->user_id = $userId;
        $testLog = DB::table('norma_test_log')
            ->join('norma', 'norma.id', '=', 'norma_test_log.test_id')
            ->where('norma_test_log.status', '=', 2)
            ->where('norma_test_log.user_id', '=', $userId)
            ->where('norma.tipe', '=', 4)
            ->select('norma_test_log.*', 'norma.id', 'norma.tipe', 'norma.waktu','norma.nama')
            ->first();
        $this->test_id = ($testLog) ? $testLog->test_id : null;     

        $user = User::find($userId);
        $this->name = $user->name;  
        $userNorma = DataUserNorma::where('user_id',$userId)->first();
        $umur = ($userNorma)? Carbon::parse($userNorma->tgl_lahir)->age:null;
        $tipe_usia = '';
        if($umur ==13){
            $tipe_usia = 'A';
        }elseif($umur ==14){
            $tipe_usia = 'B';
        }elseif($umur ==15){
            $tipe_usia = 'C';
        }elseif($umur ==16){
            $tipe_usia = 'D';
        }elseif($umur ==17){
            $tipe_usia = 'E';
        }elseif($umur ==18){
            $tipe_usia = 'F';
        }elseif($umur ==19 || $umur == 20){
            $tipe_usia = 'G';
        }elseif($umur > 20 && $umur < 25){
            $tipe_usia = 'H';
        }elseif($umur > 24 && $umur < 29){
            $tipe_usia = 'I';
        }elseif($umur > 28 && $umur < 34){
            $tipe_usia = 'J';
        }elseif($umur > 33 && $umur < 40){
            $tipe_usia = 'K';
        }elseif($umur > 39 && $umur <46){
            $tipe_usia = 'L';
        }elseif($umur > 44){
            $tipe_usia = 'M';
        }else{
            $tipe_usia = 'N';
        }



        $this->userNorma = ($userNorma) ? json_decode(json_encode($userNorma), true) : null;
        $normaTest = DB::table('norma_test')
                    ->leftJoin('norma', 'norma.id', '=', 'norma_test.test_id')
                    ->leftJoin('users', 'users.id', '=', 'norma_test.user_id')
                    ->select(
                        'norma_test.user_id','users.email',
                        DB::raw('SUM(CASE WHEN norma.tipe = 1 THEN norma_test.nilai ELSE 0 END) AS se'),
                        DB::raw('SUM(CASE WHEN norma.tipe = 2 THEN norma_test.nilai ELSE 0 END) AS wa'),
                        DB::raw('SUM(CASE WHEN norma.tipe = 3 THEN norma_test.nilai ELSE 0 END) AS an'),
                        DB::raw('SUM(CASE WHEN norma.tipe = 4 THEN norma_test.nilai ELSE 0 END) AS ge'),
                        DB::raw('SUM(CASE WHEN norma.tipe = 5 THEN norma_test.nilai ELSE 0 END) AS ra'),
                        DB::raw('SUM(CASE WHEN norma.tipe = 6 THEN norma_test.nilai ELSE 0 END) AS zr'),
                        DB::raw('SUM(CASE WHEN norma.tipe = 7 THEN norma_test.nilai ELSE 0 END) AS fa'),
                        DB::raw('SUM(CASE WHEN norma.tipe = 8 THEN norma_test.nilai ELSE 0 END) AS wu'),
                        DB::raw('SUM(CASE WHEN norma.tipe = 10 THEN norma_test.nilai ELSE 0 END) AS me'),
                        DB::raw('COUNT(CASE WHEN norma.tipe = 4 AND( nilai IS NULL OR nilai ="")THEN 1 ELSE NULL END) AS ge_null'),
                    )
                    ->where('norma_test.user_id',$this->user_id)
                    ->groupBy('users.email', 'norma_test.user_id') 
                    ->orderBy('norma_test.user_id', 'asc')->first();
        $this->normaTest = ($normaTest) ? json_decode(json_encode($normaTest), true) : null;

        if($normaTest){
            $se = KunciNorma::select('se')->where('rw',$normaTest->se)->where('tipe_usia',$tipe_usia)->first();
            $wa = KunciNorma::select('wa')->where('rw',$normaTest->wa)->where('tipe_usia',$tipe_usia)->first();
            $an = KunciNorma::select('an')->where('rw',$normaTest->an)->where('tipe_usia',$tipe_usia)->first();
            $ge = KunciNorma::select('ge')->where('rw',$normaTest->ge)->where('tipe_usia',$tipe_usia)->first();
            $ra = KunciNorma::select('ra')->where('rw',$normaTest->ra)->where('tipe_usia',$tipe_usia)->first();
            $zr = KunciNorma::select('zr')->where('rw',$normaTest->zr)->where('tipe_usia',$tipe_usia)->first();
            $fa = KunciNorma::select('fa')->where('rw',$normaTest->fa)->where('tipe_usia',$tipe_usia)->first();
            $wu = KunciNorma::select('wu')->where('rw',$normaTest->wu)->where('tipe_usia',$tipe_usia)->first();
            $me = KunciNorma::select('me')->where('rw',$normaTest->me)->where('tipe_usia',$tipe_usia)->first();
            $this->sw = [
                'se' => $se->se,
                'wa' => $wa->wa,
                'an' => $an->an,
                'ge' => $ge->ge,
                'ra' => $ra->ra,
                'zr' => $zr->zr,
                'fa' => $fa->fa,
                'wu' => $wu->wu,
                'me' => $me->me,
            ];   
            $this->total_rw =  $normaTest->se + $normaTest->wa + $normaTest->an + $normaTest->ge + $normaTest->ra + $normaTest->zr + $normaTest->fa + $normaTest->wu + $normaTest->me;   
            $total_sw = KunciIQ::select(strtolower($tipe_usia))->where('rw',$this->total_rw)->first();
            $this->total_sw = ($total_sw)? $total_sw->{strtolower($tipe_usia)} : 'gagal'; 
            $iq = KunciIQ::select('iq','kategori')->where('rw',$this->total_sw)->first();
            $this->iq = ($iq)? $iq->iq:null;
            $this->kategori = ($iq)? $iq->kategori:null;

        }
        
        
    }   

    public function render()
    {
        return view('livewire.norma.report.rekap-show');
    }
}
