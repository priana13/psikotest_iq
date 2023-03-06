<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\QuestionImage;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);      

        $data['question'] = $question;

        $questionImage = $question->questionImages;	

        $soal = ['a', 'b', 'c', 'd', 'e'];

        foreach ($soal as $value) {

            $data['gambar_'.$value.'_edit'] = ( $questionImage->where('type' , $value)->first() ) ? 
            $questionImage->where('type' , $value)->first()->image:'';
        }
		
		// $data['gambar_a_edit'] = ( $questionImage->where('type' , 'a')->first() ) ? 
        //                             $questionImage->where('type' , 'a')->first()->image:'';

		// $data['gambar_b_edit'] = ( $questionImage->where('type' , 'a')->first() ) ? 
        //                             $questionImage->where('type' , 'a')->first()->image:'';

		// $data['gambar_c_edit'] = $questionImage->where('type' , 'c')->first();
		// $data['gambar_d_edit'] = $questionImage->where('type' , 'd')->first();
		// $data['gambar_e_edit'] = $questionImage->where('type' , 'e')->first();

        return view('livewire.questions.update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate([
            
        //     'soal' => 'required',		
        //     'status' => 'required',
        //     ]); 
    
        if($request->gambar_edit){

            $path_gambar =  $request->gambar_edit->store('public/photos');
            $path_gambar = explode('public/' , $path_gambar);
            $path_gambar = $path_gambar[1];	

        }


        $record = Question::find($request->id);
        
       
        $record->update([            
            'soal' => $request->soal,
            'a' => $request-> a,
            'b' => $request-> b,
            'c' => $request-> c,
            'd' => $request-> d,
            'e' => $request-> e,
            'val_a' => $request->val_a,
            'val_b' => $request->val_b,
            'val_c' => $request->val_c,
            'val_d' => $request->val_d,
            'val_e' => $request->val_e,

            'kc_jawaban' => $request-> kc_jawaban,			
            'status' => $request-> status
        ]);

        if($request->gambar_edit){

            $record->gambar = $path_gambar;
            $record->save();

        }			

        // input gambar a
        if($request->gambar_a){
            $path_gambar_a =  $request->gambar_a->store('public/photos');
            $path_gambar_a = explode('public/' , $path_gambar_a);
            $path_gambar_a = $path_gambar_a[1];					
            $gambar_a = QuestionImage::where('type' , 'a')->where('question_id', $request->selected_id)->first();

            if($gambar_a){

                $gambar_a->image = $path_gambar_a;
                $gambar_a->save();	

            }else{

                QuestionImage::create([
                    'question_id' => $record->id,
                    'type' => 'a',
                    'image' => $path_gambar_a
                ]);
            }

        }

        // input gambar b
        if($request->gambar_b){

            $path_gambar_b =  $request->gambar_b->store('public/photos');
            $path_gambar_b = explode('public/' , $path_gambar_b);
            $path_gambar_b = $path_gambar_b[1];	
            
            $gambar_b = QuestionImage::where('type' , 'b')->where('question_id', $request->selected_id)->first();
            
            if($gambar_b){

                $gambar_b->image = $path_gambar_b;
                $gambar_b->save();

            }else{

                QuestionImage::create([
                    'question_id' => $record->id,
                    'type' => 'b',
                    'image' => $path_gambar_b
                ]);

            }
            
        }

        // input gambar c
        if($request->gambar_c){

            $path_gambar_c =  $request->gambar_c->store('public/photos');
            $path_gambar_c = explode('public/' , $path_gambar_c);
            $path_gambar_c = $path_gambar_c[1];	
            
            $gambar_c = QuestionImage::where('type' , 'c')->where('question_id', $request->selected_id)->first();
            
            if($gambar_c){

                    $gambar_c->image = $path_gambar_c;
                    $gambar_c->save();

            }else{

                QuestionImage::create([
                    'question_id' => $record->id,
                    'type' => 'c',
                    'image' => $path_gambar_c
                ]);


            }
            
            
        }

        // input gambar d
        if($request->gambar_d){

            $path_gambar_d =  $request->gambar_d->store('public/photos');
            $path_gambar_d = explode('public/' , $path_gambar_d);
            $path_gambar_d = $path_gambar_d[1];	
            
            $gambar_d = QuestionImage::where('type' , 'd')->where('question_id', $request->selected_id)->first();
            
            if($gambar_d){

                    $gambar_d->image = $path_gambar_d;
                    $gambar_d->save();
            }else{

                QuestionImage::create([
                    'question_id' => $record->id,
                    'type' => 'd',
                    'image' => $path_gambar_d
                ]);


            }
            
        }

        // input gambar e
        if($request->gambar_e){

            $path_gambar_e =  $request->gambar_e->store('public/photos');
            $path_gambar_e = explode('public/' , $path_gambar_e);
            $path_gambar_e = $path_gambar_e[1];	
            
            $gambar_e = QuestionImage::where('type' , 'e')->where('question_id', $request->selected_id)->first();
            
            if($gambar_e){

                $gambar_e->image = $path_gambar_e;
                $gambar_e->save();

            }else{

                QuestionImage::create([
                    'question_id' => $record->id,
                    'type' => 'e',
                    'image' => $path_gambar_e
                ]);

            }
        }          
        
        session()->flash('message', 'Question Successfully updated.');

        return back();
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
