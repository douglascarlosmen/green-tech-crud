@extends('layout.app')

@section('title', 'Produtos')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Preço Unit.</th>
                <th scope="col">Categoria</th>
                <th scope="col">Fornecedor</th>
                <th scope="col">Qntd. Estoque</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">123456</th>
                <td>Valor 1</td>
                <td>Valor 1</td>
                <td>Valor 1</td>
                <td>Valor 1</td>
                <td>Valor 1</td>
                <td>Valor 1</td>
                <td>
                    <button class="btn btn-primary">Editar</button>
                    <button class="btn btn-danger">Excluir</button>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
