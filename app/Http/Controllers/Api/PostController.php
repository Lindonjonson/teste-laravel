<?php

namespace App\Http\Controllers\Api;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $post;
    public function __construct(Post $post){
        $this->post = $post;
    }

    public function public()
    {
        $post = $this->post::orderBy('created_at', 'desc')->get();


       // $post = $this->post->paginate('10'); //pegando apenas os 10 primeiros
        return response()->json($post, 200);
    }

    public function index()
    {
       // $post = $this->post->all();
        $post = auth('api')->user()->post;
        

       // $post = $this->post->paginate('10'); //pegando apenas os 10 primeiros
        return response()->json($post, 200);
    }
    public function show($id){
        try {
            $post = auth()->user()->post()->findOrFail($id);  //somente post do usuario 
            //$post = $this->post->findOrFail($id);
           
            return response()->json([
                'data' => $post
                ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
    public function store(Request $request){
        $data = $request->all();
        try {
            $data ['user_id'] = auth()->user()->id;

            $post = $this->post->create($data);

            return response()->json([
                'data' => [
                    'msg' => 'Post cadastrado com sucesso!'
                ]
                ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
      

    }
    public function update($id, Request $request){
        $data = $request->all();

        try {

            $post = auth()->user()->post()->findOrFail($id); 
            $post->update($data);
            return response()->json([
                'data' => [
                    'msg' => 'Post Atualizado com sucesso!'
                ]
                ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
    public function destroy($id){

        try {

            $post = auth()->user()->post()->findOrFail($id); 
            $post->delete();
            return response()->json([
                'data' => [
                    'msg' => 'Post Removido com sucesso!'
                ]
                ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

}
