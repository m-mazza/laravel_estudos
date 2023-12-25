<h3>Clientes</h3>
<a href="{{route('clientes.create')}}">Criar novo cliente</a>
<ol>
    @foreach ($clientes as $c)
        <li>{{$c['nome']}}&nbsp;&nbsp;|&nbsp;
            <a href="{{route('clientes.edit', $c['id'])}}">Editar</a>
        </li>
    @endforeach
</ol>
