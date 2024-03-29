@extends('layouts.admin')
@section('content')
    @if($projects->count())
        <table class="table table-striped">
            <thead>
            <th>Name</th>
            <th>URL</th>
            <th>Timeline</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th></th>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>
                        <a href="{{ action('ProjectsController@getEdit', $project->id) }}">
                            {{ $project->name }}
                        </a>
                    </td>
                    <td>
                        <a target="_blank" href="{{ $project->url }}">
                            {{ $project->url }}
                        </a>
                    </td>
                    <td>{{ !empty($project->timeline) ? $project->timeline->name : ''}}</td>
                    <td>{{ $project->start_date->format('F jS Y g:i A') }}</td>
                    <td>{{ $project->end_date->format('F jS Y g:i A') }}</td>
                    <td>
                        <a class="confirm" href="{{ action('ProjectsController@getDelete', $project->id) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h3>No Projects</h3>
    @endif
    <a href="{{ action('ProjectsController@getCreate') }}" class="btn btn-info">Create</a>
@endsection
