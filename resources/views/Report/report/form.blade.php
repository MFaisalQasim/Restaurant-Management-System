<script>
    {{ $sum = 0 }}

</script>
{{-- <div class="row" style="display: flex"> --}}
    <div class="row" style="display: flex">
    {{-- <div class="p-5" style="width: 50%"> --}}

    <div class="col" >
        <div class="form-group {{ $errors->has('total_income') ? 'has-error' : '' }}">
            {{-- {!! Form::label('total_income', 'Total Income', ['class' => 'col-md-4 control-label']) !!} --}}
            <div class="col-md-12">
                {{-- {!! Form::number(
                    'total_income',
                    null,
                    '' == 'required'
                        ? ['class' => 'form-control input_border', 'required' => 'required']
                        : ['class' => 'form-control input_border', 'placeholder' => 'Total Income', 'id' => 'total_income'],
                ) !!} --}}
                <div style="display: flex   ;  justify-content: space-between;">
                    <div>
                        <input class="form-control input_border" type="date" name="date" id="date">
                    </div>

                    {{-- <div class="keywords_div">
                        <nav class="navbar navbar-light bg-light"> --}}
                            <div class="topnav search_icon_div " style="display: flex;
                            ">
                                <button type="submit" class="search_button">
                                    <img src="{{ asset('assets/images/search_icon_bar.png') }}" alt="">
                                </button>
                                <input class="form-control input_border mr-sm-2 keywords_search" name="keywords_search" type="search"
                                    placeholder="Employee" aria-label="Search">
                            </div>
                        {{-- </nav>

                    </div> --}}

                </div>
                {!! $errors->first('total_income', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('total_income') ? 'has-error' : '' }}">
            {{-- {!! Form::label('total_income', 'Total Income', ['class' => 'col-md-4 control-label']) !!} --}}
            <div class="col-md-6">
                {!! Form::number(
                    'total_income',
                    null,
                    '' == 'required'
                        ? ['class' => 'form-control input_border', 'required' => 'required']
                        : ['class' => 'form-control input_border', 'placeholder' => 'Total Income', 'id' => 'total_income'],
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
                        ? ['class' => 'form-control input_border', 'required' => 'required']
                        : ['class' => 'form-control input_border', 'placeholder' => 'Card Transactions', 'id' => 'card_transactions'],
                ) !!}
                {!! $errors->first('card_transactions', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('canceled_sale') ? 'has-error' : '' }}">
            <div class="col-md-6">
                {{-- {!! Form::number(
                    'canceled_sale',
                    null,
                    '' == 'required'
                        ? ['class' => 'form-control input_border', 'required' => 'required']
                        : ['class' => 'form-control input_border', 'placeholder' => 'Canceled Sale', 'id' => 'canceled_sale'],
                ) !!} --}}

                <input class="form-control input_border" type="number" name="canceled_sale" id="canceled_sale"
                    placeholder="Canceled Sale" required onkeyup="total_sales()">

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
                <ul style="padding:0px">
                    @foreach ($supplier as $key => $item)
                        <li style="display: flex ; list-style:none ; ">
                            <input class="input_border" type="text" name="" id="" value="{{ $item->name }}" disabled>
                            &nbsp;
                            &nbsp;
                            <input class="input_border" type="text" name="" id="" value="{{ $item->sum }}" disabled>
                            <input type="hidden" name="" id=""
                                value="{{ $item->supplier_cash += $item->sum }}" disabled>
                            <input type="hidden" name="" id="" value="{{ $sum += $item->sum }}"
                                disabled>
                        </li>
                        {{-- {{$supplier->supplier_cash}} --}}
                    @endforeach
                </ul>
                {{-- <input class="form-control input_border" id="supplier_cash" type="button" value="Cash" onclick="total_sales()"> --}}
                <input class="form-control input_border" id="Cash" type="text" value="Cash" disabled>

                <input id="sales_volume_supplier" type="hidden" value="{{ $sum }} "
                    name="sales_volume_supplier">
                <input id="expense_today" type="hidden" value="{{ $expense_today }}" name="expense_today">
                <input id="employee_salary_paid_today" type="hidden" value="{{ $employee_salary_paid_today }}"
                    name="employee_salary_paid_today">

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
                        ? ['class' => 'form-control input_border', 'required' => 'required']
                        : [
                            'class' => 'form-control input_border',
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
                    '' == 'required' ? ['class' => 'form-control input_border', 'required' => 'required'] : ['class' => 'form-control input_border', 'placeholder' => 'Bank Cash Total'],
                ) !!}
                {!! $errors->first('bank_cash_total', '<p class="help-block">:message</p>') !!}
            </div>
        </div> --}}
    </div>
    {{-- <div class="p-5" style="width: 50%"> --}}
    <div class="col">
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
        {!! Form::number('restaurant_id', null, ('required' == 'required') ? ['class' => 'form-control input_border', 'required' => 'required'] : ['class' => 'form-control input_border']) !!}
        {!! $errors->first('restaurant_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('report_handler') ? 'has-error' : ''}}">
    {!! Form::label('report_handler', 'Report Handler', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('report_handler', null, ('' == 'required') ? ['class' => 'form-control input_border', 'required' => 'required'] : ['class' => 'form-control input_border']) !!}
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
    function total_sales() {
        let sales_volume_supplier = document.getElementById('sales_volume_supplier').value
        console.log(sales_volume_supplier, 'sales_volume_supplier')

        let canceled_sale = document.getElementById('canceled_sale').value
        console.log(canceled_sale, 'canceled_sale')

        let card_transactions = document.getElementById('card_transactions').value
        console.log(card_transactions, 'card_transactions')

        let total_income = document.getElementById('total_income').value
        console.log(total_income, 'total_income')

        let expense_today = document.getElementById('expense_today').value
        console.log(expense_today, 'expense_today')
        let employee_salary_paid_today = document.getElementById('employee_salary_paid_today').value
        console.log(employee_salary_paid_today, ' employee_salary_paid_today')

        let Cash = total_income - card_transactions - canceled_sale - sales_volume_supplier;
        console.log(Cash, 'Cash');

        document.getElementById('Cash').value = Math.abs(Cash)
        // let Cash = (((((total_income - card_transactions) - canceled_sale) - sales_volume_supplier) - expense_today) - employee_salary_paid_today);

        // let Cash = ((total_income - card_transactions) - (canceled_sale - sales_volume_supplier) - (expense_today - employee_salary_paid_today));

    }

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

    $(document).ready(function() {

        $(".assign_documents").click(function() {

            let document_id = $(this).data('id');
            let admin_id = $(this).data('admin_id');


            console.log('total_bank_note_sum');
            // var data_Id = $(this).attr("data-id");
            // console.log(data_Id);
            var data_name = $(this).attr("data-name");
            console.log(data_name);

            // var dataId = $(this).data('id');
            // console.log(dataId);
            // var data = $(this).data;
            // console.log(data);
            // var bank_note = $(this).data('bank_note');
            // console.log(bank_note);
            // var pieces = $(this).data('pieces');
            // console.log(pieces);
            // var together_bank_note_pieces = $(this).data('together_bank_note_pieces');
            // console.log(together_bank_note_pieces);
        });
    });
</script>
