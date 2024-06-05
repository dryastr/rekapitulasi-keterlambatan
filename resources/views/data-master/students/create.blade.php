@extends('layout.app')

@section('content')
    <div class="tab-content tab-content-basic">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                        <div class="card-body">
                            <h4 class="card-title card-title-dash">Add New Student</h4>

                            <form action="{{ route('students.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="rombel_id" class="form-label">Rombel</label>
                                    <select class="form-control" id="rombel_id" name="rombel_id" required>
                                        <option value="">Select Rombel</option>
                                        @foreach ($rombels as $rombel)
                                            <option value="{{ $rombel->id }}">{{ $rombel->rombel }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="rayon_id" class="form-label">Rayon</label>
                                    <select class="form-control" id="rayon_id" name="rayon_id" required>
                                        <option value="">Select Rayon</option>
                                        @foreach ($rayons as $rayon)
                                            <option value="{{ $rayon->id }}">{{ $rayon->rayon }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="nis" class="form-label">NIS</label>
                                    <input type="text" class="form-control" id="nis" name="nis" required>
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>

                                <button type="submit" class="btn btn-primary text-white">Add Student</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
