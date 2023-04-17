@if (session()->has('success'))
    <div class="alert alert-success col-lg-auto" role="alert">
        {{ session('success') }}
    </div>
@endif
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4>Mading Desa</h4>
            <div class="col-auto">
                <a href="/dashboard/mading_desa/create" class="btn btn-primary mb-3">Tambah Data
                    Penduduk</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-lg">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mading_desa as $mading)
                            <tr>
                                <td class="col-3">
                                    <div class="d-flex align-items-center">
                                        <div style="max-height: 150px; overflow:hidden;">
                                            <img src="{{ asset('storage/' . $mading->image) }}"
                                                alt="{{ $mading->name }}" class="aparaturs">
                                        </div>
                                    </div>
                                </td>
                                <td class="col-3">
                                    <div class="d-flex align-items-center">
                                        <p class="font-bold ms-3 mb-0">{{ $mading->judul }}</p>
                                    </div>
                                </td>
                                <td class="col-auto">
                                    <p class=" mb-0">{{ $mading->deskripsi }}</p>
                                </td>
                                <td>
                                    huihnj
                                    <a href="/dashboard/mading_desa/{{ $mading->id }}/edit"
                                        class="badge bg-warning"><span data-feather="edit"></span></a>
                                    <form action="/dashboard/mading_desa/{{ $mading->id }}" method="post"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0"
                                            onclick="return confirm('Apakah anda yakin?')"><span
                                                data-feather="x-circle"></span></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-body">
            <div id="chart-profile-visit"></div>
        </div>
    </div>
</div>
