<div class="box-body">

    {!! Form::i18nInput('name', trans('storagecalculator::packagings.form.name'), $errors, $lang) !!}

    {!! Form::i18nInput('blurb', trans('storagecalculator::packagings.form.blurb'), $errors, $lang) !!}

    {!! Form::normalInput('unit_price', trans('storagecalculator::packagings.form.unit_price'), $errors) !!}

    {!! Form::i18nInput('unit', trans('storagecalculator::packagings.form.unit'), $errors, $lang) !!}

</div>
