@extends('layouts.master')

@section('page-title')
  Create Pertanyaan
@endsection

@section('content')
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary ">
      <div class="card-header">
          <h3 class="card-title">Questions</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form role="form" action="/pertanyaan" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="title">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="Enter Title">
            @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control @error('body') is-invalid @enderror" rows="3" id="body" name="body" placeholder="Enter ...">
              {{ old('body') }}
            </textarea>
            @error('body')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="profile_id">Profile ID</label>
            <select class="form-control @error('profile_id') is-invalid @enderror" rows="3" id="profile_id" name="profile_id">
              <option value="{{ old('profile_id', '') }}" selected>{{ old('profile_id', 'Select Profile ID') }}</option>
              @forelse ($profile as $data)
                  <option value="{{ $data->id }}">{{ $data->id }}</option>
              @empty
                  <option disable>No Data</option>
              @endforelse
            </select>
            @error('profile_id')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
@endsection
