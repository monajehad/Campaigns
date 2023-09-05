@extends('backend.layouts.app')

@section('content')
    <h1>Campaigns</h1>
@can('add_campaigns')
    <a href="{{ route('campaigns.create') }}" class="btn btn-primary mb-3">Create Campaign</a>
@endcan
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Target</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($campaigns as $campaign)
                <tr>
                    <td>{{ $campaign->name }}</td>
                    <td>{{ $campaign->description }}</td>
                    <td>{{ $campaign->target }}</td>
                    <td>{{ $campaign->price }}</td>
                    <td>
                        @can('view_campaigns')
                        <a href="{{ route('campaigns.show', $campaign) }}" class="btn btn-info btn-sm">View</a>
                        @endcan
                        @can('edit_campaigns')

                        <a href="{{ route('campaigns.edit', $campaign) }}" class="btn btn-primary btn-sm">Edit</a>
                        @endcan
                        @can('delete_campaigns')

                        <a href="{{ route('campaigns.select-winner', $campaign) }}" class="btn btn-primary btn-sm">winner</a>
@endcan
                        <form action="{{ route('campaigns.destroy', $campaign) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this campaign?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection