<div class="wrapper container-fluid">
    <form action="{{ route('servicesAdd') }}"
          class="form-horizontal"
          method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="col-xs-2 control-label">Название сервиса:</label>

            <div class="col-xs-8">
                <input name="name" type="text" id="name"
                       value="{{ old('name') }}" class="form-control"
                       placeholder="Введите название сервиса">
            </div>
        </div>

        <div class="form-group">
            <label for="editor" class="col-xs-2 control-label">Текст</label>
            <div class="col-xs-8">
                <textarea name="text" id="editor"
                          class="form-control" placeholder="Введите описание сервиса">{{ old('text') }}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="icon" class="col-xs-2 control-label">Выбирите иконку сервиса</label>
            <div class="col-xs-8">
                @if(!empty($icons))
                    <select name="icon" id="icon">
                        @foreach ($icons as $icon)
                            <option class="form-control">{{ $icon }}</option>
                        @endforeach
                    </select>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </form>
    <script>
        CKEDITOR.replace('editor');
    </script>
</div>