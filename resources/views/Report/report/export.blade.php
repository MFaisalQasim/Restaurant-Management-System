<table>
    <thead>
        <tr>
            {{-- <th>Id</th> --}}
            {{-- <th>Menus</th> --}}
            {{-- <th>Tables</th> --}}
            <th>Waiter</th>
            <th>Amount</th>
            <th>Total income</th>
            <th>Total</th>
            <th>Type of payment</th>
            <th>Payment status</th>
            <th>Report Handler</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sales as $report)
            <tr>
                {{-- <td>
                    @foreach($report->menus()->where("sales_id",$report->id)->get() as $menu)
                        <div class="col-md-4 mb-2">
                            <div class="h-100">
                                <div class="d-flex
                                flex-column justify-content-center
                                align-items-center">
                                    <h5 class="font-weight-bold mt-2">
                                        {{ $menu->title }}
                                    </h5>
                                    <h5 class="text-muted">
                                        {{ $menu->price }} DH
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </td> --}}
                {{-- <td>
                    @foreach($report->tables()->where("sales_id",$report->id)->get() as $table)
                        <div class="col-md-4 mb-2">
                            <div class="h-100">
                                <div class="d-flex
                                flex-column justify-content-center
                                align-items-center">
                                    <i class="fa fa-chair fa-3x"></i>
                                    <h5 class="text-muted mt-2">
                                        {{ $table->name }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </td> --}}
                <td>
                    {{ $report->card_transactions}}
                </td>
                <td>
                    {{ $report->canceled_sale}}
                </td>
                <td>
                    {{ $report->supplier_cash}}
                </td>
                <td>
                    {{ $report->total_income }}
                </td>
                <td>
                    {{ $report->bank_cash_total}}
                </td>
                <td>
                    {{ $report->restaurant_id}}
                </td>
                <td>
                    {{ $report->report_handler}}
                </td>
                {{-- <td>
                    {{ $report->payment_type === "cash" ? "Espéce" : "Carte bancaire"}}
                </td> --}}
                {{-- <td>
                    {{ $report->payment_status === "paid" ? "Payé" : "Impayé"}}
                </td> --}}
            </tr>
        @endforeach
        <tr>
            <td colspan="5">
                Rapport de {{ $from }} à {{ $to }}
            </td>
            <td>
                {{-- {{ $total }} dh --}}
            </td>
        </tr>
    </tbody>
</table>
