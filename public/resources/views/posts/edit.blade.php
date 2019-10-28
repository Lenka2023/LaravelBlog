@extends('layouts.layout')

@section('content')
    <h2>Edit a post:</h2>

    <form action="/posts/{{$post->id}}" method="post"enctype="multipart/form-data">

        {{csrf_field()}}
        {!! method_field('patch') !!}


        <div class="form-group">
            <label for="title">Title:</label>
            <input class="form-control" type="text" name="title" id="title" value="{{{$post->title}}}">
        </div>

        <div class="form-group">
            <label for="alias">Alias:</label>
            <input class="form-control" type="text" name="alias" id="alias" value="{{$post->alias}}">
        </div>

        <div class="form-group">
            <label for="intro">Intro:</label>
            <textarea class="form-control" type="text" name="intro" id="intro" >{{$post->intro}}</textarea>
        </div>

        <div class="form-group">
            <label for="body">Body:</label>
            <textarea class="form-control" type="text" name="body" id="body">{{$post->body}}</textarea>
        </div>
        
        <div class="form-group">
            <label for="file">Image:</label>
            <input class="btn btn-primary"  type="file" name="file" > <br/>
        </div>
         <div class="form-group">
            <label for="category_id">Category:</label>
            <select class="form-control"  name="category_id" id="category_id">
                <?php $selectedvalue=$post->category_id ?>
              @foreach($cat as $key => $value) 
              <option value="{{$value->id}}"{{$selectedvalue==$value['id'] ? 'selected="selected"':''}}>{{$value->name}}</option> 
              @endforeach
            </select>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Update</button>
        </div>

        @include('layouts.error')

    </form>


@endsection
