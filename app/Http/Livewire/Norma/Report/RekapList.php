<?php

namespace App\Http\Livewire\Norma\Report;

use Livewire\Component;
use App\Models\NormaTest;
use App\Models\NormaTestLog;
use App\Models\DataUserNorma;
use Livewire\WithPagination;
use DB;

class RekapList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $debug = true;
    public $prompt;

    protected $listeners = ['showKoreksiGe','showRekap'];


    /*----- Norma Test --------*/    
    public $test;

    /*----- Quiz Test WU--------*/
    public $no;
    public $quiz;
    public $quiz_id;
    public $a;
    public $b;
    public $c;
    public $d;
    public $e;
    public $k;
    public $wuquiz;

    public function showKoreksiGe($userId){
        $this->emit('getKoreksiGe',$userId);
    }

    public function showRekap($userId){
        $this->emit('getRekap',$userId);
    }

    public function deleteRekap($userId){              
        $delNormaTestLog = NormaTestLog::where('user_id', $userId);
        $delNormaTestLog->delete();
        $delNormaTest = NormaTest::where('user_id', $userId);
        $delNormaTest->delete();
        $delUserNorma = DataUserNorma::where('user_id', $userId);
        $delUserNorma->delete();
        $this->emit('reloadPage');
    }
   
    

    public function render()
    {        
        $rekapRecords = DB::table('norma_test')
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
                    ->groupBy('users.email', 'norma_test.user_id') 
                    ->orderBy('norma_test.user_id', 'asc')
                    ->paginate(10);
            
        return view('livewire.norma.report.rekap-list',['rekap' => $rekapRecords]);        
    }

}
