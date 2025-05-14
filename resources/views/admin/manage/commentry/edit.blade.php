<form action="{{ route('commentry.update') }}" method="Post">
    @csrf
    <div class="modal-body">
        <div class="from-group">
            <label for="match_name">Match Name</label>
            <select class="form-control"  style="color: blue" name="match_id" required="">
                @foreach ($match as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->match_id) selected="" @endif>{{ $row->match_name }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="from-group">
            <label for="team_name">Team Name</label>
            <select class="form-control"  style="color: blue" name="team_id" required="">
                @foreach ($team as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->team_id) selected="" @endif>{{ $row->team_name }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="from-group">
            <label for="player_name">Batter Name</label>
            <select class="form-control"  style="color: blue" name="player_id" required="">
                @foreach ($player as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->player_id) selected="" @endif>{{ $row->player_name }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="from-group">
            <label for="to">To</label>
            <select class="form-control"  style="color: blue" name="to_id" required="">
                @foreach ($CommentryCreate as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->to_id) selected="" @endif>{{ $row->to }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="from-group">
            <label for="player_name">Bowler Name</label>
            <select class="form-control"  style="color: blue" name="player2_id" required="">
                @foreach ($player as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->player2_id) selected="" @endif>{{ $row->player_name }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="from-group">
            <label for="details">Details</label>
            <select class="form-control"  style="color: blue" name="details_id" required="">
                @foreach ($CommentryCreate as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->details_id) selected="" @endif>{{ $row->details }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary">Update</button>
    </div>
</form>
