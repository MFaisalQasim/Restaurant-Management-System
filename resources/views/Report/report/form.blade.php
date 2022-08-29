<div class="row" style="display: flex">
    <div class="" style="width: 50%">
        <div class="form-group {{ $errors->has('total_income') ? 'has-error' : '' }}">
            {{-- {!! Form::label('total_income', 'Total Income', ['class' => 'col-md-4 control-label']) !!} --}}
            <div class="col-md-6">
                {!! Form::number(
                    'total_income',
                    null,
                    '' == 'required'
                        ? ['class' => 'form-control', 'required' => 'required']
                        : ['class' => 'form-control', 'placeholder' => 'Total Income'],
                ) !!}
                {!! $errors->first('total_income', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('card_transactions') ? 'has-error' : '' }}">
            {{-- {!! Form::label('card_transactions', 'Card Transactions', ['class' => 'col-md-4 control-label']) !!} --}}
            <div class="col-md-6">
                {!! Form::number(
                    'card_transactions',
                    null,
                    '' == 'required'
                        ? ['class' => 'form-control', 'required' => 'required']
                        : ['class' => 'form-control', 'placeholder' => 'Card Transactions'],
                ) !!}
                {!! $errors->first('card_transactions', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('canceled_sale') ? 'has-error' : '' }}">
            <div class="col-md-6">
                {!! Form::number(
                    'canceled_sale',
                    null,
                    '' == 'required'
                        ? ['class' => 'form-control', 'required' => 'required']
                        : ['class' => 'form-control', 'placeholder' => 'Canceled Sale'],
                ) !!}
                {!! $errors->first('canceled_sale', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('canceled_sale') ? 'has-error' : '' }}">
            {!! Form::label('canceled_sale', 'Sales volume by suppliers', ['class' => 'col-md-4 control-label']) !!}
        </div>
        {{-- <br>
        <br> --}}

        {{-- {{ $supplier }} --}}
        <div class="form-group {{ $errors->has('supplier_cash') ? 'has-error' : '' }}">
            {{-- {!! Form::label('supplier_cash', 'Supplier Cash', ['class' => 'col-md-4 control-label']) !!} --}}
            <div class="col-md-6">
                {{ $sum = 0 }}
                <ul style="padding:0px">
                    @foreach ($supplier as $key => $item)
                        <li style="display: flex ; list-style:none ; ">
                            <input type="text" name="" id="" value="{{ $item->name }}" disabled>
                            &nbsp;
                            &nbsp;
                            <input type="text" name="" id="" value="{{ $item->sum }}" disabled>
                            <input type="hidden" name="" id=""
                                value="{{ $item->supplier_cash += $item->sum }}" disabled>
                            <input type="hidden" name="" id="" value="{{ $sum += $item->sum }}"
                                disabled>
                        </li>
                        {{-- {{$supplier->supplier_cash}} --}}
                    @endforeach
                </ul>

                {{-- <select class="form-select" aria-label="Default select example" name="restaurant_id">
                    @foreach ($supplier as $item)
                        <option value="1">
                            {{ $item->name }}
                            {{ $item->sum }}
                         
                        </option>
                    @endforeach
                </select> --}}

                <input class="form-control" type="submit" value="{{ $sum }} " placeholder="Supplier Cash"
                    disabled>
                {{-- onclick="total_sales(   this.value)" --}}
                {!! $errors->first('supplier_cash', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        {{-- <div class="form-group {{ $errors->has('supplier_cash') ? 'has-error' : '' }}">
            {!! Form::label('supplier_cash', 'Supplier Cash', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::number(
                    'supplier_cash',
                    null,
                    '' == 'required'
                        ? ['class' => 'form-control', 'required' => 'required']
                        : [
                            'class' => 'form-control',
                            'id' => 'supplier_cash',
                            'placeholder' => 'Supplier Cash',
                            'disabled' => 'disabled',
                            'value' => '{{$sum}}'
                        ],
                ) !!}
                {!! $errors->first('supplier_cash', '<p class="help-block">:message</p>') !!}
            </div>
        </div> --}}
        {{-- <div class="form-group {{ $errors->has('bank_cash_total') ? 'has-error' : '' }}">
            <div class="col-md-6">
                {!! Form::number(
                    'bank_cash_total',
                    null,
                    '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control', 'placeholder' => 'Bank Cash Total'],
                ) !!}
                {!! $errors->first('bank_cash_total', '<p class="help-block">:message</p>') !!}
            </div>
        </div> --}}
    </div>
    <div class="" style="width: 50%">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Bank note</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            {{-- {{ $total_cash }} --}}
            <tbody class="total_cash">
                {{-- @foreach ($total_cash as $item) --}}
                @foreach ($total_cash as $key => $value)
                    <tr>
                        <td>
                            <input id="bank_note{{ $key }}" type="number" data-id={{ $value->bank_note }}
                                value="{{ $value->bank_note }}" placeholder="0" disabled>
                        </td>
                        <td>
                            <input id="quantity" class="quantity" onkeyup="show(this.value, {{ $key }})"
                                data-id={{ $value->bank_note }} type="number" placeholder="0" name="quantity">
                        </td>
                        <td>
                            <input class="total_bank_note" id="total_bank_note{{ $key }}" type='text'
                                value="" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- <div class="form-group {{ $errors->has('restaurant_id') ? 'has-error' : ''}}">
    {!! Form::label('restaurant_id', 'Restaurant Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('restaurant_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('restaurant_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('report_handler') ? 'has-error' : ''}}">
    {!! Form::label('report_handler', 'Report Handler', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('report_handler', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('report_handler', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $(document).ready(function() {


        function total_sales(params) {

            console.log('here')
            console.log(params)
        }
    });

    function show(value, num) {
        console.log(value)
        multiplying(value, num);
    }

    function multiplying(mvalue, mnum) {
        if (mvalue === '') $('#total_bank_note' + mnum).val('');
        else {
            parseInt(mvalue);
            $('#total_bank_note' + mnum).val(parseInt($('#bank_note' + mnum).val()) * mvalue);
        }
    }
</script>
