<div class="wrapper container-fluid">
    <form action="{{ route('servicesEdit', ['service' => $data['id']]) }}"
          class="form-horizontal" method="post">

        {{ csrf_field() }}

        <input type="hidden" name="id" value="{{ $data['id'] }}">

        <div class="form-group">
            <label for="name" class="col-xs-2 control-label">Название:</label>
            <div class="col-xs-8">
                <input type="text" value="{{ $data['name'] }}"
                       class="form-control"
                       name="name"
                       id="name"
                       placeholder="Введите название сервиса">
            </div>
        </div>

        <div class="form-group">
            <label for="editor" class="col-xs-2 control-label">Текст:</label>
            <div class="col-xs-8">
                <textarea class="form-control"
                       name="text"
                       id="editor"
                       placeholder="Введите описание сервиса">
                    {{ $data['text'] }}
                </textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="icon" class="col-xs-2 control-label">Иконка:</label>
            <div class="col-xs-8">
                @if (!empty($icons))
                    <select name="icon" id="icon">
                        @foreach($icons as $icon)
                            <option class="form-control"
                                    @if ($icon == $data['icon'])
                                    selected
                                    @endif>
                                {{ $icon }}
                            </option>
                        @endforeach
                    </select>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
                <button value="Сохранить"
                        class="btn btn-primary"
                        type="submit">Сохранить</button>
            </div>
        </div>
    </form>

    <script>
        CKEDITOR.replace( 'editor' );
    </script>
</div> {{-- End wrapper --}}
