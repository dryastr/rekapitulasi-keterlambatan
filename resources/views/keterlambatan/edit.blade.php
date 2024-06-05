@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <h4 class="card-title card-title-dash">Edit Data Keterlambatan</h4>
                    <form method="post" action="{{ route('lates.update', ['late' => $late->id]) }}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $late->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="date_time_late" class="form-label">Tanggal & Waktu Keterlambatan</label>
                            <input type="datetime-local" class="form-control" id="date_time_late"
                                   name="date_time_late" value="{{ \Carbon\Carbon::parse($late->date_time_late)->format('Y-m-d\TH:i') }}">
                        </div>
                        <div class="mb-3">
                            <label for="information" class="form-label">Informasi</label>
                            <textarea class="form-control" id="information" name="information"
                                      rows="3">{{ $late->information }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="bukti" class="form-label">Bukti</label>
                            <input type="file" class="form-control" id="bukti" name="bukti">
                            <img src="{{ asset('images/' . $late->bukti) }}" alt="Bukti" class="img-fluid mt-3" style="max-width: 300px">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
