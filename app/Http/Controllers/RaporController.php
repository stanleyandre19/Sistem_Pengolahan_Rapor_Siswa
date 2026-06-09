namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Nilai;

class RaporController extends Controller
{
    // 🔹 halaman list siswa (rapor)
    public function index()
    {
        $dataSiswa = Siswa::all();

        return view('rapor.index', compact('dataSiswa'));
    }

    // 🔹 cetak rapor per siswa
    public function cetak($id)
    {
        $siswa = Siswa::findOrFail($id);

        $nilai = Nilai::where('siswa_id', $id)->get();

        return view('rapor_pdf', compact('siswa', 'nilai'));
    }
}