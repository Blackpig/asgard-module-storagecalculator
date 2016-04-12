<div class="box-body">
     <div class="form-group">
        {!! Form::label("category", trans('storagecalculator::volumes.form.category') ) !!}
            <select name="category" id="category" class="form-control">
            <?php foreach ($categories as $category): ?>
                <option value="{{ $category }}" >{!! trans('storagecalculator::volumes.categories.'.$category) !!}</option>
            <?php endforeach; ?>
        </select>
    </div>

    {!! Form::i18nInput('name', trans('storagecalculator::volumes.form.name'), $errors, $lang) !!}

    {!! Form::normalInput('volume', trans('storagecalculator::volumes.form.volume'), $errors) !!}
</div>
