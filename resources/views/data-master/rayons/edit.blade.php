@extends('layout.app')

@section('content')
    <div class="tab-content tab-content-basic">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                        <div class="card-body">
                            <h4 class="card-title card-title-dash">Edit Rayon</h4>

                            <form action="{{ route('rayons.update', $rayon->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="user_id" class="form-label">Pembimbing Siswa</label>
                                    <select class="form-control" id="user_id" name="user_id" required>
                                        @foreach ($pembimbingSiswas as $pembimbingSiswa)
                                            <option value="{{ $pembimbingSiswa->id }}" @if ($pembimbingSiswa->id == $rayon->user_id) selected @endif>
                                                {{ $pembimbingSiswa->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="rayon" class="form-label">Rayon</label>
                                    <input type="text" class="form-control" id="rayon" name="rayon" value="{{ $rayon->rayon }}" required>
                                </div>

                                <button type="submit" class="btn btn-primary text-white">Update Rayon</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
