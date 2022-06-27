<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(Request $request){
        return view('app.fornecedor.index');
    }
    public function listar(Request $request){
        $fornecedores = Fornecedor::with('produtos')->where('nome', 'like', '%'.$request->input('nome').'%')
        ->where('site', 'like', '%'.$request->input('site').'%')
        ->where('uf', 'like', '%'.$request->input('uf').'%')
        ->where('email', 'like', '%'.$request->input('email').'%')
        ->paginate(10);
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request){
        
        $msg = '';
        //Inclusão
        if($request->input('_token') != '' && $request->input('id') == ''){
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email',
            ];
            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo Nome deve ter no mínino 3 caracteres',
                'nome.max' => 'O campo Nome deve ter no máximo 40 caracteres',
                'nome.min' => 'O campo UF deve ter no mínino 2 caracteres',
                'nome.max' => 'O campo UF deve ter no máximo 2 caracteres',
                'email' => 'O campo E-mail não foi preenchido corretamente',
            ];
            $request->validate($regras,$feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());
            $msg = 'Cadastro Realizado com Sucesso!';
        }
        //Edição
        elseif($request->input('_token') != '' && $request->input('id') != ''){
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());
            if($update){
                $msg = "Atualização realizada com sucesso";
            }else{
                $msg = "Atualização apresentou problema";
            }
            return redirect()->route('app.fornecedor.adicionar', ['id' => $request->input('id'),'msg' => $msg]);
        }
        
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = ''){
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir($id){
        $fornecedor = Fornecedor::find($id);
        $fornecedor->delete($id);

        return redirect()->route('app.fornecedor');
    }
}
