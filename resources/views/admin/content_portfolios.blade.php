<div style="margin:0px 50px 0px 50px;">

    @if($portfolios)

    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>№ п/п</th>
            <th>Имя</th>
            <th>Фильтр</th>
            <th>Дата создания</th>
            <th>Изображение</th>

            <th>Удалить</th>
        </tr>
        </thead>
        <tbody>

        @foreach($portfolios as $k => $portfolio)

        <tr>
            <td>{{ $portfolio->id }}</td>
            <td><a href="{{ route('portfolioEdit', ['portfolio' => $portfolio->id]) }}" alt="{{ $portfolio->name }}">{{ $portfolio->name }}</a></td>
            <td>{{ $portfolio->filter }}</td>
            <td>{{ $portfolio->created_at }}</td>

            <td><img src="{{ asset('/assets/img/' . $portfolio->images) }}"
                     alt="{{ $portfolio->name }}"
                     name="{{ $portfolio->name }}"
                class="contact_block_icon"> </td>

            <td>
                <form action="{{ route('portfolioEdit', ['portfolio' => $portfolio->id]) }}" class="form-horizontal" method="post">
                    <input type="hidden" name="_method" value="delete">
                    {{ csrf_field() }}
                    <button class="btn btn-danger" type="submit">Удалить</button>
                </form>
            </td>
        </tr>

        @endforeach


        </tbody>
    </table>
    @endif

    <a href="{{ route('portfolioAdd') }}">Новая работа</a>

</div>
