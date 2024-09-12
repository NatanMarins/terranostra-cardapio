@if ($menus->isEmpty())
    <p>Nenhum produto encontrado!</p>
@else
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">Nome do Produto</th>
                    <th scope="col">Preço de Venda</th>
                    <th scope="col">Preço Promocional</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Foto</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                    <tr>
                        <td>{{ $menu->nome }}</td>
                        <td>R$ {{ number_format($menu->preco, 2, ',', '.') }}</td>
                        <td>R$ {{ number_format($menu->preco_promocional, 2, ',', '.') }}</td>
                        <td>{{ $menu->categoria->categoria ?? 'Categoria não definida' }}</td>
                        <td>
                            @if ($menu->product_file_name)
                                <div class="product-image">
                                    <img src="{{ asset('storage/' . $menu->product_file_name) }}" alt="Imagem do Produto"
                                        class="avatar-img rounded" style="max-width: 100px;">
                                </div>
                            @endif
                        </td>

                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('menu.show', ['menu' => $menu->id]) }}" class="btn btn-primary"
                                    title="Visualizar Produto"> <i class="fa-regular fa-eye"></i></a>
                                <a href="{{ route('menu.edit', ['menu' => $menu->id]) }}" class="btn btn-info"
                                    title="Editar Produto"> <i class="fa-solid fa-edit"></i> </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endif
