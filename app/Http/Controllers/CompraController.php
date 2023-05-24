<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::all();
        return view('compras.index', compact('compras'));
    }

    public function create()
    {
        return view('compras.create');
    }

    public function store(Request $request)
    {
        // Validação dos dados recebidos do formulário
        $validatedData = $request->validate([
            'produto' => 'required',
            'quantidade' => 'required|numeric',
            // Outros campos necessários para a compra
        ]);

        // Criação de uma nova compra
        $compra = new Compra;
        $compra->produto = $request->produto;
        $compra->quantidade = $request->quantidade;
        // Preencha outros campos necessários para a compra
        $compra->save();

        return redirect()->route('compras.index')->with('success', 'Compra criada com sucesso!');
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
