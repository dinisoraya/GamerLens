<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Kecanduan Sosmed</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .stress-level {
            font-size: 2em;
            color: white;
            background-color: orange;
            text-align: center;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            line-height: 60px;
            margin: 0 auto;
        }

        .stress-level-label {
            text-align: center;
            margin-top: 10px;
            font-weight: bold;
        }

        .table td {
            vertical-align: middle;
        }

        .header,
        .diagnosis,
        .summary,
        .results,
        .footer {
            margin-bottom: 20px;
        }

        .header h3,
        .footer p {
            text-align: center;
        }
        .saran ul{
            list-style-type:none ;
            padding: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h3>Perhitungan Tingkat Kecanduan Game Online</h3>
            <hr>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p><strong>Nama:</strong> {{ $riwayat->user->nama }}</p>
            </div>
            <div class="col-sm-6 text-sm-right">
                <p><strong>Tanggal tes: </strong>{{ \Carbon\Carbon::parse($riwayat->created_at)->format('d M Y') }}</p>
            </div>
        </div>
        <div class="jenis">
            <p><strong>Umur:</strong>{{ \Carbon\Carbon::parse($riwayat->user->tanggal_lahir)->age}}</p>
        </div>
        <div class="jenis">
            <p><strong>Jenis kelamin:</strong> {{ $riwayat->user->jenis_kelamin }}</p>
        </div>
        <hr>
        <div class="diagnosis">
            <p><strong>Diagnosa Tingkat Kecanduan</strong></p>
            <p>Tingkat {{ $riwayat->tingkat_kecanduan }}</p>
        </div>

        <div class="saran">
            <p><strong>Solusi</strong></p>
            {!! $riwayat->kecanduan->saran_kecanduan !!}
        </div>
        <div class="gejala">
            <p><strong>Gejala Yang Dialami</strong></p>
            <p>Dirangkum berdasarkan kondisi sebulan terakhir</p>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Gejala</th>
            </tr>
                @foreach (unserialize($riwayat->gejala_pengguna) as $gejala)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $gejala }}</td>
                </tr>
                @endforeach
            </table>
        <hr>
        <div class="footer">
            <p>Data di atas adalah hasil tes yang diambil pada tanggal {{ \Carbon\Carbon::parse($riwayat->created_at)->format('d M Y') }}</p>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
    window.onload = function() {
        const referrer = document.referrer;  // Capture the referrer URL
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF();

        pdf.html(document.body, {
            callback: function (pdf) {
                pdf.save('perhitungan_kecanduan_sosmed.pdf');
                if (referrer) {
                    window.location.href = referrer;  
                }
            },
            x: 10,
            y: 10,
            width: 180, // Target width in mm
            windowWidth: 950 // The window width in pixels
        });
    };
</script>




</body>

</html>