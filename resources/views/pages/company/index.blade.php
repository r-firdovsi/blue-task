@extends('layouts.main')

@section('page-level-styles')
    <link rel="stylesheet" href="/wafi/vendor/datatables/dataTables.bs4.css"/>
    <link rel="stylesheet" href="/wafi/vendor/datatables/buttons.bs.css"/>
    <style>
        .dt-buttons {
            float: unset !important;
            text-align: right;
        }
    </style>
@endsection

@section('header')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active">Companies</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="table-container">
                <div class="t-header mb-3">Company list</div>
                <div class="w-100 text-right my-2">
                    <a href="{{route('companies.create')}}" class="btn btn-primary"><i class="icon icon-add-to-list"></i></a>
                </div>
                <table id="table" class="table custom-table">
                    <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Weblink</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('page-level-scripts')
    <!-- Data Tables -->
    <script src="{{asset('wafi/vendor/datatables/dataTables.min.js')}}"></script>
    <script src="{{asset('wafi/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('wafi/vendor/datatables/buttons.min.js')}}"></script>

    <script>
        $('#table').DataTable({
            "processing": true,
            "serverSide": true,
            ajax: function (data, callback, settings) {
                $.get('/company/list', {
                    page: data.draw
                }, function (res) {
                    callback({
                        draw: res.meta.current_page,
                        recordsTotal: res.meta.total,
                        recordsFiltered: res.meta.total,
                        data: res.data
                    });
                });
            },
            columns: [
                {
                    data: null, name: 'Logo', render: function (data) {
                        return `<img class="w-75" src="${data.logo}" />`;
                    }
                },
                {data: 'name', name: 'Name'},
                {data: 'email', name: 'Email'},
                {data: 'weblink', name: 'Weblink'},
                {
                    data: null,
                    name: 'Operations',
                    render: function (data, type, row) {
                        return `<a href="/companies/${data.id}/edit" class="btn btn-light">{{__('main.edit')}}</a><form class="d-inline" method="post" action="/companies/${data.id}"><input type="hidden" name="_token" value="{{ csrf_token() }}" /> <input type="hidden" name="_method" value="delete" /> <button type="submit" class="btn btn-danger">{{__('main.delete')}}</button></form>`;
                    }
                },
            ]
        });
    </script>
@endsection


