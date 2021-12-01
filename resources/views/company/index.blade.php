@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }} - {{__('main.companies')}}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{route('companies.create')}}" class="btn btn-primary">{{__('main.add')}}</a>
                            </div>
                            <div class="col-md-12">
                                <table id="table" class="display" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Weblink</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Weblink</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/dataTable.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('#table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": 'http://localhost:8000/company/list'
            });
        });
    </script>
@endsection
