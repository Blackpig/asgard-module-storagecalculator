<div class="box-body">

    {!! Form::i18nInput('name', trans('storagecalculator::storages.form.name'), $errors, $lang) !!}

    {!! Form::i18nInput('blurb', trans('storagecalculator::storages.form.blurb'), $errors, $lang) !!}

    {!! Form::normalInput('unit_price', trans('storagecalculator::storages.form.unit_price'), $errors) !!}

    {!! Form::i18nInput('unit', trans('storagecalculator::storages.form.unit'), $errors, $lang) !!}

</div>
