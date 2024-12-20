@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 mt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="uil uil-files-landscapes"></i> My Post</h1>
    </div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-10" role="alert">
  {{ session('success') }}
</div>
@endif
    <div class="table-responsive col-lg-12">
      <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create new post</a>
        <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post)
            <tr>
              @if (request('page'))
                  @php
                      $page = request('page');
                      $curentpage=$page*10-10;
                  @endphp
                  <td>{{ $loop->iteration+$curentpage }}</td>
                  @else
                  <td>{{ $loop->iteration }}</td>
              @endif
              <td>{{ $post->title  }}</td>
              <td>{{ $post->category->name}}</td>
              <td style="width: 100px; ">
                <a href="{{ asset('post') }}/{{ $post->slug }}" class="badge text-bg-primary" target="_blank"><i class="uil uil-eye"></i></a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge text-bg-warning"><i class="uil uil-edit"></i></a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="uil uil-times-circle"></i></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection