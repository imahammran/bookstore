@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>BNM Author List </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url()->previous() }}" title="Go back"> <i class="fas fa-backward "></i> </a>
                <a class="btn btn-success" href="{{ route('authors.create') }}" title="Create an author"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>URL</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($authors as $author)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $author->name }}</td>
                <td>{{ $author->address }}</td>
                <td>{{ $author->phone }}</td>
                <td>{{ $author->url }}</td>
                <td>
                    <form action="{{ route('authors.destroy', $author->id) }}" method="POST">

                        <a href="{{ route('authors.show', $author->id) }}" title="show">
                            <i class="fas fa-eye text-success fa-lg"></i>
                        </a>

                        <a href="{{ route('authors.edit', $author->id) }}" title="update">
                            <i class="fas fa-edit fa-lg"></i>
                        </a>
                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $authors->links() !!}

@endsection