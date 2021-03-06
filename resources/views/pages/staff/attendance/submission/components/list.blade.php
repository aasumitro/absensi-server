<div class="card-body">
    @if($submissions)
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Waktu (Mulai/Berakhir)</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($submissions as $submission)
            <tr>
                <td>
                    {{ ($submissions->currentPage()-1) * $submissions->perPage() + $loop->index + 1 }}
                </td>
                <td>{{ $submission->user->name }}</td>
                <td>{{ strtoupper($submission->absentType->description) }} ({{ $submission->absentType->name }})</td>
                <td>{{
                        \Carbon\Carbon::parse($submission->start_at)->format('d')  . ' - ' .
                        \Carbon\Carbon::parse($submission->end_at)->format('d') . ', ' .
                        \Carbon\Carbon::parse($submission->end_at)->format('M Y')
                }}</td>
                <td>
                    <b>Judul: {{$submission->title}}</b>
                    @if($submission->attachment)
                    <br>Lampiran: <a
                        class="text-underline text-info"
                        target="_blank"
                        href="{{ route("private.file", ['id' => $submission->attachment->id]) }}"
                    > klik untuk melihat</a>
                    @endif
                    <p>
                        Keterangan: {{$submission->description}}

                        @if($submission->status === 'REJECTED')
                            <br><code>CATATAN:</code> {{$submission->notes}}
                        @endif
                    </p>
                </td>
                <td>
                   <span class="badge bg-{{submission_status_color($submission->status)}}">
                        {{$submission->status}}
                   </span>
                </td>
                <td>
                    @if($submission->status === 'ISSUED')
                        <div class="btn-group">
                            <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <span class="icon icon-sm">
                                <span class="fas fa-ellipsis-h icon-dark"></span>
                            </span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" data-popper-placement="bottom-end">
                                <a
                                    wire:click="selectedSubmission({{$submission}}, 'UPDATE')"
                                    class="dropdown-item">
                                    <span class="fas fa-edit me-2"></span>
                                    Terima/Tolak
                                </a>
                            </div>
                        </div>
                    @else
                        <button
                            onclick="showNotification('error', 'Aksi tidak diizinkan!')"
                            class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0"
                        >
                                <span class="icon icon-sm">
                                    <span class="fas fa-ban icon-dark"></span>
                                </span>
                        </button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @if($submissions->count() <= 0)
        <div class="mt-4 text-center">
            Data tidak tersedia
        </div>
    @endif

    <div class="mt-4 text-center">
        <nav class="d-inline-block text-center">
            <ul class="pagination mb-0">
                {{ $submissions->appends(request()->query())->links('components.pagination') }}
            </ul>
        </nav>
    </div>
    @endif
</div>
