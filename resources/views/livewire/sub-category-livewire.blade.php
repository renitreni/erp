<div>
    @push('breadcrumb-main')
        Sub Category List
    @endpush
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <button class="btn btn-primary" wire:click='$set("detail", [])' data-bs-toggle="modal"
                            data-bs-target="#crudModal">Add Item</button>
                    </div>
                    <livewire:table.sub-categories-table />
                </div>
            </div>
        </div>
    </div>
 <!-- Modal -->
 <div wire:ignore.self class="modal fade" id="crudModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
 aria-labelledby="crudModalLabel" aria-hidden="true">
 <div class="modal-dialog">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="crudModalLabel">Item Form</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
             <div class="row">
                <div class="col-md-12 mb-2">
                    <label for="">Category</label>
                    <select class="form-select" wire:model='detail.category_id'>
                        <option value="">Unspecified</option>
                        @foreach ($categories ?? [] as $category)
                            <option value="{{ $category['id'] }}">{{ $category['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                 <div class="col-md-12 mb-2">
                     <label for="">Name</label>
                     <input type="text" class="form-control" wire:model='detail.name'>
                 </div>
                 @include('partials.error-message')
             </div>
         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
             @if (!isset($detail['id']))
                 <button type="button" class="btn btn-primary" wire:click='store'>Save</button>
             @else
                 <button type="button" class="btn btn-danger" wire:click='delete'>Delete</button>
                 <button type="button" class="btn btn-primary" wire:click='update'>Update</button>
             @endif
         </div>
     </div>
 </div>
</div>

@push('scripts')
 <script>
     var crudModal = new bootstrap.Modal(document.getElementById('crudModal'));
     window.addEventListener('close-modal-crudModal', event => {
         crudModal.hide();
     })
     window.addEventListener('open-modal-crudModal', event => {
         crudModal.show();
     })
 </script>
@endpush
</div>
