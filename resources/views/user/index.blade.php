@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">List Data User</h1>
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
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Event List</th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>
                            <a href="@auth {{ route('creator.event.edit', $event) }} @endauth">
                                {{ $event->title }}
                            </a>
                        </td>
                        <td>{{ $event->description }}</td>
                        <td>{{ $event->status }}</td>
                        <td>{{ $event->creator->name }}</td>
                        <td>{{ $event->updated_at }}</td>
                        <td>{{ $event->created_at }}</td>
                        @auth
                            <td>
                                <form action="{{ route('creator.event.destroy', $event) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        @endauth
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
