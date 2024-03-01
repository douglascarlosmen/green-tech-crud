@extends('layout.app')

@section('title', 'Produtos')

@section('content')

    @include('includes.success')
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
                        <a href="{{ route('products_edit', ['id' => $product->id]) }}" class="btn btn-primary">Editar</a>
                        <button type="button" class="btn btn-danger delete-product" data-route="{{ route('products_destroy', ['id' => $product->id]) }}">Excluir</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('scripts')
    <script>
        function confirmProductDelete() {
            var route = $(this).data('route');
            if (confirm('Tem certeza que deseja excluir este produto?')) {
                window.location.href = route;
            }
        }

        $(document).delegate('.delete-product', 'click', confirmProductDelete)
    </script>

@endsection
