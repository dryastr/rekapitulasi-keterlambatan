@extends('layout.app')

@section('content')
    <div class="tab-content tab-content-basic">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                        <div class="card-body">
                            <h4 class="card-title card-title-dash">Tambah Data Keterlambatan</h4>

                            <form action="{{ route('lates.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Siswa</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="date_time_late" class="form-label">Waktu Keterlambatan</label>
                                    <input type="datetime-local" class="form-control" id="date_time_late" name="date_time_late" required>
                                </div>

                                <div class="mb-3">
                                    <label for="information" class="form-label">Informasi Keterlambatan</label>
                                    <textarea class="form-control" id="information" name="information" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="bukti" class="form-label">Bukti Keterlambatan</label>
                                    <input type="file" class="form-control" id="bukti" name="bukti" required accept="image/*">
                                </div>

                                <button type="submit" class="btn btn-primary text-white">Tambah Data Keterlambatan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
