@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Projects</div>

                <div class="panel-body">
                    @foreach ($projects as $project)
                        <article>
                        <h4> 
                            <a href="/projects/{{ $project->id }}">
                                {{ $project->client }}
                            </a>
                        </h4>
                        <div class="body"> {{ $project->description }}</div>
                        </article>

                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
