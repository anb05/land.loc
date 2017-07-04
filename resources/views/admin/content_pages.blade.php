<div style="margin:0px 50px 0px 50px;">

    @if($pages)

        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>№ п/п</th>
                <th>Имя</th>
                <th>Псевдоним</th>
                <th>Текст</th>
                <th>Дата создания</th>

                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>

            @foreach($pages as $k => $page)

                <tr>
                    <td>{{ $page->id }}</td>
                    <td><a href="{{ route('pagesEdit', ['page' => $page->id]) }}" title="{{ $page->name }}">{{ $page->name }}</a></td>
                    <td>{{ $page->alias }}</td>
                    <td>{{ $page->text }}</td>
                    <td>{{ $page->created_at }}</td>

                    <td>
                        <form action="{{ route('pagesEdit', ['page' => $page->id]) }}" class="form-horizontal" method="post">
                            <input type="hidden" name="_method" value="delete">
                            {{ csrf_field() }}
                            <button class="btn btn-danger" type="submit">Удалить</button>
                        </form>
                        {{--{!! Form::open(['url'=>route('pagesEdit',['page'=>$page->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}--}}
{{----}}
                        {{--{!! Form::hidden('_method','delete') !!}--}}
{{----}}
                        {{--{{ method_field('DELETE') }}--}}
                        {{--{!! Form::button('Удалить',['class'=>'btn btn-danger','type'=>'submit']) !!}--}}
{{----}}
                        {{--{!! Form::close() !!}--}}
                    </td>
                </tr>

            @endforeach


            </tbody>
        </table>
    @endif

        <a href="{{ route('pagesAdd') }}">Новая страница</a>
        {{--    {!! Html::link(route('pagesAdd'),'Новая страница') !!}--}}

</div>