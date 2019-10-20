@extends('layouts.app')

@section('title', 'All Books')

@section('content')
    <h1 class="mt-5 mb-5 text-center">List Of Books</h1>
    @if (Auth::user()->isAdmin())
        <div class="row justify-content-center mb-5">
            <a href="{{ route('book.create') }}">Create new book</a>
        </div>
    @endif
    <div class="row justify-content-center">
        <table class="table table-hover col-xl-12">
            <thead>
            <tr>
                <th scope="col">Cover</th>
                <th scope="col">Authors</th>
                <th scope="col">Title</th>
                <th scope="col">Pages</th>
                @if (Auth::user()->isAdmin())
                    <th scope="col">Actions</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>
                        <img @if($book->cover) src="/storage/{{ $book->cover }}"
                             @else src="https://fakeimg.pl/350x200/?text=No Image" @endif alt="{{ $book->title }}"
                             width="50" height="50">
                    </td>
                    <td>
                        @foreach($book->authors as $author)
                            {{ $author->surname }}, {{ $author->name }}
                        @endforeach
                        @if(count($book->authors) < 1)
                            ==//==
                        @endif
                    </td>
                    <td>
                        {{ $book->title }}
                    </td>
                    <td>
                        {{ $book->num_of_pages }}
                    </td>
                    @if (Auth::user()->isAdmin())
                        <td>
                            <a href="{{ route('book.show', ['id' => $book->id]) }}"
                               class="btn btn-outline-secondary">Show</a>
                            <a href="{{ route('book.edit', ['id' => $book->id]) }}"
                               class="btn btn-outline-info">Edit</a>
                            <a href="{{ route('book.delete', ['id' => $book->id]) }}"
                               class="btn btn-outline-danger">Delete</a>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row justify-content-center col-xl-12 mt-5">
        {{ $books->links() }}
    </div>
@endsection