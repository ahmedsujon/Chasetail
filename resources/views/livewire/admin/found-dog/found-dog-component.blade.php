<div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Found Dogs</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Found Dog</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-white" style="border-bottom: 1px solid #e2e2e7;">
                            <h4 class="card-title" style="float: left;">All Lost Dog</h4>
                            <button wire:click="exportFoundDogsExcel"
                                class="btn btn-sm btn-dark waves-effect waves-light" style="float: right;"><i
                                    class="bx bxs-file-pdf"></i> Export Excel</button>
                            <button wire:click="exportFoundDogsCSV" class="btn btn-sm btn-dark waves-effect waves-light"
                                style="float: right !important; margin-right: 5px;"><i class="bx bxs-file-pdf"></i>
                                Export
                                CSV</button>
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
                                            @include('livewire.admin.datatable.admin-datatable-sorting', [
                                                'name' => 'id',
                                                'thDisplayName' => 'ID',
                                            ])
                                            @include('livewire.admin.datatable.admin-datatable-sorting', [
                                                'name' => 'gender',
                                                'thDisplayName' => 'Gender',
                                            ])
                                            @include('livewire.admin.datatable.admin-datatable-sorting', [
                                                'name' => 'color',
                                                'thDisplayName' => 'Color',
                                            ])
                                            @include('livewire.admin.datatable.admin-datatable-sorting', [
                                                'name' => 'status',
                                                'thDisplayName' => 'Status',
                                            ])
                                            @include('livewire.admin.datatable.admin-datatable-sorting', [
                                                'name' => 'missing_status',
                                                'thDisplayName' => 'Missing Status',
                                            ])
                                            <th class="align-middle text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($found_dogs->count() > 0)
                                        @php
                                                $sl =
                                                    $found_dogs->perPage() * $found_dogs->currentPage() -
                                                    ($found_dogs->perPage() - 1);
                                            @endphp
                                            @foreach ($found_dogs as $found_dog)
                                                <tr>
                                                    <td>{{ $sl++ }}</td>
                                                    <td>{{ $found_dog->gender }}</td>
                                                    <td>{{ $found_dog->color }}</td>
                                                    <td style="width: 15%;">
                                                        @if ($found_dog->status == 0)
                                                            <button class="btn btn-xs btn-danger"
                                                                wire:click.prevent='changeStatus({{ $found_dog->id }})'
                                                                style="font-weight: normal; font-size: 11px; padding: 1px 7px;">{!! loadingStateStatus('changeStatus(' . $found_dog->id . ')', 'In-Active') !!}</button>
                                                        @else
                                                            <button class="btn btn-xs btn-success"
                                                                wire:click.prevent='changeStatus({{ $found_dog->id }})'
                                                                style="font-weight: normal; font-size: 11px; padding: 1px 7px;">{!! loadingStateStatus('changeStatus(' . $found_dog->id . ')', 'Active') !!}</button>
                                                        @endif
                                                    </td>
                                                    <td>{{ $found_dog->missing_status }}</td>
                                                    <td class="text-center">
                                                        <button
                                                            class="btn btn-sm btn-soft-primary waves-effect waves-light action-btn edit_btn"
                                                            wire:click.prevent='editData({{ $found_dog->id }})'
                                                            wire:loading.attr='disabled'>
                                                            <i
                                                                class="mdi mdi-square-edit-outline font-size-13 align-middle"></i>
                                                        </button>
                                                        <button
                                                            class="btn btn-sm btn-soft-danger waves-effect waves-light action-btn delete_btn"
                                                            wire:click.prevent='deleteConfirmation({{ $found_dog->id }})'
                                                            wire:loading.attr='disabled'>
                                                            <i class="bx bx-trash font-size-13 align-middle"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" class="text-center pt-5 pb-5">No lost dogs found!
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent">
                            {{ $found_dogs->links('livewire.pagination-links') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div wire:ignore.self class="modal fade" id="deleteDataModal" tabindex="-1" role="dialog"
        aria-labelledby="modelTitleId">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-md" role="document">
            <div class="modal-content p-5 bg-transparent border-0">
                <div class="modal-body pt-4 pb-4 bg-white" style="border-radius: 10px;">
                    <div class="row justify-content-center mb-2">
                        <div class="col-md-11 text-center">
                            <div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
                                <div class="swal2-icon-content">!</div>
                            </div>
                            <h2>Are you sure?</h2>
                            <p class="mb-4">You won't be able to revert this!</p>

                            <button type="button" class="btn btn-sm btn-success waves-effect waves-light"
                                wire:click.prevent='deleteData' wire:loading.attr='disabled'>
                                {!! loadingStateWithText('deleteData', 'Yes, Delete.') !!}
                            </button>
                            <button type="button" class="btn btn-sm btn-danger waves-effect waves-light"
                                data-bs-dismiss="modal">No, Cancel.</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Modal -->
</div>

@push('scripts')
    <script>
        window.addEventListener('found_dog_deleted', event => {
            $('#deleteDataModal').modal('hide');
            Swal.fire(
                "Deleted!",
                "The admin has been deleted.",
                "success"
            );
        });
    </script>
@endpush
