@extends('layouts.layout')

@section('content')
    <div class="row">
        <?php $no=1;?>
    
        @foreach($posts as $post)

                <div class="col-md-4">
                     <p>{{ $no++ }}</p>
                     <h2>{!! $post->title !!}</h2>
                    <p>{!! $post->intro !!}</p>
                    <p>{!! $post->category['name'] !!}</p>
                   <p><a href="posts/{{ $post->id}}" class="btn btn-default">Читать далее</a> </p>
                   <p><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Редактировать</a> </p>
                    <form action="/posts/{{$post->id}}" method="post">
                        {{csrf_field()}}
                        {!! method_field('delete') !!}
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>

                </div>

        @endforeach
    </div>

@endsection
