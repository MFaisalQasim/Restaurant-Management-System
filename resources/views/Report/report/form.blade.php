<script>
    {{ $sum = 0 }}
    {{ $bank_cash_total = 0 }}
</script>
<div class="col-12">

    {{-- <div class="row" style="display: flex"> --}}
    <div class="row">
        {{-- <div class="p-5" style="width: 50%"> --}}

        <div class="col">
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
                            <input class="form-control input_border mr-sm-2 keywords_search" name="keywords_search"
                                type="search" placeholder="Employee" aria-label="Search">
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
                {!! Form::label('canceled_sale', 'Sales volume by suppliers', ['class' => 'col-md-6 control-label']) !!}
            </div>
            @if (auth()->user()->hasRole('admin') ||
                auth()->user()->hasRole('developer'))
                <div class="form-group {{ $errors->has('restaurant_id') ? 'has-error' : '' }}">
                    {!! Form::label('restaurant_id', 'Restaurant Id', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">

                        <select class="form-select" aria-label="Default select example" name="restaurant_id">
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        {!! $errors->first('restaurant_id', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            @endif
            {{-- <br>
        <br> --}}

            {{-- {{ $supplier }} --}}
            <div class="form-group {{ $errors->has('supplier_cash') ? 'has-error' : '' }}">
                {{-- {!! Form::label('supplier_cash', 'Supplier Cash', ['class' => 'col-md-4 control-label']) !!} --}}
                <div class="col-md-6">
                    <ul style="padding:0px">
                        @foreach ($supplier as $key => $item)
                            <li style="display: flex ; list-style:none ; ">
                                <input class="input_border" type="text" name="" id=""
                                    value="{{ $item->name }}" disabled>
                                &nbsp;
                                &nbsp;
                                <input class="input_border" type="text" name="" id=""
                                    value="{{ $item->sum }}" disabled>
                                <input type="hidden" name="" id=""
                                    value="{{ $item->supplier_cash += $item->sum }}" disabled>
                                <input type="hidden" name="" id="" value="{{ $sum += $item->sum }}"
                                    disabled>
                            </li>
                            {{-- {{$supplier->supplier_cash}} --}}
                        @endforeach
                    </ul>
                    {{-- <input class="form-control input_border" id="supplier_cash" type="button" value="Cash" onclick="total_sales()"> --}}

                    @if (auth()->user()->hasRole('admin') ||
                        auth()->user()->hasRole('developer'))
                        <input class="form-control input_border" id="Cash" name="cash" type="text"
                            value="Cash" readonly>
                    @endif
                    {{-- <input class="form-control input_border" id="supplier_cash" name="supplier_cash" type="text" 
                            value="{{$sum}}" readonly> --}}


                    <input id="sales_volume_supplier" type="hidden" value="{{ $sum }} "
                        name="sales_volume_supplier">
                    <input id="expense_today" type="hidden" value="{{ $expense_today }}" name="expense_today">
                    <input id="employee_salary_paid_today" type="hidden" value="{{ $employee_salary_paid_today }}"
                        name="employee_salary_paid_today">

                    {!! $errors->first('supplier_cash', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
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
                                <input id="bank_note{{ $key }}" type="number"
                                    data-id={{ $value->bank_note }} value="{{ $value->bank_note }}" placeholder="0"
                                    disabled>
                            </td>
                            <td>
                                <input id="quantity" class="quantity" onkeyup="show(this.value, {{ $key }})"
                                    data-id={{ $value->bank_note }} type="number" placeholder="0" name="quantity">
                            </td>
                            <td>
                                <input name="total_bank_note" class="total_bank_note"
                                    id="total_bank_note{{ $key }}" type='text' value=""
                                    {{-- value="{{$bank_cash_total =+ }}" --}} readonly />
                            </td>
                        </tr>
                    @endforeach
                    <input type="hidden" name="total_bank_note_sum" id="total_bank_note_sum" value=""
                        readonly>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>


@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        function total_sales() {
            let sales_volume_supplier = document.getElementById('sales_volume_supplier').value

            let canceled_sale = document.getElementById('canceled_sale').value

            let card_transactions = document.getElementById('card_transactions').value

            let total_income = document.getElementById('total_income').value

            let expense_today = document.getElementById('expense_today').value
            let employee_salary_paid_today = document.getElementById('employee_salary_paid_today').value
            let Cash = total_income - card_transactions - canceled_sale - sales_volume_supplier;

            document.getElementById('Cash').value = Math.abs(Cash)

        }

        function show(value, num) {
            let bank_note = value

            let key = document.getElementById('bank_note' + num).value

            let total_bank_note = bank_note * key

            document.getElementById('total_bank_note' + num).value = Math.abs(total_bank_note)

            total_bank_note += total_bank_note
            document.getElementById('total_bank_note_sum').value = Math.abs(total_bank_note)
        }
    </script>
@endpush
