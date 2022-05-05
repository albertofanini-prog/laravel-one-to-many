@extends('layouts.app')

@section('content')
    
    <div class="container">
            <form action="{{ route('admin.posts.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="title">Titolo</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title')}}" aria-describedby="emailHelp">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content">Contenuto del post</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="3">{{ old('content')}}</textarea>                    @error('content')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category_id">Categoria</label>
                    <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                      <option value=""></option>
                      @foreach ($categories as $category)
                          <option {{old('category_id') && old('category_id') == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>

                <div class="form-group">
                    <label for="title">Data di pubblicazione</label>
                    <input type="date" class="form-control @error('published_at') is-invalid @enderror" id="published_at" name="published_at" value="{{ old('published_at')}}" aria-describedby="emailHelp">
                    @error('published_at')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Crea</button>
            
            </form>
    </div>

@endsection