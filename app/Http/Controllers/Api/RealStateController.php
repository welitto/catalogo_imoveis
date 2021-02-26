<?php

namespace App\Http\Controllers\Api;

use App\Api\ApiMessage;
use App\Models\RealState;
use App\Http\Controllers\Controller;
use App\Http\Requests\RealStateRequest;
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

    public function show($id)
    {
        try{
            
            $realState = $this->realState->findOrFail($id); //Mass Asignment

            return reponse()->json([
                'data' => $realState
            ], 200);
        }
        catch(\Exception $e)
        {
            $message = new ApiMessages($e->getMessage());
            return \response()->json($message->getMessage(), 401);
        }
    }

    public function store(RealStateRequest $request)
    {
        $data = $request->all();

        try{
            
            $realState = $this->realState->create($data); //Mass Asignment

            if(isset($data['categories']) && count($data['categories']) > 1)
            {
                $realState->categories()->sync($data['categories']);
            }

            return reponse()->json([
                'data' => [
                    'msg' => 'Imóvel cadastro com sucesso!'
                ]
            ], 200);
        }
        catch(\Exception $e)
        {
            $message = new ApiMessages($e->getMessage());
            return \response()->json($message->getMessage(), 401);
        }
    }

    public function update($id, RealStateRequest $request)
    {
        $data = $request->all();

        try{
            
            $realState = $this->realState->findOrFail($id);
            $realState->update($data);

            if(isset($data['categories']) && count($data['categories']) > 1)
            {
                $realState->categories()->sync($data['categories']);
            }

            return reponse()->json([
                'data' => [
                    'msg' => 'Imóvel atualizado com sucesso!'
                ]
            ], 200);
        }
        catch(\Exception $e)
        {
            $message = new ApiMessages($e->getMessage());
            return \response()->json($message->getMessage(), 401);
        }
    }

    public function destroy($id)
    {
        try{
            
            $realState = $this->realState->findOrFail($id);
            $realState->delete();

            return reponse()->json([
                'data' => [
                    'msg' => 'Imóvel removido com sucesso!'
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
