@extends('layout.app')

@section('title', 'Fornecedores')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Contato</th>
                <th scope="col">Endereço</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">123456</th>
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
