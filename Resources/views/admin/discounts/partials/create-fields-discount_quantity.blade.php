<div class="box-body">
    <div class=col-md-4>
        {!! Form::normalInput('unit', trans('storagecalculator::discounts.form.unit'), $errors) !!}
    </div>
    <div class=col-md-4>
        <label>&nbsp;</label>
        <select name="operand" id="operand" class="form-control">
            <option value="only" selected>{!! trans('storagecalculator::discounts.form.operands.only') !!}</option>
            <option value="or more">{!! trans('storagecalculator::discounts.form.operands.or more') !!}</option>
        </select>
    </div>
    <div class=col-md-4>
        {!! Form::normalInput('amount', trans('storagecalculator::discounts.form.quantity_discount'), $errors) !!}
    </div>

    <input type="hidden" value="Quantity_discount" name="discount_type" />
</div>
