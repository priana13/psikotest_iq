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
    public $kat;
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
        // if($umur ==13){
        //     $tipe_usia = 'A';
        // }elseif($umur ==14){
        //     $tipe_usia = 'B';
        // }elseif($umur ==15){
        //     $tipe_usia = 'C';
        // }elseif($umur ==16){
        //     $tipe_usia = 'D';
        // }elseif($umur ==17){
        //     $tipe_usia = 'E';
        // }elseif($umur ==18){
        //     $tipe_usia = 'F';
        // }elseif($umur ==19 || $umur == 20){
        //     $tipe_usia = 'G';
        // }elseif($umur > 20 && $umur < 25){
        //     $tipe_usia = 'H';
        // }elseif($umur > 24 && $umur < 29){
        //     $tipe_usia = 'I';
        // }elseif($umur > 28 && $umur < 34){
        //     $tipe_usia = 'J';
        // }elseif($umur > 33 && $umur < 40){
        //     $tipe_usia = 'K';
        // }elseif($umur > 39 && $umur <46){
        //     $tipe_usia = 'L';
        // }elseif($umur > 44){
        //     $tipe_usia = 'M';
        // }else{
        //     $tipe_usia = 'N';
        // }

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



        $this->userNorma = ($userNorma) ? json_decode(json_encode($userNorma), true) : null;
         $normaTest = DB::table('norma_test_log')
                            ->leftJoin('norma_test', function($join) {
                                $join->on('norma_test.user_id', '=', 'norma_test_log.user_id')
                                     ->on('norma_test.test_id', '=', 'norma_test_log.test_id');
                            })
                            ->leftJoin('norma', 'norma.id', '=', 'norma_test_log.test_id')
                            ->leftJoin('users', 'users.id', '=', 'norma_test_log.user_id')
                            ->select(
                                'norma_test_log.user_id',
                                'users.email',
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
                            ->where('norma_test_log.user_id',$this->user_id)
                            ->groupBy('users.email', 'norma_test_log.user_id')
                            ->orderBy('norma_test_log.user_id', 'asc')->first();
        /*$normaTest = DB::table('norma_test')
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
                        DB::raw('SUM(CASE WHEN norma.tipe = 10 THEN norma_test.nilai ELSE 0 END) AS me')
                    )
                    ->where('norma_test.user_id',$this->user_id)
                    ->groupBy('users.email', 'norma_test.user_id') 
                    ->orderBy('norma_test.user_id', 'asc')->first();*/
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
            $this->iq = ($iq)? $iq->iq:0;
            /*$this->kat = [
                'se' => ($normaTest->se) ? $this->getKategori($normaTest->se):$this->getKategori(0),
                'wa' => ($normaTest->wa) ? $this->getKategori($normaTest->wa):$this->getKategori(0),
                'an' => ($normaTest->an) ? $this->getKategori($normaTest->an):$this->getKategori(0),
                'ge' => ($normaTest->ge) ? $this->getKategori($normaTest->ge):$this->getKategori(0),
                'ra' => ($normaTest->ra) ? $this->getKategori($normaTest->ra):$this->getKategori(0),
                'zr' => ($normaTest->zr) ? $this->getKategori($normaTest->zr):$this->getKategori(0),
                'fa' => ($normaTest->fa) ? $this->getKategori($normaTest->fa):$this->getKategori(0),
                'wu' => ($normaTest->wu) ? $this->getKategori($normaTest->wu):$this->getKategori(0),
                'me' => ($normaTest->me) ? $this->getKategori($normaTest->me):$this->getKategori(0)
            ];*/   

            $this->kat = [
                'se' => ($se->se) ? $this->getKategori($se->se):$this->getKategori(0),
                'wa' => ($wa->wa) ? $this->getKategori($wa->wa):$this->getKategori(0),
                'an' => ($an->an) ? $this->getKategori($an->an):$this->getKategori(0),
                'ge' => ($ge->ge) ? $this->getKategori($ge->ge):$this->getKategori(0),
                'ra' => ($ra->ra) ? $this->getKategori($ra->ra):$this->getKategori(0),
                'zr' => ($zr->zr) ? $this->getKategori($zr->zr):$this->getKategori(0),
                'fa' => ($fa->fa) ? $this->getKategori($fa->fa):$this->getKategori(0),
                'wu' => ($wu->wu) ? $this->getKategori($wu->wu):$this->getKategori(0),
                'me' => ($me->me) ? $this->getKategori($me->me):$this->getKategori(0),
            ]; 
          
            $this->kategori = ($this->iq > 0)? $iq->kategori:'MENTALLY DEFECTIVE';

        }
                
    }   

    private function getKategori($kat){
        $response = '';
        if(($kat > 80)&&($kat < 95)){
            $response = 'RENDAH';
        }elseif(($kat > 94)&&($kat < 100)){
            $response = 'SEDANG';
        }elseif(($kat > 99)&&($kat < 105)){
            $response = 'CUKUP';
        }elseif(($kat > 104)&&($kat < 119)){
            $response = 'TINGGI';
        }elseif(($kat > 118)){
            $response = 'SANGAT TINGGI';
        }else{
            $response = 'SANGAT RENDAH';
        }
        return $response;
    }

    public function render()
    {
        return view('livewire.norma.report.rekap-show');
    }
}
