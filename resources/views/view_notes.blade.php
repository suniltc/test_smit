@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Notes</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Serb File No.</th>
                                    <th>Category</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Serb File No.</th>
                                    <th>Category</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($notes as $note)
                                    <tr>
                                        <td>{{ $note->note }}</td>
                                        <td><a href="{{ url('note/'.$note->slug) }}">View</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection