@extends('layout.app')

@section('title', 'Fornecedores')

@section('content')

    @include('includes.success')
    <a href="{{ route('suppliers_create') }}" class="btn btn-success">Cadastrar Fornecedor</a>
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
            @foreach ($suppliers as $supplier)
                <tr>
                    <th scope="row">{{ $supplier->id }}</th>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->getContactInfoForIndex() }}</td>
                    <td>{{ $supplier->getFormattedAddressForIndex() }}</td>
                    <td>
                        <a href="{{ route('supplier_edit', ['id' => $supplier->id]) }}" class="btn btn-primary">Editar</a>
                        <button type="button" class="btn btn-danger delete-supplier"
                            data-route="{{ route('supplier_destroy', ['id' => $supplier->id]) }}">Excluir</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('scripts')
    <script>
        function confirmSupplierDelete() {
            var route = $(this).data('route');
            if (confirm('Tem certeza que deseja excluir este fornecedor?')) {
                window.location.href = route;
            }
        }

        $(document).delegate('.delete-supplier', 'click', confirmSupplierDelete)
    </script>

@endsection
