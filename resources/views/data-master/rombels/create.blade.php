{{-- resources/views/rombel/create.blade.php --}}

@extends('layout.app')

@section('content')
    <div class="tab-content tab-content-basic">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
            <div class="row">
                <div class="row flex-grow">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card card-rounded">
                            <div class="card-body">
                                <h4 class="card-title card-title-dash">Tambah Data Rombel</h4>
                                <form action="{{ route('rombels.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="rombel" class="form-label">Nama Rombel</label>
                                        <input type="text" class="form-control" id="rombel" name="rombel" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
