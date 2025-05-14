<form action="{{ route('scorebowlerfirst.update') }}" method="Post">
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
            <label for="overs">Overs</label>
            <select class="form-control"  name="overs_id" required="">
                @foreach ($updatebowler as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->overs_id) selected="" @endif>{{ $row->overs }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="from-group">
            <label for="maidens">Maidens</label>
            <select class="form-control" name="maidens_id" required="">
                @foreach ($updatebowler as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->maidens_id) selected="" @endif>{{ $row->maidens }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="from-group">
            <label for="runs">Runs</label>
            <select class="form-control" name="runs_id" required="">
                @foreach ($updatebowler as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->runs_id) selected="" @endif>{{ $row->runs }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="from-group">
            <label for="wickets">Wickets</label>
            <select class="form-control" name="wickets_id" required="">
                @foreach ($updatebowler as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->wickets_id) selected="" @endif>{{ $row->wickets }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="from-group">
            <label for="no_balls">No_Balls</label>
            <select class="form-control"  name="no_balls_id" required="">
                @foreach ($updatebowler as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->no_balls_id) selected="" @endif>{{ $row->no_balls }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="from-group">
            <label for="wides">Wides</label>
            <select class="form-control"  name="wides_id" required="">
                @foreach ($updatebowler as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->wides_id) selected="" @endif>{{ $row->wides }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="from-group">
            <label for="panalty_runs">Panalty_Runs</label>
            <select class="form-control"  name="panalty_runs_id" required="">
                @foreach ($updatebowler as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->panalty_runs_id) selected="" @endif>{{ $row->panalty_runs }}</option>
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
