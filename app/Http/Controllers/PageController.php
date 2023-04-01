<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(6);

        $title = 'Blog';

        return view('pages.blog', compact('posts' , 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();

        return view('livewire.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([           
            'category_id' => 'required',
            'slug' => 'required',
            'title' => 'required',
            'body' => 'required',
            'status' => 'required',
            'gambar' => 'image'
            ]);

        $path_gambar = null;       

        if($request->gambar){

            $path_gambar =  $request->gambar->store('public/photos');
            $path_gambar = explode('public/' , $path_gambar);
            $path_gambar = $path_gambar[1];	
        }

      
        Post::create([ 
                'user_id' => auth()->user()->id,
                'category_id' => $request-> category_id,
                'slug' => $request-> slug,
                'title' => $request-> title,
                'body' => $request-> body,
                'status' => $request-> status,
                'image' => $path_gambar
            ]);


        return redirect()->route('admin.posts')->with('message', 'Page Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        if(!$post){ return redirect(404);}

        return view('pages.single_page', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);   

        $categories = Category::all();    

        return view('livewire.posts.update', compact('post', 'categories'));
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
        $request->validate([           
            'category_id' => 'required',
            'slug' => 'required',
            'title' => 'required',
            'body' => 'required',
            'status' => 'required',
            'gambar' => 'image'
            ]);
    
        Post::where('id', $id)->update([ 
                'user_id' => auth()->user()->id,
                'category_id' => $request-> category_id,
                'slug' => $request-> slug,
                'title' => $request-> title,
                'body' => $request-> body,
                'status' => $request-> status
            ]);
     

        if($request->gambar){

            $path_gambar =  $request->gambar->store('public/photos');
            $path_gambar = explode('public/' , $path_gambar);
            $path_gambar = $path_gambar[1];	

            Post::where('id', $id)->update([              
                'image' => $path_gambar
            ]);

        }


        return redirect()->route('admin.posts')->with('message', 'Page Berhasil Dipudate');
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
