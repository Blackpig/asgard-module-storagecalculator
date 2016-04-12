<div class="box-body">

   <div class=col-md-6>
        {!! Form::normalInput('unit', trans('storagecalculator::discounts.form.month'), $errors) !!}
    </div>
    <div class=col-md-6>
        {!! Form::normalInput('amount', trans('storagecalculator::discounts.form.period_discount'), $errors) !!}
    </div>
    <input type="hidden" value="Period_discount" name="discount_type" />
</div>
