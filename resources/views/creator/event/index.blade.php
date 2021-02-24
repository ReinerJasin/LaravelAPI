@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">List Data Event</h1>
        </div>
        <div class="row">
            <div class="col-md-2 offset-md-10">
                <a href="{{ route('admin.user.create') }}" class="btn btn-primary btn-block" role="button"
                   aria-pressed="true">Tambah</a>
            </div>
        </div>
        <div class="row" style="margin-top: 30px;">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">event ID</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Tanggal Acara</th>
                    <th scope="col">Created by</th>
                    <th scope="col">Total Attendant</th>
                    <th scope="col">Event Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td>
                                        {{ $event->title }}
                                    </td>
                                    <td>
                                        {{ $event->title }}
                                    </td>
                                </tr>
                            @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
