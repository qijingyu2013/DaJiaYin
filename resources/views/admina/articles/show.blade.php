 @extends('base.base')
 @section('content')
 <div class="container">
    <div class="content">
        <h1>{{$articles->title}}</h1>
         <article>
            <h2>{{$articles->content}}</h2>
         </article> 
    </div>
</div>
 @stop