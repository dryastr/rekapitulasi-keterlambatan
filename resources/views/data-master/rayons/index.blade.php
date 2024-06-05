@extends('layout.app')

@section('content')
    <div class="tab-content tab-content-basic">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-between align-items-start">
                                <div>
                                    <h4 class="card-title card-title-dash">Data Rayon</h4>
                                </div>
                                <div>
                                    {{-- Hanya tampilkan tombol Tambah Data jika pengguna adalah admin --}}
                                    @if(auth()->user()->role == 'admin')
                                        <a href="{{ route('rayons.create') }}" class="btn btn-primary btn-lg text-white mb-0 me-0">
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
                                            <th>Pembimbing Siswa</th>
                                            <th>Rayon</th>
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
                                        @forelse ($rayons as $rayon)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $rayon->pembimbingSiswa->name }}</td>
                                                <td>{{ $rayon->rayon }}</td>
                                                <td class="d-sm-flex justify-content align-items-start">
                                                    {{-- Hanya tampilkan tombol Edit dan Delete jika pengguna adalah admin --}}
                                                    @if(auth()->user()->role == 'admin')
                                                        <a href="{{ route('rayons.edit', $rayon->id) }}" class="btn btn-warning btn-sm text-white">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                        <form action="{{ route('rayons.destroy', $rayon->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm text-white" onclick="return confirm('Data akan dihapus permanen, apakah kamu yakin?')">
                                                                <i class="fas fa-trash-alt"></i> Delete
                                                            </button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="{{ auth()->user()->role == 'admin' ? '4' : '3' }}">No data available</td>
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
@endsection
