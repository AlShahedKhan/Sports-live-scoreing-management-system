<form action="{{ route('matchh.update') }}" method="Post">
    @csrf
    <div class="modal-body">
        <div class="from-group">
            <label for="team_name">Team Name</label>
            <select class="form-control" name="team_id" required="">
                @foreach ($team as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->team_id) selected="" @endif>{{ $row->team_name }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="from-group">
            <label for="match_name">Match Name</label>
            <input type="text" class="form-control" name="match_name" value="{{ $data->match_name }}" required="">
            <small id="emailHelp" class="from-text text-muted">This is you sub match</small>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary">Update</button>
    </div>
</form>
