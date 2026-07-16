<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-white mb-0">Pesan Kontak</h3>
</div>

<div class="premium-glass-card border-0 rounded-4 overflow-hidden mb-5">
    <div class="card-body p-4 p-md-5">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0" id="pesanTable">
                <thead>
                    <tr>
                        <th style="width: 80px;">No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Subjek</th>
                        <th>Pesan</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pesan as $key => $isi)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="fw-semibold text-white">{{ $isi->nama }}</td>
                            <td>{{ $isi->email }}</td>
                            <td>{{ $isi->subjek }}</td>
                            <td class="text-white-50" style="max-width: 300px; white-space: normal; word-break: break-all;">{{ $isi->pesan }}</td>
                            <td class="text-secondary">{{ $isi->created_at ?? $isi->tanggal ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#pesanTable').DataTable({
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ baris",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Lanjut",
                    previous: "Kembali"
                }
            }
        });
    });
</script>
