<form action="{{ route('curve.update') }}" method="Post">
    @csrf
    <div class="modal-body">
        <div class="from-group">
            <label for="match_name">Match Name</label>
            <select class="form-control" style="color: blue" name="match_id" required="">
                @foreach ($match as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->match_id) selected="" @endif>{{ $row->match_name }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="from-group">
            <label for="team_name">Team Name</label>
            <select class="form-control" style="color: blue" name="team_id" required="">
                @foreach ($team as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->team_id) selected="" @endif>{{ $row->team_name }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="from-group">
            <label for="runs">Runs</label>
            <input type="text" class="form-control" name="runs" value="{{ $data->runs }}" required="">
            <small id="emailHelp" class="from-text text-muted">This is you runs</small>
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary">Update</button>
    </div>
</form>
