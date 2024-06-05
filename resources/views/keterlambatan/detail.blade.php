@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <h4 class="card-title card-title-dash">Detail Data Keterlambatan</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                @foreach ($late as $index => $item)
                                    <tr>
                                        <th>No.</th>
                                        <td>{{ $index + 1 }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Siswa</th>
                                        <td>{{ $item->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>NIS</th>
                                        <td>{{ $item->student->nis }}</td>
                                    </tr>
                                    <tr>
                                        <th>Rombel</th>
                                        <td>{{ $item->student->rombel->rombel ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Rayon</th>
                                        <td>{{ $item->student->rayon->rayon ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal & Waktu Keterlambatan</th>
                                        <td>{{ $item->date_time_late }}</td>
                                    </tr>
                                    <tr>
                                        <th>Informasi</th>
                                        <td>{{ $item->information }}</td>
                                    </tr>
                                    <tr>
                                        <th>Bukti</th>
                                        <td>
                                            <img src="{{ asset('images/' . $item->bukti) }}" alt="Bukti Keterlambatan"
                                                style="max-width:100%; ">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><hr></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
