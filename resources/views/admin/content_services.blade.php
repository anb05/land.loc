<div style="margin: 0 50px 0 50px">
    @if($services)
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>№ п/п</th>
                <th>Наименование</th>
                <th>Текст</th>
                <th>Иконка</th>
                <th>Дата создания</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($services as $k => $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td><a href="{{ route('servicesEdit', ['services' => $service->id]) }}">{{ $service->name }}</a></td>
                    <td>{{ $service->text }}</td>
                    <td>
                        <div class="service_icon" style="text-align: center; margin-bottom: 0"> <span><i class="fa {{ $service->icon }}"></i></span> </div>
                    </td>
                    <td>{{ $service->created_at }}</td>
                    <td>
                        <form action="{{ route('servicesEdit', ['services' => $service->id]) }}" class="form-horizontal" method="post">
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
        <a href="{{ route('servicesAdd') }}" class="btn btn-primary">Новая страница</a>
</div>

