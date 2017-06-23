<div class="wrapper container-fluid">
    <form action="{{ route('pagesAdd') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="col-xs-2 control-label">Название</label>
            <div class="col-xs-8">
                <input type="text" id="name" value="{{ old('name') }}"
                       class="form-control" placeholder="Введите название страницы">
            </div>
        </div>

        <div class="form-group">
            <label for="alias" class="col-xs-2 control-label">Введите псевдоним страницы</label>
            <div class="col-xs-8">
                <input type="text" id="alias" value="{{ old('alias') }}"
                       class="form-control" placeholder="Введите псевдоним страницы">
            </div>
        </div>

        <div class="form-group">
            <label for="editor" class="col-xs-2 control-label">Текст</label>
            <div class="col-xs-8">
                <textarea type="text" id="editor"
                          class="form-control" placeholder="Введите текст страницы">{{ old('alias') }}</textarea>
            </div>
        </div>
    </form>

    <div class="form-group">
        <label for="images" class="col-xs-2 control-label">Изображение</label>
        <div class="col-xs-8">
            <input type="file" id="images" value="{{ old('alias') }}"
                   class="filestyle" placeholder="Изображения нет">
        </div>
    </div>
    <script>
        CKEDITOR.replace('editor');
    </script>
</div>