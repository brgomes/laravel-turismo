<div class="form-group">
    <label for="qty_passengers">Quantidade de passageiros</label>
    {!! Form::number('qty_passengers', null, ['class' => 'form-control', 'placeholder' => 'Quantidade de passageiros']) !!}
</div>

<div class="form-group">
    <label for="class">Classe</label>
    {!! Form::select('class', $classes, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="brand_id">Marca</label>
    {!! Form::select('brand_id', $brands, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <button class="btn btn-search">Enviar</button>
</div>