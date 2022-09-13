<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    //
    public function index(){
        $posts = Post::latest()->paginate(6);   // Post::orderBy("titel","ASC") -- Post::where("titel", "=", "le titre cherché")


        return view('home')->with([
            'posts' =>  $posts
            
        ]);
    }

    public function show($slug){               // $slug 

        $post = Post::where('slug', $slug)->first();             // ::where('slug', $slug)->first()
        return view('show')->with([          // Dont forget to replace the $id by $slug in the home page ;)

            'post' => $post

        ]);

    }

    public function create(){
        return view('create');
    }

    public function store(PostRequest $request){
                                                    // dd($request->all())  to show the parameters insirted by the user;

      /*  $post = new Post();
        $post->titel = $request->titel;
        $post->slug = Str::slug($request->titel);
        $post->body = $request->body;
        $post->image = "https://via.placeholder.com/640x480.png/0099bb?text=other Post";
        $post->save();

    */
        if ($request->has('image')) {
            $file = $request->image;
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'),$image_name);
        }    

        Post::create([
            'titel' => $request->titel,
            'body'  => $request->body,
            'image' => $image_name,
            'slug'  => Str::slug($request->titel),
            'user_id' => auth()->user()->id

        ]);
        return redirect()->route('home')->with([
            'succes' => 'article ajouté'
        ]);

        
    }
    public function edit($slug){

        $post = Post::where('slug', $slug)->first();             // ::where('slug', $slug)->first()
        return view('edit')->with([          // Dont forget to replace the $id by $slug in the home page ;)

            'post' => $post

        ]);
        
    }

    public function update(PostRequest $request, $slug){

                                  //  We can use the "update" method just like the one we used in the store function
        $post = Post::where('slug', $slug)->first();
        if ($request->has('image')) { 
            $file = $request->image;
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'),$image_name);
            unlink(public_path('uploads').'/'.$post->image);
            
            $post->image = $image_name;
        } 
        $post->titel = $request->titel;
        $post->slug = Str::slug($request->titel);
        $post->body = $request->body;
        $post->image = $post->image;
        $post->user_id = auth()->user()->id;
        
        $post->save();
        return redirect()->route('home2')->with([
            'succes' => 'article modifié'
        ]);

    }
    public  function delete($slug){
        $post = Post::where('slug', $slug)->first();
        unlink(public_path('uploads').'/'.$post->image);
        $post->delete();
        return redirect()->route('home')->with([
            'succes' => 'article supprimé'
        ]);

    }
}
