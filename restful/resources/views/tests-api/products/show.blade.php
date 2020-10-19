@extends('tests-api.layouts.template')

@section('content')

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="action">
        <a href="{{ route('products.index') }}" class="page-link">
            Voltar
        </a>
    </li>
  </ul>
</nav>

<h1>Name: {{ $product->data->name }}</h1>
<h2>Description: {{ $product->data->description }}</h2>

{!! Form::open(['method' => 'DELETE', 'class' => 'form', 'route' => ['products.destroy', $product->data->id]]) !!}

<div class="form-group">
    {!! Form::submit('Deletar', ['class'=> 'btn btn-danger']) !!}
</div>

{!! Form::close() !!}

@endsection