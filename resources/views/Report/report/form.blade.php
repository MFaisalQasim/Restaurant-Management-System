<?php
$sum = 0;
$bank_cash_total = 0;
$sum_sum_arr = [];
$supplier_arr_sum = 0;
?>
<div class="col-12">
    <div class="row">
        <div class="col">
            <div class="form-group {{ $errors->has('total_income') ? 'has-error' : '' }}">
                <div class="col-md-12">
                    <div style="display: flex   ;  justify-content: space-between;">
                        <div class="col">
                            <input type="date" name="date" placeholder="Date" id="date" onload="getDate()"
                                value="<?php echo $today; ?>" class="form-control">
                        </div>
                        <div class="col">
                            @if (count($user) != 0)
                                <select class="form-control" name="name" id="name">
                                    @foreach ($user as $item)
                                        @if (!$item->hasRole('developer'))
                                            <option value="{{ $item->name . ' ' . $item->surname }}">
                                                {{ $item->name . ' ' . $item->surname }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            @else
                                <input class="form-control" name="name" id="name" type="text"
                                    value="{{ auth()->user()->name }}"
                                    placeholder="Add Users to Restaurant to select one" readonly>
                            @endif
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                {!! $errors->first('total_income', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('total_income') ? 'has-error' : '' }}">
                <div class="col-md-6">
                    <input class="form-control input_border" type="number" name="total_income" id="total_income"
                        placeholder="Total Income" required onkeyup="total_sales()" onchange="total_sales()">
                    {!! $errors->first('total_income', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('card_transactions') ? 'has-error' : '' }}">
                <div class="col-md-6">
                    <input class="form-control input_border" type="number" name="card_transactions"
                        id="card_transactions" placeholder="Card Transactions" required onkeyup="total_sales()"
                        onchange="total_sales()">
                    {!! $errors->first('card_transactions', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('canceled_sale') ? 'has-error' : '' }}">
                <div class="col-md-6">
                    <input class="form-control input_border" type="number" name="canceled_sale" id="canceled_sale"
                        placeholder="Canceled Sale" required onkeyup="total_sales()" onchange="total_sales()">
                    {!! $errors->first('canceled_sale', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            @if (auth()->user()->hasRole('admin') ||
                auth()->user()->hasRole('developer'))
                <div class="form-group {{ $errors->has('restaurant_id') ? 'has-error' : '' }}">
                    {!! Form::label('restaurant_id', 'Restaurant Name', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        <input type="text" class="form-control" value="{{ $restaurant->name }}" readonly>
                        {!! $errors->first('restaurant_id', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            @endif
            <div class="form-group {{ $errors->has('supplier_cash') ? 'has-error' : '' }}">


                <div @if ($restaurant->active_for_this_restaurant == 'yes') class="col-md-12" @else class="col-md-6" @endif >
                    @if ($restaurant->active_for_this_restaurant == 'yes')
                        <div class="d-flex p-2" style="max-height: 100px">
                            <a class="btn btn-dark" onclick='updateSupplierDiv ();'>Refresh Supplier Data</a>
                            <h5 class="p-1">Enter data carefully if there is some mistake refresh and start again **
                            </h5>
                        </div>
                        <ul class="supplier_li" style="padding:0px">

                            {{-- @foreach ($supplier as $item)
                            <li style="display: flex; list-style:none ; ">
                                <input class="input_border" type="number" name="" id=""
                                    placeholder="{{ $item->name }}" disabled>
                                &nbsp;
                                &nbsp;
                                        <input class="input_border" value="{{$sum_sum_arr[$item->id] = $item->sum}}" >
                            </li>
                            @endforeach 

                            <input type="text" name="sales_volume_supplier" id="sales_volume_supplier" value="{{array_sum($sum_sum_arr)}}" readonly>
                            @endif
                            <input type="text" name="sales_volume_supplier" id="sales_volume_supplier" value="{{0}}" readonly> --}}

                            @foreach ($supplier as $key => $item)
                                <li class="" style="display: flex; list-style:none ; ">
                                    <input class="form-control input_border" type="number" name=""
                                        id="" placeholder="{{ $item->name }}" disabled>
                                    &nbsp;
                                    &nbsp;
                                    <input class="form-control input_border" type="number" name="{{ $item->name }}"
                                        id="supplier_volume{{ $key }}"
                                        onkeyup="get_total_sales(this.value ,{{ $key }},{{ $item->id }})"
                                        value="{{ 0 }}" required autofocus>
                                </li>
                            @endforeach
                            <input type="hidden" name="sales_volume_supplier" id="sales_volume_supplier"
                                value="{{ $supplier_arr_sum }}" readonly>
                        </ul>

                        {{-- <li style="display: flex ; list-style:none ; ">
                            <input class="input_border" type="number" name="" id="" placeholder="UBER" 
                                disabled>
                            &nbsp;
                            &nbsp;
                            <input class="input_border" type="number" name="UBER" id="UBER"
                                onkeyup="total_sales()" onchange="total_sales()"  required autofocus autocomplete={{0}}>
                        </li>
                        <li style="display: flex ; list-style:none ; ">
                            <input class="input_border" type="number" name="" id=""
                                placeholder="GLOVO" disabled>
                            &nbsp;
                            &nbsp;
                            <input class="input_border" type="number" name="GLOVO" id="GLOVO"required
                                onkeyup="total_sales()" onchange="total_sales()">
                        </li> --}}
                        @if (auth()->user()->hasRole('admin') ||
                            auth()->user()->hasRole('developer'))
                            <input class="form-control input_border" style="width: 50%" id="Cash" name="cash"
                                type="text" value="" readonly>
                        @else
                            <input class="form-control input_border" id="Cash" name="cash" type="text"
                                value="" readonly>
                        @endif
                        <input id="expense_today" type="hidden" value="{{ $expense_today }}" name="expense_today">
                        <input id="employee_salary_paid_today" type="hidden"
                            value="{{ $employee_salary_paid_today }}" name="employee_salary_paid_today">
                        <input class="form-control input_border" id="diff_salary_paid_today_and_expense_today"
                            name="diff_salary_paid_today_and_expense_today" type="hidden" value="" readonly>
                        {!! $errors->first('supplier_cash', '<p class="help-block">:message</p>') !!}

                    @endif
                </div>
            </div>
        </div>
        <div class="col">
            <div class="d-flex p-2">
                <a class="btn btn-dark" onclick='updateTableDiv ();'>Refresh Table</a>
                <h5 class="p-1">Enter data carefully if there is some mistake refresh and start again **</h5>
            </div>
            <table class="table table-striped" id="table-to-refresh">
                <thead>
                    <tr>
                        <th scope="col">Bank note</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody class="total_cash">
                    @foreach ($total_cash as $key => $value)
                        <tr>
                            <td>
                                <input id="bank_note{{ $key }}" type="float"
                                    data-id={{ $value->bank_note }} value="{{ $value->bank_note }}" disabled>
                            </td>
                            <td>
                                <input id="quantity" class="quantity"
                                    onkeyup="show(this.value, {{ $key }})" data-id={{ $value->bank_note }}
                                    type="number" placeholder="0" name="quantity">
                            </td>
                            <td>
                                <input name="total_bank_note" class="total_bank_note"
                                    id="total_bank_note{{ $key }}" type='text' value=""
                                    readonly />
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td><b>Total of</b> </td>
                        <td><b>Bank Notes -></b></td>
                        <td><input type="text" name="total_bank_note_sum" id="total_bank_note_sum"
                                value="{{ 0 }}" readonly></td>
                    </tr>
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
    <script src="{{ asset('plugins/components/toast-master/js/jquery.toast.js') }}"></script>
    <script>
        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            alert(msg);
        }

        i = 0;
        arr = [];
        sup = 0;
        supplier_arr = [];
        $total_bank_note_sum = 0;
        $supplier_arr_sum = 0;
        previous_item_id = null;

        function updateTableDiv() {
            $total_bank_note_sum = 0;
            document.getElementById('total_bank_note_sum').value = Math.abs($total_bank_note_sum)
            $("#table-to-refresh").load(window.location.href + " #table-to-refresh");
        }

        function updateSupplierDiv() {
            $supplier_arr_sum = 0;
            previous_item_id = null;
            $supplier_arr_sum = 0;
            sup = 0
            console.log(supplier_arr + 'supplier_arr');
            supplier_arr = [];
            console.log(supplier_arr + 'supplier_arr');
            sales_volume_supplier = document.getElementById('sales_volume_supplier').value = Math.abs($supplier_arr_sum);
            $(".supplier_li").load(window.location.href + " .supplier_li");
            total_sales();
        }

        function total_sales() {
            let sales_volume_supplier;

            // $UBER = document.getElementById('UBER').value
            // console.log($UBER + "$UBER 2");
            // $BOLT = document.getElementById('BOLT').value
            // console.log($BOLT + "$BOLT 2");
            // $WOLT = document.getElementById('WOLT').value
            // console.log($WOLT + "$WOLT 2");
            // $PYSZNE = document.getElementById('PYSZNE').value
            // console.log($PYSZNE + "$PYSZNE 2");
            // $GLOVO = document.getElementById('GLOVO').value
            // console.log($GLOVO + "$GLOVO 2");

            // $UBER = ($UBER == null || $UBER == undefined || $UBER == 0 ? $UBER = 0 : parseInt($UBER))
            // $BOLT = ($BOLT == null || $BOLT == undefined || $BOLT == 0 ? $BOLT = 0 : parseInt($BOLT))
            // $WOLT = ($WOLT == null || $WOLT == undefined || $WOLT == 0 ? $WOLT = 0 : parseInt($WOLT))
            // $PYSZNE = ($PYSZNE == null || $PYSZNE == undefined || $PYSZNE == 0 ? $PYSZNE = 0 : parseInt($PYSZNE))
            // $GLOVO = ($GLOVO == null || $GLOVO == undefined || $GLOVO == 0 ? $GLOVO = 0 : parseInt($GLOVO))
            // console.log($UBER + "$UBER 3");
            // console.log($BOLT + "$BOLT 3");
            // console.log($WOLT + "$WOLT 3");
            // console.log($PYSZNE + "$PYSZNE 3");
            // console.log($GLOVO + "$GLOVO 3");

            // sales_volume_supplier = parseInt($UBER) + parseInt($BOLT) + parseInt($WOLT) + parseInt($PYSZNE) + parseInt(
            //     $GLOVO);

            // console.log(sales_volume_supplier + 'sales_volume_supplier');

            sales_volume_supplier = document.getElementById('sales_volume_supplier').value
            console.log(sales_volume_supplier + 'sales_volume_supplier');

            let canceled_sale = document.getElementById('canceled_sale').value

            let card_transactions = document.getElementById('card_transactions').value

            let total_income = document.getElementById('total_income').value

            canceled_sale = (canceled_sale == null || canceled_sale == undefined || canceled_sale == 0 ? canceled_sale = 0 :
                parseInt(canceled_sale))
            card_transactions = (card_transactions == null || card_transactions == undefined || card_transactions == 0 ?
                card_transactions = 0 : parseInt(card_transactions))
            total_income = (total_income == null || total_income == undefined || total_income == 0 ? total_income = 0 :
                parseInt(total_income))

            let expense_today = document.getElementById('expense_today').value
            let employee_salary_paid_today = document.getElementById('employee_salary_paid_today').value


            $diff_salary_paid_today_and_expense_today = expense_today - employee_salary_paid_today;
            document.getElementById('diff_salary_paid_today_and_expense_today').value = (
                $diff_salary_paid_today_and_expense_today)

            console.log(expense_today + "expense_today");
            console.log(employee_salary_paid_today + "employee_salary_paid_today");


            let Cash = total_income - (parseInt(card_transactions) + parseInt(canceled_sale) + parseInt(
                sales_volume_supplier) + parseInt(expense_today) + parseInt(employee_salary_paid_today));

            console.log(Cash + " Cash");
            document.getElementById('Cash').value = (Cash)
        }

        function show(value, num) {

            let bank_note = value
            let key;
            let total_bank_note;
            check = document.getElementById('total_bank_note' + num).value
            console.log(check + "check ");
            if (check == "") {
                key = document.getElementById('bank_note' + num).value
                total_bank_note = bank_note * key
                console.log(key + "key if");

                document.getElementById('total_bank_note' + num).value = Math.abs(total_bank_note)

                total_bank_note_sum = document.getElementById('total_bank_note_sum').value

                console.log(total_bank_note_sum + 'total_bank_note_sum 1');

                console.log(total_bank_note + 'total_bank_note 1');
                if (total_bank_note_sum == 0) {
                    i = 0;
                }
                arr[i] = total_bank_note;
                i++;
                console.log($total_bank_note_sum + "total_bank_note_sum");
                $total_bank_note_sum = arr.reduce((a, b) => a + b, 0);
                console.log($total_bank_note_sum + "total_bank_note_sum");

            } else {
                // bank_note = null;
                key = document.getElementById('bank_note' + num).value
                total_bank_note = bank_note * key
                console.log(value + "value else");
                console.log(key + "key");

                document.getElementById('total_bank_note' + num).value = Math.abs(total_bank_note)

                total_bank_note_sum = document.getElementById('total_bank_note_sum').value

                console.log(total_bank_note_sum + 'total_bank_note_sum 1');


                console.log(total_bank_note + 'total_bank_note 1');
                // arr[i] = total_bank_note;
                // i++;

            }

            document.getElementById('total_bank_note_sum').value = Math.abs($total_bank_note_sum)

            console.log(total_bank_note_sum + 'total_bank_note_sum get 3');
        }

        function get_total_sales(volume, key, item_id) {
            check = document.getElementById('supplier_volume' + key).value
            console.log(check + "check");
            if (item_id == previous_item_id) {
                console.log("check IF");
                --sup;
                previous_item_id = item_id;
                console.log(previous_item_id + "previous_item_id");
                supplier_arr[sup] = parseInt(check);
                console.log(sup + "sup");
                $supplier_arr_sum = supplier_arr.reduce((a, b) => a + b, 0);
                document.getElementById('sales_volume_supplier').value = Math.abs($supplier_arr_sum)
                console.log($supplier_arr_sum + "$supplier_arr_sum");
                sup++;
                console.log(sup + "sup");
                console.log("check IF end");
            } else {
                console.log("check ELSE");
                previous_item_id = item_id;
                supplier_arr[sup] = parseInt(check);
                console.log(sup + "sup");
                $supplier_arr_sum = supplier_arr.reduce((a, b) => a + b, 0);
                document.getElementById('sales_volume_supplier').value = Math.abs($supplier_arr_sum)
                console.log($supplier_arr_sum + "$supplier_arr_sum");
                sup++;
                console.log(sup + "sup");
                console.log("check ELSE end");
            }
            total_sales();
        }
    </script>
@endpush
