@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#alldata" role="tab"
                                    aria-controls="alldata" aria-selected="true">Keseluruhan Data</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#rekapdata" role="tab"
                                    aria-controls="rekapdata" aria-selected="false">Rekapitulasi Data</a>
                            </li>
                        </ul>
                        <div>
                            <h4 class="card-title card-title-dash">Data Keterlambatan</h4>
                        </div>
                        <div>
                            {{-- Hanya tampilkan tombol Tambah Data jika pengguna adalah admin --}}
                            @if(auth()->user()->role == 'admin')
                                <a href="{{ route('lates.create') }}" class="btn btn-primary btn-lg text-white mb-0 me-2">
                                    <i class="mdi mdi-account-plus"></i> Tambah Data
                                </a>
                                <a href="{{ route('lates.export') }}" class="btn btn-success btn-lg text-white mb-0" id="exportDataBtn">
                                    <i class="mdi mdi-file-download"></i> Export Data Keterlambatan
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="alldata" role="tabpanel" aria-labelledby="alldata-tab">
                            <div class="table-responsive mt-3">
                                <!-- Display the table for 'Keseluruhan Data' -->
                                <table class="table select-table">
                                    <!-- Table header -->
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Siswa</th>
                                            <th>Tanggal & Waktu</th>
                                            <th>Informasi</th>
                                            {{-- Hanya tampilkan kolom Action jika pengguna adalah admin --}}
                                            @if(auth()->user()->role == 'admin')
                                                <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <!-- Table body -->
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        <!-- Loop through 'Keseluruhan Data' -->
                                        @forelse ($lates as $late)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $late->name }}</td>
                                                <td>{{ $late->date_time_late }}</td>
                                                <td>{{ $late->information }}</td>
                                                <td class="d-sm-flex align-items-start">
                                                    {{-- Hanya tampilkan tombol Edit dan Delete jika pengguna adalah admin --}}
                                                    @if(auth()->user()->role == 'admin')
                                                        <a href="{{ route('lates.edit', $late->id) }}"
                                                            class="btn btn-warning btn-sm text-white">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                        <form action="{{ route('lates.destroy', $late->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm text-white"
                                                                onclick="return confirm('Data akan dihapus permanen, apakah kamu yakin?')">
                                                                <i class="fas fa-trash-alt"></i> Delete
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
                        <div class="tab-pane fade" id="rekapdata" role="tabpanel" aria-labelledby="rekapdata-tab">
                            <div class="table-responsive mt-3">
                                <!-- Display the table for 'Rekapitulasi Data' -->
                                <table class="table select-table">
                                    <!-- Table header -->
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Siswa</th>
                                            <th>Jumlah Keterlambatan</th>
                                            {{-- Hanya tampilkan kolom Action jika pengguna adalah admin --}}
                                            @if(auth()->user()->role == 'admin')
                                                <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <!-- Table body -->
                                    <tbody>
                                        <!-- Loop through 'Rekapitulasi Data' -->
                                        @foreach ($rekapitulasi as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item['name'] }}</td>
                                                <td>{{ $item['jumlah_keterlambatan'] }}</td>
                                                <td>
                                                    {{-- Hanya tampilkan tombol Detail Data dan Cetak Surat Pernyataan
                                                        jika pengguna adalah admin dan jumlah keterlambatan >= 3 --}}
                                                    @if(auth()->user()->role == 'admin' && $item['jumlah_keterlambatan'] >= 3)
                                                        <a href="{{ route('lates.detail', ['name' => $item['name']]) }}"
                                                            class="btn btn-info btn-sm text-white">
                                                            <i class="fas fa-info"></i> Detail Data
                                                        </a>
                                                        <a href="{{ route('lates.cetak-surat', ['id' => $item['id']]) }}"
                                                            class="btn btn-success btn-sm text-white">
                                                            <i class="fas fa-file-alt"></i> Cetak Surat Pernyataan
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
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

{{-- @push('scripts')
    <script>
        document.getElementById('exportDataBtn').addEventListener('click', function () {
            // Add your export logic here
            alert('Exporting Data Keterlambatan...');
        });
    </script>
@endpush --}}
