@extends('layout.app')

@section('content')
    <div class="tab-content tab-content-basic">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
            <div class="row">
                <div class="row flex-grow">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card card-rounded">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                    <div>
                                        <h4 class="card-title card-title-dash">Data User</h4>
                                    </div>
                                    <div>
                                        {{-- Hanya tampilkan tombol Tambah Data jika pengguna adalah admin --}}
                                        @if(auth()->user()->role == 'admin')
                                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-lg text-white mb-0 me-0">
                                                <i class="mdi mdi-account-plus"></i> Tambah Data
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="table-responsive mt-1">
                                    <table class="table select-table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                {{-- Hanya tampilkan kolom Action jika pengguna adalah admin --}}
                                                @if(auth()->user()->role == 'admin')
                                                    <th>Action</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse ($users as $user)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->role }}</td>
                                                    <td class="d-sm-flex justify-content align-items-start">
                                                        {{-- Hanya tampilkan tombol Edit dan Delete jika pengguna adalah admin --}}
                                                        @if(auth()->user()->role == 'admin')
                                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm text-white">
                                                                Edit
                                                            </a>
                                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm text-white"
                                                                    onclick="return confirm('Data akan dihapus permanen, apakah kamu yakin?')">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="{{ auth()->user()->role == 'admin' ? '5' : '4' }}">No data available</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection