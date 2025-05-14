<form action="{{ route('updatebowler.update') }}" method="Post">
    @csrf
    <div class="modal-body">
        <div class="from-group">
            <label for="overs">overs</label>
            <input type="hidden" name="id" value="{{ $data->id }}">
            <input type="text" class="form-control"  name="overs" value="{{ $data->overs }}" required="">
            <small id="emailHelp" class="from-text text-muted">This is you overs</small>
        </div>
        <div class="from-group">
            <label for="maidens">maidens</label>
            <input type="hidden" name="id" value="{{ $data->id }}">
            <input type="text" class="form-control"  name="maidens" value="{{ $data->maidens }}" required="">
            <small id="emailHelp" class="from-text text-muted">This is you maidens</small>
        </div>
        <div class="from-group">
            <label for="runs">runs</label>
            <input type="hidden" name="id" value="{{ $data->id }}">
            <input type="text" class="form-control"  name="runs" value="{{ $data->runs }}" required="">
            <small id="emailHelp" class="from-text text-muted">This is you runs</small>
        </div>
        <div class="from-group">
            <label for="wickets">wickets</label>
            <input type="hidden" name="id" value="{{ $data->id }}">
            <input type="text" class="form-control"  name="wickets" value="{{ $data->wickets }}" required="">
            <small id="emailHelp" class="from-text text-muted">This is you wickets</small>
        </div>
        <div class="from-group">
            <label for="no_balls">no_balls</label>
            <input type="hidden" name="id" value="{{ $data->id }}">
            <input type="text" class="form-control"  name="no_balls" value="{{ $data->no_balls }}" required="">
            <small id="emailHelp" class="from-text text-muted">This is you overs</small>
        </div>
        <div class="from-group">
            <label for="wides">wides</label>
            <input type="hidden" name="id" value="{{ $data->id }}">
            <input type="text" class="form-control"  name="wides" value="{{ $data->wides }}" required="">
            <small id="emailHelp" class="from-text text-muted">This is you wides</small>
        </div>
        <div class="from-group">
            <label for="panalty_runs">panalty_runs</label>
            <input type="hidden" name="id" value="{{ $data->id }}">
            <input type="text" class="form-control"  name="panalty_runs" value="{{ $data->panalty_runs }}" required="">
            <small id="emailHelp" class="from-text text-muted">This is you panalty_runs</small>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary">Update</button>
    </div>
</form>
