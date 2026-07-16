<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SiteController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function fitur()
    {
        return view('features');
    }

    public function tentang()
    {
        return view('about');
    }

    public function kontak()
    {
        return view('contact');
    }

    public function kirimKontak(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string',
        ]);

        DB::table('pesan_kontak')->insert($data);

        Session::flash('success', 'Pesan Anda berhasil dikirim.');

        return redirect()->route('kontak');
    }

    public function loginForm()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'user' => 'required',
            'pass' => 'required',
        ]);

        $user = trim($request->input('user'));
        $pass = trim($request->input('pass'));

        $member = DB::table('member')
            ->join('login', 'member.id_member', '=', 'login.id_member')
            ->where('login.user', $user)
            ->where('login.pass', md5($pass))
            ->select('member.*', 'login.user', 'login.pass')
            ->first();

        if ($member && (int) $member->status === 1) {
            Session::put('admin', (array) $member);
            Session::put('role', $member->role);
            Session::put('status', $member->status);

            return redirect()->route('dashboard');
        }

        Session::flash('error', 'Username atau password salah.');

        return redirect()->back();
    }

    public function dashboard()
    {
        if (!Session::has('admin')) {
            return redirect()->route('login');
        }

        $stats = [
            'transaksi' => DB::table('nota')->count(),
            'barang' => DB::table('barang')->count(),
            'terjual' => (int) DB::table('nota')->sum('jumlah'),
        ];

        $recentSales = DB::table('nota')
            ->join('barang', 'nota.id_barang', '=', 'barang.id_barang')
            ->select('nota.*', 'barang.nama_barang')
            ->orderByDesc('nota.id_nota')
            ->limit(8)
            ->get();

        return view('dashboard', compact('stats', 'recentSales'));
    }

    public function logout()
    {
        Session::forget(['admin', 'role', 'status']);

        return redirect()->route('home');
    }

    public function registerForm()
    {
        return view('register');
    }

    public function registerStore(Request $request)
    {
        $data = $request->validate([
            'nm_member' => 'required|string|max:255',
            'alamat_member' => 'required|string',
            'telepon' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'user' => 'required|string|max:255',
            'pass' => 'required|string|min:4',
        ]);

        $memberId = DB::table('member')->insertGetId([
            'nm_member' => $data['nm_member'],
            'alamat_member' => $data['alamat_member'],
            'telepon' => $data['telepon'],
            'email' => $data['email'],
            'gambar' => '',
            'NIK' => '',
            'role' => 'kasir',
            'status' => 0,
        ]);

        DB::table('login')->insert([
            'user' => $data['user'],
            'pass' => md5($data['pass']),
            'id_member' => $memberId,
        ]);

        Session::flash('success', 'Pendaftaran berhasil. Silakan hubungi admin untuk aktifasi akun.');

        return redirect()->route('login');
    }
}
