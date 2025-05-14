<form action="{{ route('scoreupdates.update') }}" method="Post">
    @csrf
    <div class="modal-body">
        <div class="from-group">
            <label for="out_type">out_type</label>
            <input type="hidden" name="id" value="{{ $data->id }}">
            <input type="text" class="form-control" name="out_type" value="{{ $data->out_type }}" required="">
            <small id="emailHelp" class="from-text text-muted">This is you out_type</small>
        </div>
        <div class="from-group">
            <label for="out_by_type">out_by_type</label>
            <input type="text" class="form-control" name="out_by_type" value="{{ $data->out_by_type }}" required="">
            <small id="emailHelp" class="from-text text-muted">This is you score name</small>
        </div>
        <div class="from-group">
            <label for="one">One</label>
            <input type="text" class="form-control" name="one" value="{{ $data->one }}" required="">
            <small id="emailHelp" class="from-text text-muted">This is you score name</small>
        </div>
        <div class="from-group">
            <label for="two">Two</label>
            <input type="text" class="form-control" name="two" value="{{ $data->two }}" required="">
            <small id="emailHelp" class="from-text text-muted">This is you score name</small>
        </div>
        <div class="from-group">
            <label for="three">Three</label>
            <input type="text" class="form-control" name="three" value="{{ $data->three }}" required="">
            <small id="emailHelp" class="from-text text-muted">This is you score name</small>
        </div>
        <div class="from-group">
            <label for="four">Four</label>
            <input type="text" class="form-control" name="four" value="{{ $data->four }}" required="">
            <small id="emailHelp" class="from-text text-muted">This is you score name</small>
        </div>
        <div class="from-group">
            <label for="six">Six</label>
            <input type="text" class="form-control" name="six" value="{{ $data->six }}" required="">
            <small id="emailHelp" class="from-text text-muted">This is you score name</small>
        </div>
        <div class="from-group">
            <label for="balls_played">Balls</label>
            <input type="text" class="form-control" name="balls_played" value="{{ $data->balls_played }}" required="">
            <small id="emailHelp" class="from-text text-muted">This is you score balls played</small>
        </div>
    </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary">Update</button>
    </div>
</form>
