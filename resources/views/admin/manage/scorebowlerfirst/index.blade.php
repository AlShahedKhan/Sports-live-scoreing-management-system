@extends('layouts.admin')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Score bowler 1st</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#teamModal">
                                + Add New
                            </button>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All score bowler first list here</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Match Name</th>
                                            <th>Team Name</th>
                                            <th>Player Name</th>
                                            <th>Runs</th>
                                            <th>Overs</th>
                                            <th>Maidens</th>
                                            <th>Wickets</th>
                                            <th>No balls</th>
                                            <th>Wides</th>
                                            <th>Economy Rate</th>
                                            <th>Panalty runs</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalOvers = 0;
                                            $mkData = [];
                                        @endphp
                                        @foreach ($data as $key => $row)
                                            <tr>
                                                @php
                                                    $Runs = $row->updatebowlerruns->runs;
                                                    $Overs = $row->updatebowlerovers->overs;
                                                    $totalOvers = $totalOvers + $Overs;
                                                    if($mkData){
                                                        if(isset($mkData[$row->matchh->match_name])){
                                                            if(isset($mkData[$row->matchh->match_name][$row->team->team_name])){
                                                                // $mkData[$row->matchh->match_name][$row->team->team_name] = $mkData[$row->matchh->match_name][$row->team->team_name] + $BatterRuns;
                                                                $mkData[$row->matchh->match_name][$row->team->team_name] = [
                                                                        'runs' => $mkData[$row->matchh->match_name][$row->team->team_name]['runs'] + $Runs,
                                                                        'overs' => $mkData[$row->matchh->match_name][$row->team->team_name]['overs'] + $Overs,
                                                                        'wickets' => $mkData[$row->matchh->match_name][$row->team->team_name]['wickets'] + $row->updatebowlerwickets->wickets,
                                                                ];
                                                            }else {
                                                                $mkData[$row->matchh->match_name][$row->team->team_name] = [
                                                                                'runs' => $Runs,
                                                                                'overs' => $Overs,
                                                                                'wickets' => $row->updatebowlerwickets->wickets
                                                                                ];
                                                            }
                                                        }else {
                                                            $mkData[$row->matchh->match_name] = [ $row->team->team_name => [
                                                            'runs' => $Runs,
                                                            'overs' => $Overs,
                                                            'wickets' => $row->updatebowlerwickets->wickets
                                                            ]];
                                                        }
                                                    }else {
                                                        $mkData[$row->matchh->match_name] = [ $row->team->team_name => [
                                                            'runs' => $Runs,
                                                            'overs' => $Overs,
                                                            'wickets' => $row->updatebowlerwickets->wickets
                                                            ]];
                                                    }
                                                @endphp
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $row->matchh->match_name }}</td>
                                                <td>{{ $row->team->team_name }}</td>
                                                <td>{{ $row->player->player_name }}</td>
                                                <td>{{ $row->updatebowlerruns->runs }}</td>
                                                <td>{{ $row->updatebowlerovers->overs }}</td>
                                                <td>{{ $row->updatebowlermaidens->maidens }}</td>
                                                <td>{{ $row->updatebowlerwickets->wickets }}</td>
                                                <td>{{ $row->updatebowlernoballs->no_balls }}</td>
                                                <td>{{ $row->updatebowlerwides->wides }}</td>
                                                <td>
                                                    @if ($Runs == 0 and $Overs ==0)
                                                    {{$Runs}}
                                                    @elseif ($Runs > 0 and $Overs ==0)
                                                    {{ $Runs }}
                                                    @else
                                                    {{ $Runs / $Overs }}
                                                    @endif
                                                </td>
                                                <td>{{ $row->updatebowlerpanaltyruns->panalty_runs }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm edit" data-id="{{ $row->id }}" data-toggle="modal" data-target="#editModal">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('scorebowlerfirst.delete', $row->id) }}" class="btn btn-danger btn-sm" id="delete">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <h1>Total Overs:- {{ $totalOvers }}</h1>
                                    @foreach ($mkData as $key => $item)
                                        <h3>{{$key}}</h3>
                                        @foreach ($item as $keys => $items)
                                            {{$keys . ': ' . $items['runs'] . '/'. $items['wickets'] . ' by '. $items['overs'] . ' Overs'}} <br>
                                        @endforeach
                                    @endforeach
                                    <br>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    {{-- category insert modal --}}
    <!-- Modal -->
    <div class="modal fade" id="teamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Bowler 1st Score</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('scorebowlerfirst.store') }}" method="Post">
                    @csrf
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="player_name">Match Name</label>
                            <select class="form-control" name="match_id" required="">
                                @foreach ($match as $row)
                                    <option value="{{ $row->id }}">{{ $row->match_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="player_name">Team Name</label>
                            <select class="form-control" name="team_id" required="">
                                @foreach ($team as $row)
                                    <option value="{{ $row->id }}">{{ $row->team_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="player_name">Player Name</label>
                            <select class="form-control" name="player_id" required="">
                                @foreach ($player as $row)
                                    <option value="{{ $row->id }}">{{ $row->player_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="overs">Overs</label>
                            <select class="form-control" name="overs_id" required="">
                                @foreach ($updatebowler as $row)
                                    <option value="{{ $row->id }}">{{ $row->overs }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="maidens">Maidens</label>
                            <select class="form-control" name="maidens_id" required="">
                                @foreach ($updatebowler as $row)
                                    <option value="{{ $row->id }}">{{ $row->maidens }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="runs">Runs</label>
                            <select class="form-control" name="runs_id" required="">
                                @foreach ($updatebowler as $row)
                                    <option value="{{ $row->id }}">{{ $row->runs }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="wickets">Wickets</label>
                            <select class="form-control" name="wickets_id" required="">
                                @foreach ($updatebowler as $row)
                                    <option value="{{ $row->id }}">{{ $row->wickets }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="no balls">No Balls</label>
                            <select class="form-control" name="no_balls_id" required="">
                                @foreach ($updatebowler as $row)
                                    <option value="{{ $row->id }}">{{ $row->no_balls }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="wides">Wides</label>
                            <select class="form-control" name="wides_id" required="">
                                @foreach ($updatebowler as $row)
                                    <option value="{{ $row->id }}">{{ $row->wides }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="panalty_runs">Panalty Runs</label>
                            <select class="form-control" name="panalty_runs_id" required="">
                                @foreach ($updatebowler as $row)
                                    <option value="{{ $row->id }}">{{ $row->panalty_runs }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="Submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- edit modal --}}
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Score Bowler First</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="modal_body">

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $('body').on('click', '.edit', function() {
            let subcat_id = $(this).data('id');
            $.get("scorebowlerfirst/edit/" + subcat_id, function(data) {
                $("#modal_body").html(data);
            });
        });
    </script>
@endsection
