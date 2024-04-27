<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Exam;
use App\Models\StaticPage;
use App\Models\TryoutExam;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){

        $list_post = Post::all();      
        $list_category = Category::all();

        $setting = [
            "kontak" => StaticPage::name("kontak")->first()->page,
            "tentang" => StaticPage::name("tentang")->first()->page,
            "syarat_ketentuan" => StaticPage::name("syarat_ketentuan")->first()->page,
            "kebijakan" => StaticPage::name("kebijakan")->first()->page,
            "app_name" => Setting::where('name','app_name')->first(),
            "app_bio" => Setting::where('name','app_bio')->first(),
            "pengumuman" => Setting::where('name','pengumuman')->first(),
            "tips_and_trick" => Setting::where('name','tips_and_trick')->first(),
            "biaya_offline" => Setting::where('name','biaya_offline')->first()
        ];  

        $exams = Exam::get();

        $tryout_1 = TryoutExam::where('name', 'Kecerdasan')->first();        
        $this->cekTryout($tryout_1);

        $tryout_2 = TryoutExam::where('name', 'Kepribadian')->first();       

        $tryout_3 = TryoutExam::where('name', 'Sikap Kerja')->first();      

        return view('setting', compact(
            'list_post', 
            'setting', 
            'list_category' , 
            'exams',
            'tryout_1',
            'tryout_2',
            'tryout_3'
        ));
    }

    public function update(Request $request){


        $request->validate([
            'kontak' => 'integer',
            'tentang' => 'integer',
            'syarat_ketentuan' => 'integer',
            'kebijakan' => 'integer',
            'pengumuman' => 'string',
            'biaya_offline' => 'integer'
        ]);



        // setting App Name
        $app_name = Setting::where('name','app_name')->first();
        ($request->app_name == NULL)?       
            $app_name->value = "Arsta Media":
            $app_name->value = $request->app_name; 
        $app_name->save();

        // setting App Bio
        $app_bio = Setting::where('name','app_bio')->first();
        ($request->app_bio== NULL)?       
            $app_bio->value = "Merupakan penyedia pembelajaran dan pelatihan berbasis digital yang bersifat personal.":
            $app_bio->value = $request->app_bio; 
        $app_bio->save();

        // setting Pengumuman
        $pengumuman = Setting::where('name','pengumuman')->first();           
        $pengumuman->value = $request->pengumuman; 
        $pengumuman->save();     
        
        // setting offline price
        $pengumuman = Setting::where('name','biaya_offline')->first();           
        $pengumuman->value = $request->biaya_offline; 
        $pengumuman->save();


        // update kontak
        $setting_kontak = StaticPage::name('kontak')->first();
        ($request->kontak == 0)?       
            $setting_kontak->post_id = NULL:
            $setting_kontak->post_id = $request->kontak; 
        $setting_kontak->save();


        // setting tentang
        $setting_tentang = StaticPage::name('tentang')->first();
        ($request->tentang == 0)?       
            $setting_tentang->post_id = NULL:
            $setting_tentang->post_id = $request->tentang; 
        $setting_tentang->save();


        // setting syarat_ketentuan
        $setting_syarat_ketentuan = StaticPage::name('syarat_ketentuan')->first();
        ($request->syarat_ketentuan == 0)?       
            $setting_syarat_ketentuan->post_id = NULL:
            $setting_syarat_ketentuan->post_id = $request->syarat_ketentuan; 
        $setting_syarat_ketentuan->save();

        // setting kebijakan
        $setting_kebijakan = StaticPage::name('kebijakan')->first();
        ($request->kebijakan == 0)?       
            $setting_kebijakan->post_id = NULL:
            $setting_kebijakan->post_id = $request->kebijakan; 
        $setting_kebijakan->save();

        // setting Tips & Trick
        $setting_kebijakan = StaticPage::name('kebijakan')->first();
        ($request->kebijakan == 0)?       
            $setting_kebijakan->post_id = NULL:
            $setting_kebijakan->post_id = $request->kebijakan; 
        $setting_kebijakan->save();

        // setting Tips & Trick
        if($request->tips_and_trick != 0) {

            $tips_and_trick = Setting::where('name','tips_and_trick')->first();
            if(!$tips_and_trick){
                Setting::create(['name' => 'tips_and_trick','value' => $request->tips_and_trick]);
            }else{
                $tips_and_trick->value = $request->tips_and_trick;
                $tips_and_trick->save();
            }

        }


        // Setting Tryout

        $tryout_1 = TryoutExam::where('name', 'Kecerdasan')->first();
        $tryout_1->exam_id = $request->tryout_1;
        $tryout_1->petunjuk_timmer = $request->petunjuk_timmer_1;
        $tryout_1->save();

        $tryout_2 = TryoutExam::where('name', 'Kepribadian')->first();
        $tryout_2->exam_id = $request->tryout_2;
        $tryout_2->petunjuk_timmer = $request->petunjuk_timmer_2;
        $tryout_2->save();

        $tryout_3 = TryoutExam::where('name', 'Sikap Kerja')->first();
        $tryout_3->exam_id = $request->tryout_3;
        $tryout_3->petunjuk_timmer = $request->petunjuk_timmer_3;
        $tryout_3->save();         
        
        return back();


    }

    private function cekTryout($tryout){

        if($tryout == null){

            $exams = [
                "Kecerdasan" => 23,
                "Kepribadian" => 27,
                "Sikap Kerja" => 39
            ];
    
            foreach ($exams as $key => $value) {
                
                TryoutExam::create([
                    'name' => $key,
                    'exam_id' => $value
                ]);
    
            }


        }


    }
}
