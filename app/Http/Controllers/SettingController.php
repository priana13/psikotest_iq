<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Setting;
use App\Models\StaticPage;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){

        $list_post = Post::all();      

        $setting = [
            "kontak" => StaticPage::name("kontak")->first()->page,
            "tentang" => StaticPage::name("tentang")->first()->page,
            "syarat_ketentuan" => StaticPage::name("syarat_ketentuan")->first()->page,
            "kebijakan" => StaticPage::name("kebijakan")->first()->page,
            "app_name" => Setting::where('name','app_name')->first(),
            "app_bio" => Setting::where('name','app_bio')->first()
        ];  

        return view('setting', compact('list_post', 'setting'));
    }

    public function update(Request $request){


        $request->validate([
            'kontak' => 'integer',
            'tentang' => 'integer',
            'syarat_ketentuan' => 'integer',
            'kebijakan' => 'integer'
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



        
        return back();


    }
}
