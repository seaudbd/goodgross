@extends('Layouts.customer')

@section('content')

    <div class="container-fluid" style="margin-top: 10px;">
        <div class="row">
            <div class="col mx-auto">
                <div class="card">

                    <div class="card-header" style="font-size: 150%">
                        <div class="row">
                            <div class="col">{{ $customerAccount->account_type }} <sup style="font-size: 0.9rem;">{{ $customerAccount->status }}</sup></div>
                            <div class="col text-right">
                                {{ $customerAccount->account_number }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Transaction Date Time</th>
                                    <th>Transaction Number</th>
                                    <th>Particulars</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                    <th>Balance</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($customerAccount->customerAccountTransactions->count() > 0)
                                    <?php
                                    $totalBalance = 0;
                                    ?>
                                    @foreach($customerAccount->customerAccountTransactions as $customerAccountTransaction)
                                        <?php
                                        $totalBalance += $customerAccountTransaction->credit;
                                        $totalBalance -= $customerAccountTransaction->debit;
                                        ?>
                                        <tr>
                                            <td>{{ date('d-M-y', strtotime($customerAccountTransaction->created_at)) }} {{ date('h:i:s a', strtotime($customerAccountTransaction->created_at)) }}</td>
                                            <td>{{ $customerAccountTransaction->number }}</td>
                                            <td>{{ $customerAccountTransaction->particulars }}</td>
                                            <td>${{ $customerAccountTransaction->debit }}</td>
                                            <td>${{ $customerAccountTransaction->credit }}</td>
                                            <td>${{ $totalBalance }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" class="text-right">Total Balance</td>
                                        <td>${{ $totalBalance }}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">No Transaction Found!</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
