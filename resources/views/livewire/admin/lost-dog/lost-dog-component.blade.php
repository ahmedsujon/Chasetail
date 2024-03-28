<div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Lost Dog</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Lost Dog</li>
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
                            <button wire:click="exportLostDogsExcel"
                                class="btn btn-sm btn-dark waves-effect waves-light" style="float: right;"><i
                                    class="bx bxs-file-pdf"></i> Export Excel</button>
                            <button wire:click="exportLostDogsCSV" class="btn btn-sm btn-dark waves-effect waves-light"
                                style="float: right !important; margin-right: 5px;"><i class="bx bxs-file-pdf"></i>
                                Export
                                CSV</button>
                            {{-- <button wire:click="exportLostDogsPDF" class="btn btn-sm btn-dark waves-effect waves-light"
                                style="float: right !important; margin-right: 5px;"><i class="bx bxs-file-pdf"></i> Export
                                PDF</button> --}}
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
                                                'name' => 'name',
                                                'thDisplayName' => 'Name',
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
                                        @if ($lost_dogs->count() > 0)
                                            @foreach ($lost_dogs as $lost_dog)
                                                <tr>
                                                    <td>{{ $lost_dog->id }}</td>
                                                    <td>{{ $lost_dog->name }}</td>
                                                    <td>{{ $lost_dog->gender }}</td>
                                                    <td>{{ $lost_dog->color }}</td>
                                                    <td style="width: 15%;">
                                                        @if ($lost_dog->status == 0)
                                                            <span
                                                                class="badge badge-pill badge-soft-success font-size-11"
                                                                wire:click.prevent='changeStatus({{ $lost_dog->id }})'>
                                                                {!! loadingStateStatus('changeStatus(' . $lost_dog->id . ')', 'In-Active') !!}
                                                            </span>
                                                        @else
                                                            <span
                                                                class="badge badge-pill badge-soft-danger font-size-11"
                                                                wire:click.prevent='changeStatus({{ $lost_dog->id }})'>
                                                                {!! loadingStateStatus('changeStatus(' . $lost_dog->id . ')', 'Active') !!}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($lost_dog->missing_status == 'Found')
                                                            <button data-bs-toggle="modal"
                                                                wire:click.prevent='editMissingStatusData({{ $lost_dog->id }})'
                                                                data-bs-target="#addDataModal"
                                                                class="btn btn-xs btn-success"
                                                                style="font-weight: normal; font-size: 11px; padding: 1px 7px;">{{ $lost_dog->missing_status }}</button>
                                                        @elseif($lost_dog->missing_status == 'Searching')
                                                            <button data-bs-toggle="modal"
                                                                wire:click.prevent='editMissingStatusData({{ $lost_dog->id }})'
                                                                data-bs-target="#addDataModal"
                                                                class="btn btn-xs btn-warning"
                                                                style="font-weight: normal; font-size: 11px; padding: 1px 7px;">{{ $lost_dog->missing_status }}</button>
                                                        @else
                                                            <button data-bs-toggle="modal"
                                                                wire:click.prevent='editMissingStatusData({{ $lost_dog->id }})'
                                                                data-bs-target="#addDataModal"
                                                                class="btn btn-xs btn-danger"
                                                                style="font-weight: normal; font-size: 11px; padding: 1px 7px;">{{ $lost_dog->missing_status }}</button>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <button
                                                            class="btn btn-sm btn-soft-primary waves-effect waves-light action-btn edit_btn"
                                                            wire:click.prevent='editData({{ $lost_dog->id }})'
                                                            wire:loading.attr='disabled'>
                                                            <i
                                                                class="mdi mdi-square-edit-outline font-size-13 align-middle"></i>
                                                        </button>
                                                        <button
                                                            class="btn btn-sm btn-soft-danger waves-effect waves-light action-btn delete_btn"
                                                            wire:click.prevent='deleteConfirmation({{ $lost_dog->id }})'
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
                            {{ $lost_dogs->links('livewire.pagination-links') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Data Modal -->
    <div wire:ignore.self class="modal fade" id="addDataModal" tabindex="-1" role="dialog" data-bs-backdrop="static"
        data-bs-keyboard="false" aria-labelledby="modelTitleId">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: white;">
                    <h5 class="modal-title m-0" id="mySmallModalLabel">Update Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-11">
                            <form wire:submit.prevent='changeMissingStatus' enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 row">
                                            <label class="col-md-2 col-form-label">Select Status</label>
                                            <div class="col-md-12">
                                                <select class="form-select" wire:model.bluer='missing_status'>
                                                    <option disabled selected>Select Status</option>
                                                    <option value="Searching">Searching</option>
                                                    <option value="Not Found">Not Found</option>
                                                    <option value="Found">Found</option>
                                                </select>
                                                @error('missing_status')
                                                    <p class="text-danger" style="font-size: 11.5px;">{{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row mt-4">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light w-50">
                                            {!! loadingStateWithText('changeMissingStatus', 'Update') !!}
                                        </button>
                                    </div>
                                </div>
                            </form>
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
        window.addEventListener('closeModal', event => {
            $('#addDataModal').modal('hide');
        });

        window.addEventListener('lost_dog_deleted', event => {
            $('#deleteDataModal').modal('hide');
            Swal.fire(
                "Deleted!",
                "The admin has been deleted.",
                "success"
            );
        });
    </script>
@endpush
