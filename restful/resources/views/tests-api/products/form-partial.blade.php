<label for="">Name: </label>
<div class="form-group">
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name', 'required']) !!}
</div>

<label for="">Description: </label>
<div class="form-group">
    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Enviar', ['class'=> 'btn btn-success']) !!}
</div>