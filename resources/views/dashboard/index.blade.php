@extends('dashboard.layout.main')
@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-dark text-light mb-4">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <h5 class="card-title">{{ $totalPatients }}</h5>
                            <h6 class="card-subtitle">Total Pasien</h6>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                            class="bi bi-person-check-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-light mb-4">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <h5 class="card-title">{{ $totalEmployees }}</h5>
                            <h6 class="card-subtitle">Total Pegawai</h6>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                            class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                            <path
                                d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light mb-4">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <h5 class="card-title">{{ $totalRegistrations }}</h5>
                            <h6 class="card-subtitle">Total kunjungan</h6>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                            class="bi bi-file-medical-fill" viewBox="0 0 16 16">
                            <path
                                d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M8.5 4.5v.634l.549-.317a.5.5 0 1 1 .5.866L9 6l.549.317a.5.5 0 1 1-.5.866L8.5 6.866V7.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L7 6l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V4.5a.5.5 0 1 1 1 0M5.5 9h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1m0 2h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning mb-4">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <h5 class="card-title">{{ $totalRegistrationsWaitingStatus }}</h5>
                            <h6 class="card-subtitle">Pasien menunggu</h6>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                            class="bi bi-hourglass-split" viewBox="0 0 16 16">
                            <path
                                d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-area me-1"></i>
                Kunjungan Pasien
            </div>
            <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
            <div class="card-footer small text-muted">Updated at {{ date('d F Y',
                strtotime($registrationsDate[$registrationsDate->keys()->max()]->tanggal_daftar)) }}
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar me-1"></i>
                Jenis Tindakan
            </div>
            <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-pie me-1"></i>
                Obat
            </div>
            <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
</main>
@endsection

@push('chart')
<script>
    let registrationsDate = @json($registrationsDate);
    const groupedRegistrationsDate = registrationsDate.reduce((acc, item)=>{
        if (!acc[item.tanggal_daftar]) {
            acc[item.tanggal_daftar] = []; // buat array baru untuk tanggal ini
        }
        acc[item.tanggal_daftar].push(item); // tambahkan item ke dalam grup tanggal itu
        return acc;
    }, {});

    // ubah key array menjadi 0 : { 'tanggal_daftar' : '...' }
    let registrationDateResult = {};
    Object.keys(groupedRegistrationsDate)
        .sort((a, b) => new Date(a)- new Date(b))
        .forEach((key,index) => {
            registrationDateResult[index] = groupedRegistrationsDate[key];
        });

    // translasi data menjadi ['1 April', ... ]
    const dateArray = Object.values(registrationDateResult).map(group => {
        const rawDate = group[0].tanggal_daftar;
        const dateObj = new Date(rawDate);
        return dateObj.toLocaleDateString('en-US', {
        month: 'long',
        day: 'numeric'
        });
    });

    // translasi data menjadi ['1', '2', ...]
    const registrationTotalArray = Object.values(registrationDateResult).map(group => group.length);

    let actionsData = @json($actionsData);
    const actions = actionsData.map(data => data[0]);
    const totalActions = actionsData.map(data => data[1]);
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="/js/chart-area-demo.js"></script>
<script src="/js/chart-bar-demo.js"></script>
<script src="/js/chart-pie-demo.js"></script>
@endpush