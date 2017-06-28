<div class="wrapper container-fluid">
    <form action="{{ route('portfolioAdd') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="col-xs-2 control-label">Название работы</label>
            <div class="col-xs-8">
                <input name="name" type="text" id="name" value="{{ old('name') }}"
                       class="form-control" placeholder="Введите название работы">
            </div>
        </div>

        <div class="form-group">
            <label for="filter" class="col-xs-2 control-label">Введите название фильтра</label>
            <div class="col-xs-8">
                <input name="filter" type="text" id="filter" value="{{ old('filter') }}"
                       class="form-control" placeholder="Введите название фильтра">
            </div>
        </div>

        {{--<div class="form-group">--}}
            {{--<label for="editor" class="col-xs-2 control-label">Текст</label>--}}
            {{--<div class="col-xs-8">--}}
                {{--<textarea name="text" type="text" id="editor"--}}
                          {{--class="form-control" placeholder="Введите текст страницы">{{ old('alias') }}</textarea>--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="form-group">
            <label for="images" class="col-xs-2 control-label">Изображение</label>
            <div class="col-xs-8">
                <input name="images" type="file" id="images" value="{{ old('alias') }}"
                       class="btn-primary" placeholder="Изображения нет">
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </form>
    {{--<script>--}}
        {{--CKEDITOR.replace('editor');--}}
    {{--</script>--}}
</div>
