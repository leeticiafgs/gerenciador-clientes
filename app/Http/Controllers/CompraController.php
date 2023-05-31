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
        $compras = Compra::with('cliente')->get();
        $clientes = Cliente::all();
        
        return view('compras.index', compact('compras', 'clientes'));
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
        // Busca compra pelo ID
        $compra = Compra::findOrFail($id);

        $user_id_compra = $compra->cliente_id;

        // Busca usuario que fez a compra
        $cliente = Cliente::where('id', $user_id_compra)->first(); // Obtém os clientes com base no ID do usuário
        
        return view('compras.show', compact('compra', 'cliente'));
    }

    public function edit($id)
    {
        //obtem dados da compra
        $compra = Compra::findOrFail($id);

        //obtem dados do cliente
        $userId = Auth::id(); // Obtém o ID do usuário atualmente autenticado
        $cliente = Cliente::where('user_id', $userId)->first(); // Obtém os clientes com base no ID do usuário
       
       
        return view('compras.edit', compact('compra', 'cliente'));
    }

    public function update(Request $request, $id)
    {

        // Atualização dos dados do cliente no banco de dados
        $compra = Compra::findOrFail($id);

        $compra->cliente_id = $request->cliente_id;
        $compra->data_compra = $request->data_compra;
        $compra->descricao = $request->descricao;
        $compra->valor = $request->valor;    

        $compra->save();

        // Redirecionamento para a página de listagem de clientes
        return redirect('/compras')->with('success', 'Os dados da compra foram atualizados com sucesso!');
    }

    public function destroy($id)
    {
        $compra = Compra::findOrFail($id);
        $compra->delete();

        return redirect('/compras')->with('success', 'Compra excluida com sucesso!');
    }
}
