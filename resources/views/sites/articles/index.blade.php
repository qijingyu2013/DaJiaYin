 @extends('base.base')
 @section('content')
 <div class="container">
    <div class="content">
        @foreach ($articles as $element)
        <h1><a href="/articles/{{$element-> id}}">{{$element->title}}</a></h1>
         <article>
            <h2><a href="/articles/{{$element->id}}">{{$element->content}}</a></h2>
         </article>   
        @endforeach
    </div>
</div>
 @stop