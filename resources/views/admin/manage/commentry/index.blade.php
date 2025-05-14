@extends('layouts.admin')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">commentry
                        </h1>
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
                                <h3 class="card-title">All commentry list here</h3>
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
                                            <th>Batter Name</th>
                                            <th>To</th>
                                            <th>Bowler Name</th>
                                            <th>Details</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($commentry as $key => $row)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $row->matchh->match_name }}</td>
                                                <td>{{ $row->team->team_name }}</td>
                                                <td>{{ $row->player->player_name }}</td>
                                                <td>{{ $row->CommentryCreateTo->to }}</td>
                                                <td>{{ $row->player2->player_name }}</td>
                                                <td>{{ $row->CommentryCreateDetails->details }}</td>

                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm edit"
                                                        data-id="{{ $row->id }}" data-toggle="modal"
                                                        data-target="#editModal"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('commentry.delete', $row->id) }}"
                                                        class="btn btn-danger btn-sm" id="delete"><i
                                                            class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add commentrys</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('commentry.store') }}" method="Post">
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
                            <label for="player_name">Batter Name</label>
                            <select class="form-control" name="player_id" required="">
                                @foreach ($player as $row)
                                    <option value="{{ $row->id }}">{{ $row->player_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="to">To</label>
                            <select class="form-control" name="to_id" required="">
                                @foreach ($CommentryCreate as $row)
                                    <option value="{{ $row->id }}">{{ $row->to }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="player_name">Bowler Name</label>
                            <select class="form-control" name="player2_id" required="">
                                @foreach ($player as $row)
                                    <option value="{{ $row->id }}">{{ $row->player_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="details">Details</label>
                            <select class="form-control" name="details_id" required="">
                                @foreach ($CommentryCreate as $row)
                                    <option value="{{ $row->id }}">{{ $row->details }}</option>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Commentry</h5>
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
            $.get("commentry/edit/" + subcat_id, function(data) {
                $("#modal_body").html(data);
            });
        });
    </script>
@endsection
