<form action="{{ route('commentrycreate.update') }}" method="Post">
    @csrf
    <div class="modal-body">
        <div class="from-group">
            <label for="to">To</label>
            <input type="hidden" name="id" value="{{ $data->id }}">
            <input type="text" class="form-control"  name="to" value="{{ $data->to }}" required="">
            <small id="emailHelp" class="from-text text-muted">This is you to</small>
        </div>
        <div class="from-group">
            <label for="details">Details</label>
            <input type="hidden" name="id" value="{{ $data->id }}">
            <input type="text" class="form-control"  name="details" value="{{ $data->details }}" required="">
            <small id="emailHelp" class="from-text text-muted">This is you details</small>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary">Update</button>
    </div>
</form>
