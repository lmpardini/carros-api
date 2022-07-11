<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class VeiculosController extends Controller
{
    public function show()
    {
        try {
            $data = Veiculo::get();

            return response()->json(["data" => $data, "success" => true]);
        } catch(\Throwable|\Exception $e) {
            return response()->json(["message" => $e->getMessage(), "success" => false], 400);
        }
    }

    public function index($id)
    {
        try {

            if (!$id){
                throw new \Exception('Id é obrigatório');
            }

            $data = Veiculo::find($id);

            if (!$data) {
                throw new \Exception('Id não encontrado');
            }

            return response()->json(["data" => $data, "success" => true]);
        } catch(\Throwable|\Exception $e) {
            return response()->json(["message" => $e->getMessage(), "success" => false], 400);
        }
    }

    public function find(Request $request)
    {
        $this->validate($request, [
            'q' => 'required|min:2'
        ]);

        try {

            $data = Veiculo::where('veiculo', 'LIKE','%'. $request->q. '%')->get();

            if (!$data) {
                throw new \Exception('Veiculo não encontrado');
            }

            return response()->json(["data" => $data, "success" => true]);
        } catch(\Throwable|\Exception $e) {
            return response()->json(["message" => $e->getMessage(), "success" => false], 400);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'veiculo' => 'required|string',
            'marca' => 'required|string',
            'ano' => 'required|integer',
        ]);

        try {

            $veiculo = new Veiculo();

            $veiculo->veiculo = $request->veiculo;
            $veiculo->marca = $request->marca;
            $veiculo->ano = $request->ano;
            $veiculo->descricao = $request->descricao;
            $veiculo->vendido = false;

            $veiculo->save();

            return response()->json(["data" => 'Veiculo cadastrado com sucesso!', "success" => true]);
        } catch(\Throwable|\Exception $e) {
            return response()->json(["message" => $e->getMessage(), "success" => false], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'veiculo' => 'required|string',
            'marca' => 'required|string',
            'ano' => 'required|integer',
            'vendido' => 'required|boolean',

        ]);

        try {

            $veiculo = Veiculo::find($id);

            if (!$veiculo) {
                throw new \Exception('Id não encontrado');
            }

            $veiculo->veiculo = $request->veiculo;
            $veiculo->marca = $request->marca;
            $veiculo->ano = $request->ano;
            $veiculo->descricao = $request->descricao;
            $veiculo->vendido = $request->vendido;

            $veiculo->save();

            return response()->json(["data" => 'Veiculo atualizado com sucesso!', "success" => true]);
        } catch(\Throwable|\Exception $e) {
            return response()->json(["message" => $e->getMessage(), "success" => false], 400);
        }
    }

    public function destroy($id)
    {
        try {

            $veiculo = Veiculo::find($id);

            if (!$veiculo) {
                throw new \Exception('Id não encontrado');
            }

            $veiculo->delete();

            return response()->json(["data" => 'Veiculo deletado com sucesso!', "success" => true]);
        } catch(\Throwable|\Exception $e) {
            return response()->json(["message" => $e->getMessage(), "success" => false], 400);
        }

    }


}
