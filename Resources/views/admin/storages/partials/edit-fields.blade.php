<div class="box-body">
    {!! Form::i18nInput('name', trans('storagecalculator::storages.form.name'), $errors, $lang, $storage) !!}

    {!! Form::i18nInput('blurb', trans('storagecalculator::storages.form.blurb'), $errors, $lang, $storage) !!}

    {!! Form::normalInput('unit_price', trans('storagecalculator::storages.form.unit_price'), $errors, $storage) !!}

    {!! Form::i18nInput('unit', trans('storagecalculator::storages.form.unit'), $errors, $lang, $storage) !!}
</div>
