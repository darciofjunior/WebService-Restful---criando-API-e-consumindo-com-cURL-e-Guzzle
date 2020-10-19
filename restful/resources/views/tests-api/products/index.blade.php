@extends('tests-api.layouts.template')

@section('content')

<h1>Exibição dos Produtos</h1>

@if( session('success') )
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('products.create') }}" class="btn btn-success">
    Cadastrar +
</a>

<table class="table table-striped">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Ações</th>
    </tr>
    @forelse($products->data as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>{{ $product->description }}</td>
        <td>
            <a href="{{ route('products.edit', $product->id) }}">
                Editar
            </a>
            <a href="{{ route('products.show', $product->id) }}">
                View
            </a>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="2">
            Nenhum Produto a ser Listado !!!
        </td>
    </tr>
    @endforelse
</table>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    @if($products->meta->pagination->page > 1)
        <li class="page-item">
            <a href="{{ route('products.paginate', $products->meta->pagination->page - 1) }}" class="page-link">
                <<
            </a>
        </li>
    @endif

    <li class="action">
        <a href="#" class="page-link">
            {{ $products->meta->pagination->page }}
        </a>
    </li>

    @if($products->meta->pagination->page < $products->meta->pagination->pages)
        <li class="page-item">
            <a href="{{ route('products.paginate', $products->meta->pagination->page + 1) }}" class="page-link">
                >>
            </a>
        </li>
    @endif
  </ul>
</nav>

@endsection