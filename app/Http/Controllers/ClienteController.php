<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // Obtém o ID do usuário atualmente autenticado
        $clientes = Cliente::where('user_id', $userId)->get(); // Obtém os clientes com base no ID do usuário

        // Retornar a view com os dados dos clientes
        return view('clientes.index', ['clientes' => $clientes]);
    }

    public function create()
    {
        // Exibir formulário para criar um novo cliente
        return view('clientes.create');
    }

    public function store(Request $request)
    {
       
        $cliente = new Cliente;

        $cliente->nome = $request->nome;
        $cliente->data_nascimento = $request->data_nascimento;
        $cliente->email = $request->email;
        $cliente->telefone = $request->telefone;
        $cliente->user_id = auth()->id(); // Atribui o ID do usuário autenticado ao cliente
  
         $cliente->save();

        return redirect('/clientes')->with('success', 'Cliente criado com sucesso!');
    }

    // public function show($id)
    // {
    //     // Obter informações de um cliente específico do banco de dados
    //     $cliente = Cliente::findOrFail($id);

    //     // Retornar a view com as informações do cliente
    //     return view('clientes.show', ['cliente' => $cliente]);
    // }

    // public function edit($id)
    // {
    //     // Obter informações de um cliente específico do banco de dados
    //     $cliente = Cliente::findOrFail($id);

    //     // Exibir formulário para editar o cliente
    //     return view('clientes.edit', ['cliente' => $cliente]);
    // }

    // public function update(Request $request, $id)
    // {
    //     // Validação dos dados do formulário
    //     $request->validate([
    //         'nome' => 'required',
    //         'email' => 'required|email',
    //         // Outras regras de validação
    //     ]);

    //     // Atualização dos dados do cliente no banco de dados
    //     $cliente = Cliente::findOrFail($id);
    //     $cliente->update($request->all());

    //     // Redirecionamento para a página de listagem de clientes
    //     return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
    // }

    // public function destroy($id)
    // {
    //     // Excluir um cliente do banco de dados
    //     $cliente = Cliente::findOrFail($id);
    //     $cliente->delete();

    //     // Redirecionamento para a página de listagem de clientes
    //     return redirect()->route('clientes.index')->with('success', 'Cliente excluído com sucesso!');
    // }
}