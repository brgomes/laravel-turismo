<div class="form-group">
    <label for="plane_id">Escolha o avião</label>
    {!! Form::select('plane_id', $planes, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="airport_origin_id">Origem</label>
    {!! Form::select('airport_origin_id', $airports, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="airport_destination_id">Destino</label>
    {!! Form::select('airport_destination_id', $airports, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="date">Data</label>
    {!! Form::date('date', null, ['class' => 'form-control', 'placeholder' => 'Data']) !!}
</div>

<div class="form-group">
    <label for="time_duration">Duração</label>
    {!! Form::time('time_duration', null, ['class' => 'form-control', 'placeholder' => 'Duração']) !!}
</div>

<div class="form-group">
    <label for="hour_output">Horário saída</label>
    {!! Form::time('hour_output', null, ['class' => 'form-control', 'placeholder' => 'Horário saída']) !!}
</div>

<div class="form-group">
    <label for="arrival_time">Horário chegada</label>
    {!! Form::time('arrival_time', null, ['class' => 'form-control', 'placeholder' => 'Horário chegada']) !!}
</div>

<div class="form-group">
    <label for="old_price">Preço anterior</label>
    {!! Form::text('old_price', null, ['class' => 'form-control', 'placeholder' => 'Preço anterior']) !!}
</div>

<div class="form-group">
    <label for="price">Preço</label>
    {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Preço']) !!}
</div>

<div class="form-group">
    <label for="total_plots">Total de parcelas</label>
    {!! Form::text('total_plots', null, ['class' => 'form-control', 'placeholder' => 'Total de parcelas']) !!}
</div>

<div class="form-group">
    {!! Form::checkbox('is_promotion', true, null, ['id' => 'is_promotion']) !!}
    <label for="is_promotion">É promoção?</label>
</div>

<div class="form-group">
    <label for="imagem">Foto</label>
    {!! Form::file('imagem', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="qty_stops">Quantidade de paradas</label>
    {!! Form::number('qty_stops', null, ['class' => 'form-control', 'placeholder' => 'Quantidade de paradas']) !!}
</div>

<div class="form-group">
    <label for="description">Descrição</label>
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <button class="btn btn-search">Enviar</button>
</div>