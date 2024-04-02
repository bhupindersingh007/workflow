@extends('layouts.dashboard')
@section('content')


<h5 class="mb-3">Invitations</h5>

{{-- Invitations --}}

@if ($invitations->count() > 0)
<div class="table-responsive">
    <table class="table table-striped border">
        <thead class="small">
            <tr>
                <th>Project</th>
                <th>Invitation Status</th>
                <th>Invitation By</th>
                <th>Invitation Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($invitations as $invitation)
            <tr>
                <td><a href="{{ route('projects.show', ['project' => $invitation->project]) }}" class="text-body">{{
                        Str::limit($invitation->project->title, 20) }}</a></td>

                <td>
                    <span class="text-{{ App\Models\Invitation::colors($invitation->status) }}">&#9679;</span> {{
                    ucwords($invitation->status) }}
                </td>

                <td>
                    <span>{{ $invitation->invitedBy->fullName }}</span>
                    -
                    <a href="mailto:{{ $invitation->invitedBy->email }}" class="text-body">{{
                        $invitation->invitedBy->email }}</a>
                </td>

                <td>{{ $invitation->created_at->format('d M, Y') }}</td>

                <td>

                    {{-- accept invite --}}

                    <form action="{{ route('invitations.update', ['invitation' => $invitation]) }}" method="POST" class="d-inline-block" onsubmit="confirmSubmit(this);">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="accepted">
                        <button type="submit" class="btn btn-sm" title="Accept Invitation">
                            <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                            </svg>
                        </button>
                    </form>


                    {{-- decline invite --}}

                    <form action="{{ route('invitations.update', ['invitation' => $invitation]) }}" method="POST" class="d-inline-block" onsubmit="confirmSubmit(this);">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="declined">
                        <button type="submit" class="btn btn-sm text-danger" title="Decline Invitation">
                            <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path
                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                </path>
                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                <line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg>

                        </button>
                    </form>
                </td>


            </tr>
            @endforeach

    </table>
</div>

@else
<div class="alert alert-primary">No Pending Invitations.</div>
@endif




@endsection