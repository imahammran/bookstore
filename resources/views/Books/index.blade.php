@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>BNM Book List </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url()->previous() }}" title="Go back"> <i class="fas fa-backward "></i> </a>
                <a class="btn btn-success" href="{{ route('books.create') }}" title="Create a book"> <i class="fas fa-plus-circle"></i>
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
            <th>Title</th>
            <th>ISBN</th>
            <th>Price</th>
            <th>Year</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->isbn }}</td>
                <td>{{ $book->price }}</td>
                <td>{{ $book->year }}</td>
                <td>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST">

                        <a href="{{ route('books.show', $book->id) }}" title="show">
                            <i class="fas fa-eye text-success fa-lg"></i>
                        </a>

                        <a href="{{ route('books.edit', $book->id) }}" title="update">
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

    {!! $books->links() !!}

@endsection