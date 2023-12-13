<?php

namespace App\Console\Commands;

use App\Models\Examevent;
use Illuminate\Console\Command;

class KurangiWaktu extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pr:kurangi-waktu';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengurangi waktu ujian';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $examevents = Examevent::where('sisa_waktu' , '>=' , 1)->get();


        foreach ($examevents as $exam) {

           $exam->sisa_waktu -= 1;
           $exam->save();
           
        }

        $this->info('Waktu berhasil dikurangi');
    }
}
