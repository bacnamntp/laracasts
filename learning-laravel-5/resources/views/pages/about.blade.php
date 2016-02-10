@extends('app');


@section('content')

    <h1>About me</h1>

    @if(count($people))
        <h3>People I think</h3>

        <ul>
            @foreach($people as $person)
                <li>{{ $person }}</li>
            @endforeach
        </ul>
    @endif

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque, dolore maxime temporibus quam vel blanditiis ad
        similique pariatur at alias odit laudantium repudiandae error molestiae, fuga, praesentium in earum tenetur.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam consequatur culpa cupiditate delectus deserunt
        dolores ducimus ea eos illo, impedit necessitatibus pariatur quam quasi qui recusandae velit veniam, vero
        voluptatibus?</p>
@stop