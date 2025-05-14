@extends('layouts.admin')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Score Batter Second</h1>
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
                                <h3 class="card-title">All score batter second list here</h3>
                            </div>
                            <!-- /.card-header -->
                            {{-- card body --}}
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Match Name</th>
                                            <th>Team Name</th>
                                            <th>Player Name</th>
                                            <th>Runs</th>
                                            <th>Out type</th>
                                            <th>Out by type</th>
                                            <th>One</th>
                                            <th>Two</th>
                                            <th>Three</th>
                                            <th>Four</th>
                                            <th>Six</th>
                                            <th>Balls</th>
                                            <th>Strike Rate</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalRun = 0;
                                            $mkData = [];
                                        @endphp
                                        @foreach ($data as $key => $row)
                                            <tr>
                                                @php
                                                    $BatterRuns = $row->scoreupdateone->one + $row->scoreupdatetwo->two * 2 +
                                                                  $row->scoreupdatethree->three * 3 + $row->scoreupdatefour->four * 4 +
                                                                  $row->scoreupdatesix->six * 6;
                                                    $totalRun = $totalRun + $BatterRuns;
                                                    if($mkData){
                                                        if(isset($mkData[$row->matchh->match_name])){
                                                            if(isset($mkData[$row->matchh->match_name][$row->team->team_name])){
                                                                $mkData[$row->matchh->match_name][$row->team->team_name] = $mkData[$row->matchh->match_name][$row->team->team_name] + $BatterRuns;
                                                            }else {
                                                                $mkData[$row->matchh->match_name][$row->team->team_name] = $BatterRuns;
                                                            }
                                                        }else {
                                                            $mkData[$row->matchh->match_name] = [ $row->team->team_name=> $BatterRuns];
                                                        }
                                                    }else {
                                                        $mkData[$row->matchh->match_name] = [ $row->team->team_name=> $BatterRuns];
                                                    }
                                                @endphp
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $row->matchh->match_name }}</td>
                                                <td>{{ $row->team->team_name }}</td>
                                                <td>{{ $row->player->player_name }}</td>
                                                <td>{{ $BatterRuns }}</td>
                                                <td>{{ $row->scoreupdate->out_type }}</td>
                                                <td>{{ $row->scoreupdateoutbytype->out_by_type }}</td>
                                                <td>{{ $row->scoreupdateone->one }}</td>
                                                <td>{{ $row->scoreupdatetwo->two }}</td>
                                                <td>{{ $row->scoreupdatethree->three }}</td>
                                                <td>{{ $row->scoreupdatefour->four }}</td>
                                                <td>{{ $row->scoreupdatesix->six }}</td>
                                                <td>{{ $row->scoreupdateballsplayed->balls_played }}</td>
                                                @php
                                                    $Balls = $row->scoreupdateballsplayed->balls_played;
                                                @endphp
                                                <td>
                                                    @if ($BatterRuns > 0 and $BatterRuns == 0)
                                                        {{ $BatterRuns*100 }}
                                                        @elseif ($Balls > 0 and $BatterRuns == 0)
                                                        {{ $Balls * $BatterRuns }}
                                                        @elseif ($Balls == 0 and $BatterRuns == 0)
                                                        {{ $Balls * $BatterRuns }}
                                                        @elseif ($Balls == 0 and $BatterRuns > 0 )
                                                        {{ $BatterRuns *100 }}
                                                        @elseif ($BatterRuns > 0 and $Balls >= 0)
                                                        {{ ($BatterRuns / $Balls) * 100 }}
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm edit"
                                                        data-id="{{ $row->id }}" data-toggle="modal"
                                                        data-target="#editModal"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('scorebattersecond.delete', $row->id) }}"
                                                        class="btn btn-danger btn-sm" id="delete"><i
                                                            class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <h1>Total Runs:- {{ $totalRun }}</h1>
                                    @foreach ($mkData as $key => $item)
                                        <h3>{{$key}}</h3>
                                        @foreach ($item as $keys => $items)
                                            {{$keys . ': ' . $items}} <br>
                                        @endforeach
                                    @endforeach
                                    <br>
                                </table>
                            </div>
                            <!-- /.card-body -->
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Score batter second</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('scorebattersecond.store') }}" method="Post">
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
                            <label for="out type">Out type</label>
                            <select class="form-control" name="scoreupdate_id" required="">
                                @foreach ($scoreupdate as $row)
                                    <option value="{{ $row->id }}">{{ $row->out_type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="out by type">Out by type</label>
                            <select class="form-control" name="outby_id" required="">
                                @foreach ($scoreupdate as $row)
                                    <option value="{{ $row->id }}">{{ $row->out_by_type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="one">One</label>
                            <select class="form-control" name="one_id" required="">
                                @foreach ($scoreupdate as $row)
                                    <option value="{{ $row->id }}">{{ $row->one }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="Two">Two</label>
                            <select class="form-control" name="two_id" required="">
                                @foreach ($scoreupdate as $row)
                                    <option value="{{ $row->id }}">{{ $row->two }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="three">Three</label>
                            <select class="form-control" name="three_id" required="">
                                @foreach ($scoreupdate as $row)
                                    <option value="{{ $row->id }}">{{ $row->three }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="four">Four</label>
                            <select class="form-control" name="four_id" required="">
                                @foreach ($scoreupdate as $row)
                                    <option value="{{ $row->id }}">{{ $row->four }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="six">Six</label>
                            <select class="form-control" name="six_id" required="">
                                @foreach ($scoreupdate as $row)
                                    <option value="{{ $row->id }}">{{ $row->six }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="balls_played">Balls</label>
                            <select class="form-control" name="balls_played_id" required="">
                                @foreach ($scoreupdate as $row)
                                    <option value="{{ $row->id }}">{{ $row->balls_played }}</option>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Score batter second</h5>
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
            $.get("scorebattersecond/edit/" + subcat_id, function(data) {
                $("#modal_body").html(data);
            });
        });
    </script>
@endsection
