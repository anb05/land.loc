<div class="wrapper container-fluid" >
    <form action="{{ route('portfolioEdit', ['portfolio' => $data['id']]) }}"
          class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <input type="hidden" value="{{ $data['id'] }}">
            <label for="name" class="col-xs-2 control-label">Название:</label>
            <div class="col-xs-8">
                <input type="text" value="{{ $data['name'] }}"
                       class="form-control"
                       id="name"
                       placeholder="Введите название портфолио">
            </div>
        </div>

        <div class="form-group">
            <label for="filter" class="col-xs-2 control-label">Фильтр:</label>
            <div class="col-xs-8">
                <input type="text" value="{{ $data['filter'] }}"
                       class="form-control"
                       id="filter"
                       placeholder="Введите название фильтра">
            </div>
        </div>

        <div class="form-group">
            <label for="old_images" class="col-xs-2 control-label">Изображение:</label>
            <div class="col-xs-10 col-xs-offset-2">
                <img src="{{ asset('assets/img/' . $data['images']) }}"
                     alt="{{ $data['name'] }}"
                     class="img-circle img-responsive">
                <input type="hidden" value="{{ $data['images'] }}"
                       name="old_images"
                       id="old_images">
            </div>
        </div>

        <div class="form-group">
            <label for="images" class="col-xs-2 control-label">Изображение:</label>
            <div class="col-xs-8">
                <input type="file"
                       class="filestyle btn-primary"
                       id="images"
                       value="Выбирите изображение"
                       placeholder="Файла нет">
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
</div>