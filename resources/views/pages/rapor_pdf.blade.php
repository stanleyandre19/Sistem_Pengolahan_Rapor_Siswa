<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rapor Siswa - {{ $siswa->nama }}</title>
    <style>
        body { 
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; 
            color: #333; 
            font-size: 13px; 
        }
        
        /* Header */
        .header-title { font-size: 22px; font-weight: bold; color: #111827; margin-bottom: 4px; }
        .breadcrumb { font-size: 11px; color: #6b7280; margin-bottom: 20px; }

        /* Container Atas (Layout pakai tabel agar rapi di DomPDF) */
        .info-container { width: 100%; margin-bottom: 20px; border-spacing: 15px 0; border-collapse: separate; margin-left: -15px; }
        .info-box { 
            border: 1px solid #e5e7eb; 
            padding: 15px; 
            border-radius: 8px; 
            vertical-align: top;
        }

        /* Detail Siswa */
        .profile-table { width: 100%; font-size: 12px; }
        .profile-table td { padding: 4px 0; }
        .profile-table .label { width: 90px; color: #4b5563; }
        .profile-table .colon { width: 15px; text-align: center; }
        .profile-table .value { font-weight: bold; color: #1f2937; }
        .nama-siswa { font-size: 14px; font-weight: bold; margin-bottom: 10px; display: block; color: #111827; }

        /* Keterangan Nilai (Legend) */
        .legend-title { font-weight: bold; margin-bottom: 10px; font-size: 13px; color: #111827; }
        .legend-table { width: 100%; font-size: 11px; color: #4b5563; }
        .legend-table td { padding: 3px 0; }
        .dot { 
            display: inline-block; width: 8px; height: 8px; border-radius: 50%; margin-right: 5px; 
        }

        /* Tabel Utama Nilai */
        .table-nilai { 
            width: 100%; border-collapse: collapse; border: 1px solid #e5e7eb; 
            border-radius: 8px; overflow: hidden;
        }
        .table-nilai th { 
            background-color: #f9fafb; padding: 10px; text-align: left; 
            font-size: 12px; border-bottom: 2px solid #e5e7eb; color: #374151;
        }
        .table-nilai td { 
            padding: 10px; border-bottom: 1px solid #e5e7eb; font-size: 12px; color: #1f2937;
        }
        .table-nilai tr:nth-child(even) { background-color: #fafafa; }
        .text-center { text-align: center; }
        .text-bold { font-weight: bold; }

        /* Row Rata-rata & Predikat Umum */
        .summary-row td { background-color: #f9fafb; font-weight: bold; font-size: 13px; color: #1e3a8a;}
    </style>
</head>
<body>

    <div class="header-title">Rapor Siswa</div>
    <div class="breadcrumb">Home / Rapor / Lihat Rapor</div>

    <table class="info-container">
        <tr>
            <td class="info-box" style="width: 55%;">
                <table class="profile-table">
                    <tr>
                        <td rowspan="5" style="width: 70px; text-align: center; padding-right: 15px;">
                            @php
                                $pesanError = "";
                                $base64 = "";

                                // 1. Cek apakah di database ada nama fotonya
                                if (empty($siswa->foto)) {
                                    $pesanError = "Data foto kosong di Database";
                                } else {
                                    $imagePath = storage_path('app/public/'. $siswa->foto);
                                    
                                    // 2. Cek apakah file fisiknya benar-benar ada di dalam folder storage
                                    if (!file_exists($imagePath)) {
                                        $pesanError = "File tidak ditemukan di path: " . $imagePath;
                                    } else {
                                        // 3. Jika ada, konversi ke Base64 dengan tipe yang akurat
                                        $mime = mime_content_type($imagePath);
                                        $dataImg = file_get_contents($imagePath);
                                        $base64 = 'data:' . $mime . ';base64,' . base64_encode($dataImg);
                                    }
                                }
                            @endphp

                            @if($pesanError != "")
                                <div style="color: red; font-size: 9px; border: 1px solid red; padding: 3px; word-wrap: break-word; text-align: left;">
                                    ERROR: {{ $pesanError }}
                                </div>
                            @else
                                <img src="{{ $base64 }}" alt="Foto Siswa" style="width: 60px; height: 80px; object-fit: cover; border: 1px solid #d1d5db; padding: 2px; border-radius: 4px;">
                            @endif
                        </td>
                        <td colspan="3"><span class="nama-siswa">{{ ucwords($siswa->nama) }}</span></td>
                    </tr>
                    <tr>
                        <td class="label">NIS</td><td class="colon">:</td><td class="value">{{ $siswa->nis }}</td>
                    </tr>
                    <tr>
                        <td class="label">Kelas</td><td class="colon">:</td><td class="value">{{ $siswa->kelas }}</td>
                    </tr>
                    <tr>
                        <td class="label">Semester</td><td class="colon">:</td><td class="value">Ganjil</td>
                    </tr>
                    <tr>
                        <td class="label">Tahun Ajaran</td><td class="colon">:</td><td class="value">2025/2026</td>
                    </tr>
                </table>
            </td>

            <td class="info-box" style="width: 45%;">
                <div class="legend-title">Keterangan Nilai</div>
                <table class="legend-table">
                    <tr>
                        <td style="width: 45%;"><span class="dot" style="background-color: #6366f1;"></span> 90 - 100</td>
                        <td>: Sangat Baik (A)</td>
                    </tr>
                    <tr>
                        <td><span class="dot" style="background-color: #10b981;"></span> 80 - 89</td>
                        <td>: Baik (B)</td>
                    </tr>
                    <tr>
                        <td><span class="dot" style="background-color: #f59e0b;"></span> 70 - 79</td>
                        <td>: Cukup (C)</td>
                    </tr>
                    <tr>
                        <td><span class="dot" style="background-color: #ef4444;"></span> < 70</td>
                        <td>: Kurang (D)</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table class="table-nilai">
        <thead>
            <tr>
                <th class="text-center" style="width: 5%;">No</th>
                <th style="width: 45%;">Mata Pelajaran</th>
                <th class="text-center" style="width: 15%;">KKM</th>
                <th class="text-center" style="width: 15%;">Nilai</th>
                <th class="text-center" style="width: 20%;">Predikat</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalNilai = 0;
                $jumlahMapel = count($nilai);
            @endphp

            @forelse($nilai as $index => $n)
                @php
                    $nilaiAkhir = $n->nilai_akhir ?? 0;
                    $totalNilai += $nilaiAkhir;
                    
                    if ($nilaiAkhir >= 90) { $predikat = 'A'; }
                    elseif ($nilaiAkhir >= 80) { $predikat = 'B'; }
                    elseif ($nilaiAkhir >= 70) { $predikat = 'C'; }
                    else { $predikat = 'D'; }
                @endphp
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $n->mapel }}</td>
                    <td class="text-center">75</td> <td class="text-center">{{ $nilaiAkhir }}</td>
                    <td class="text-center text-bold">{{ $predikat }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center" style="padding: 20px;">Belum ada data nilai.</td>
                </tr>
            @endforelse

            @php
                $rataRata = $jumlahMapel > 0 ? $totalNilai / $jumlahMapel : 0;
                
                if ($rataRata >= 90) { $predikatUmum = 'Sangat Baik'; }
                elseif ($rataRata >= 80) { $predikatUmum = 'Baik'; }
                elseif ($rataRata >= 70) { $predikatUmum = 'Cukup'; }
                else { $predikatUmum = 'Kurang'; }
            @endphp
        </tbody>
        
        <tfoot>
            <tr class="summary-row">
                <td colspan="3" style="text-align: right; padding-right: 25px;">Rata-rata</td>
                <td class="text-center">{{ number_format($rataRata, 2) }}</td>
                <td></td>
            </tr>
            <tr class="summary-row">
                <td colspan="3" style="text-align: right; padding-right: 25px;">Predikat Umum</td>
                <td colspan="2" class="text-center">{{ $predikatUmum }}</td>
            </tr>
        </tfoot>
    </table>
    
    <!-- TANDA TANGAN -->
<table style="width:100%; margin-top:60px;">
    <tr>
        <td style="width:50%; text-align:center;">
            <div style="font-size:14px;">
                Orang Tua / Wali
            </div>

            <div style="height:80px;"></div>

            <div style="width:220px; margin:auto; border-bottom:1px solid black;"></div>
        </td>

        <td style="width:50%; text-align:center;">
            <div style="font-size:14px;">
                Wali Kelas
            </div>

            <div style="height:80px;"></div>

            <div style="width:220px; margin:auto; border-bottom:1px solid black;"></div>
        </td>
    </tr>
</table>

</body>
</html>