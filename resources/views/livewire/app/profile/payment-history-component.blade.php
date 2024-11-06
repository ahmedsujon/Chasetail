<div class="container">
    <h2 class="mb-4" style="margin-top: 10%;">Payment History</h2>
    <div class="table-responsive" style="margin-bottom: 30%;">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Payment Date</th>
                    <th>Plan</th>
                    <th>Transaction ID</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @if ($transections->count() > 0)
                    @foreach ($transections as $index => $transection)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $transection->created_at }}</td>
                            <td>
                                @if ($transection->plan == 'planA')
                                    Basic Plan
                                @elseif ($transection->plan == 'planB')
                                    Level One Plan
                                @elseif ($transection->plan == 'planC')
                                    Level Two Plan
                                @elseif ($transection->plan == 'planD')
                                    Level Three
                                @else
                                Level Four Plan
                                @endif
                            </td>
                            <td>{{ $transection->transaction_id ?? 'N/A' }}</td>
                            <td>${{ number_format($transection->amount, 2) }}</td>
                            <td><span class="badge bg-success">Completed</span></td>
                        </tr>
                    @endforeach
                @else
                    <!-- Display this row if there are no transactions -->
                    <tr>
                        <td colspan="6" class="text-center">Payment history not found</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
