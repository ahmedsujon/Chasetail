<div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Donations</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Donations</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-white" style="border-bottom: 1px solid #e2e2e7;">
                            <h4 class="card-title" style="float: left;">Donation List</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12 mb-2 sort_cont">
                                    <label class="font-weight-normal" style="">Show</label>
                                    <select name="sortuserresults" class="sinput" id=""
                                        wire:model="sortingValue" wire:change='resetPage'>
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                    <label class="font-weight-normal" style="">entries</label>
                                </div>

                                <div style="position: absolute; text-align: center;" wire:loading
                                    wire:target='searchTerm,sortingValue,previousPage,gotoPage,nextPage'>
                                    <span class="bg-light" style="padding: 5px 15px; border-radius: 2px;"><span
                                            class="spinner-border spinner-border-xs align-middle" role="status"
                                            aria-hidden="true"></span> Processing</span>
                                </div>

                                <div class="col-md-6 col-sm-12 mb-2 search_cont">
                                    <label class="font-weight-normal mr-2">Search:</label>
                                    <input type="search" class="sinput" placeholder="Search..." wire:model="searchTerm"
                                        wire:keyup='resetPage' />
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            @include(
                                                'livewire.admin.datatable.donation-datatable-sorting',
                                                [
                                                    'name' => 'id',
                                                    'thDisplayName' => 'ID',
                                                ]
                                            )
                                            @include(
                                                'livewire.admin.datatable.donation-datatable-sorting',
                                                [
                                                    'name' => 'transaction_id',
                                                    'thDisplayName' => 'Transaction ID',
                                                ]
                                            )
                                            @include(
                                                'livewire.admin.datatable.donation-datatable-sorting',
                                                [
                                                    'name' => 'amount',
                                                    'thDisplayName' => 'Amount',
                                                ]
                                            )
                                            @include(
                                                'livewire.admin.datatable.donation-datatable-sorting',
                                                [
                                                    'name' => 'currency',
                                                    'thDisplayName' => 'Currency',
                                                ]
                                            )
                                            @include(
                                                'livewire.admin.datatable.donation-datatable-sorting',
                                                [
                                                    'name' => 'created_at',
                                                    'thDisplayName' => 'Donation Date',
                                                ]
                                            )
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @if ($donations->count() > 0)
                                            @foreach ($donations as $donation)
                                                <tr>
                                                    <td>{{ $donation->id }}</td>
                                                    <td>{{ $donation->transaction_id }}</td>
                                                    <td>{{ $donation->amount }}</td>
                                                    <td>{{ $donation->currency }}</td>
                                                    <td>{{ $donation->created_at }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" class="text-center pt-5 pb-5">No donation found!</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent">
                            {{ $donations->links('livewire.pagination-links') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
