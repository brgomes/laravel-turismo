<div class="form-group">
    <label for="name">Nome</label>
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
</div>

<div class="form-group">
    <label for="email">E-mail</label>
    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
</div>

<div class="form-group">
    <label for="password">Senha (Nova senha)</label>
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::checkbox('is_admin', true, null, ['id' => 'is_admin']) !!}
    <label for="is_admin">É admin?</label>
</div>

<div class="form-group">
    <label for="image">Foto</label>
    {!! Form::file('image', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <button class="btn btn-search">Enviar</button>
</div>