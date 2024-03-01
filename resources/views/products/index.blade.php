@extends('layout.app')

@section('title', 'Produtos')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('products_create') }}" class="btn btn-success">Cadastrar Produto</a>
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
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->code }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category }}</td>
                    <td>{{ $product->supplier->name }}</td>
                    <td>{{ $product->amount }}</td>
                    <td>
                        <button class="btn btn-primary">Editar</button>
                        <button class="btn btn-danger">Excluir</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
