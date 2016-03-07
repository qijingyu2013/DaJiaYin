 @extends('base.base')
 @section('content')
 <div class="container">
    <div class="content">
        <div class="title">{{ $name }}</div>
    </div>
</div>
 @stop

 @for ($i = 0; $i < 1 ; $i++)
 	{{-- expr --}}
 @endfor

@foreach ($array as $element)
	{{-- expr --}}
@endforeach