<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = $this->category->paginate(10);

        return response()->json($category, 200);
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
        $data = $request->all();

        try{
            
            $category = $this->category->create($data); //Mass Asignment

            return reponse()->json([
                'data' => [
                    'msg' => 'Categoria cadastra com sucesso!'
                ]
            ], 200);
        }
        catch(\Exception $e)
        {
            $message = new ApiMessages($e->getMessage());
            return \response()->json($message->getMessage(), 401);
        }
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
        try{
            
            $category = $this->category->findOrFail($id); //Mass Asignment

            return reponse()->json([
                'data' => $category
            ], 200);
        }
        catch(\Exception $e)
        {
            $message = new ApiMessages($e->getMessage());
            return \response()->json($message->getMessage(), 401);
        }
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
        //
        $data = $request->all();

        try{
            
            $category = $this->category->findOrFail($id);
            $category->update($data);

            return reponse()->json([
                'data' => [
                    'msg' => 'Categoria atualizada com sucesso!'
                ]
            ], 200);
        }
        catch(\Exception $e)
        {
            $message = new ApiMessages($e->getMessage());
            return \response()->json($message->getMessage(), 401);
        }
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
        try{
            
            $category = $this->category->findOrFail($id);
            $category->delete();

            return reponse()->json([
                'data' => [
                    'msg' => 'Categoria removida com sucesso!'
                ]
            ], 200);
        }
        catch(\Exception $e)
        {
            $message = new ApiMessages($e->getMessage());
            return \response()->json($message->getMessage(), 401);
        }
    }
}
