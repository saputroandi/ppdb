@extends('layouts.dashboard')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Post Title</th>
            <th scope="col">Post Content</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    @foreach ($news as $content)
    <tbody>
        <tr>
            <td scope="row">1</td>
            <td>{{$content->post_title}}</td>
            <td>{{$content->post_content}}</td>
            <td class="d-flex">
                <a href="/news/show/{{$content->id}}/edit" class="btn btn-primary">Edit</a>
                <form action="/news/delete/{{$content->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure want to delete this news ?')">Delete</button>
                </form>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>
@endsection