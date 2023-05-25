<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Cliente;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::all();
        return view('compras.index', compact('compras'));
    }

    public function create()
    {

        $userId = Auth::id(); // Obtém o ID do usuário atualmente autenticado
        $clientes = Cliente::where('user_id', $userId)->get(); // Obtém os clientes com base no ID do usuário
        return view('compras.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $compra = new Compra; //Instancia novo cliente e recebe os dados do request abaixo


        $compra->cliente_id = $request->cliente_id;
        $compra->data_compra = $request->data_compra;
        $compra->descricao = $request->descricao;
        $compra->valor = $request->valor;    

        $compra->save(); // Salva no BD

        return redirect('/compras')->with('success', 'Compra incluida com sucesso!');
    }

    public function show($id)
    {
        $compra = Compra::findOrFail($id);
        return view('compras.show', compact('compra'));
    }

    public function edit($id)
    {
        $compra = Compra::findOrFail($id);
        return view('compras.edit', compact('compra'));
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados recebidos do formulário
        $validatedData = $request->validate([
            'produto' => 'required',
            'quantidade' => 'required|numeric',
            // Outros campos necessários para a compra
        ]);

        // Atualização dos dados da compra existente
        $compra = Compra::findOrFail($id);
        $compra->produto = $request->produto;
        $compra->quantidade = $request->quantidade;
        // Atualize outros campos necessários para a compra
        $compra->save();

        return redirect()->route('compras.index')->with('success', 'Compra atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $compra = Compra::findOrFail($id);
        $compra->delete();

        return redirect()->route('compras.index')->with('success', 'Compra excluída com sucesso!');
    }
}
