@extends('tests-api.layouts.template')

@section('content')

<h1>Editar Produto: {{ $product->data->name }}</h1>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="action">
        <a href="{{ route('products.index') }}" class="page-link">
            Voltar
        </a>
    </li>
  </ul>
</nav>

{!! Form::model($product->data, ['route' => ['products.update', $product->data->id], 'class' => 'form']) !!}

    @include('tests-api.products.form-partial')

{!! Form::close() !!}

@endsection