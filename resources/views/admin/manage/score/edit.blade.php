<form action="{{ route('score.update') }}" method="Post">
    @csrf
    <div class="modal-body">
        <div class="from-group">
            <label for="match_name">Match Name</label>
            <select class="form-control" disabled="" style="color: blue" name="match_id" required="">
                @foreach ($match as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->match_id) selected="" @endif>{{ $row->match_name }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="from-group">
            <label for="team_name">Team Name</label>
            <select class="form-control" disabled="" style="color: blue" name="team_id" required="">
                @foreach ($team as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->team_id) selected="" @endif>{{ $row->team_name }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="from-group">
            <label for="player_name">Player Name</label>
            <select class="form-control" disabled="" style="color: blue" name="player_id" required="">
                @foreach ($player as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->player_id) selected="" @endif>{{ $row->player_name }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="from-group">
            <label for="out_type">Out type</label>
            <select class="form-control"  name="scoreupdate_id" required="">
                @foreach ($scoreupdate as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->scoreupdate_id) selected="" @endif>{{ $row->out_type }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="from-group">
            <label for="out_by_type">Out by type</label>
            <select class="form-control" name="outby_id" required="">
                @foreach ($scoreupdate as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->outby_id) selected="" @endif>{{ $row->out_by_type }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="from-group">
            <label for="one">One</label>
            <select class="form-control" name="one_id" required="">
                @foreach ($scoreupdate as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->one_id) selected="" @endif>{{ $row->one }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="from-group">
            <label for="two">Two</label>
            <select class="form-control" name="two_id" required="">
                @foreach ($scoreupdate as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->two_id) selected="" @endif>{{ $row->two }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="from-group">
            <label for="three">Three</label>
            <select class="form-control"  name="three_id" required="">
                @foreach ($scoreupdate as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->three_id) selected="" @endif>{{ $row->three }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="from-group">
            <label for="four">Four</label>
            <select class="form-control"  name="four_id" required="">
                @foreach ($scoreupdate as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->four_id) selected="" @endif>{{ $row->four }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="from-group">
            <label for="six">Six</label>
            <select class="form-control"  name="six_id" required="">
                @foreach ($scoreupdate as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->six_id) selected="" @endif>{{ $row->six }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="from-group">
            <label for="balls_played">Balls</label>
            <select class="form-control"  name="balls_played_id" required="">
                @foreach ($scoreupdate as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->balls_played_id) selected="" @endif>{{ $row->balls_played }}</option>
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
