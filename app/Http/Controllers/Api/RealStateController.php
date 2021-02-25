<?php

namespace App\Http\Controllers\Api;

use App\Models\RealState;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RealStateController extends Controller
{
    //
    private $realState;

    public function __construct(RealState $realState)
    {
        $this->realState = $realState;
    }

    public function index()
    {
        $realState = $this->realState->paginate(10);

        return response()->json($realState, 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        try{
            
            $realState = $this->realState->create($data); //Mass Asignment

            return reponse()->json([
                'data' => [
                    'msg' => 'Imóvel cadastro com sucesso!'
                ]
            ], 200);
        }
        catch(\Exception $e)
        {
            return \response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function update($id, Request $request)
    {
        $data = $request->all();

        try{
            
            $realState = $this->realState->findOrFail($id);
            $realState->update($data);

            return reponse()->json([
                'data' => [
                    'msg' => 'Imóvel atualizado com sucesso!'
                ]
            ], 200);
        }
        catch(\Exception $e)
        {
            return \response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
