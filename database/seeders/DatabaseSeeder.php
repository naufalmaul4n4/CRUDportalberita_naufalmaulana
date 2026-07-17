<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Post::create([
            'title' => 'Sistem Pemrograman Web Berbasis Laravel Makin Diminati',
            'content' => 'Perkembangan framework Laravel di tahun 2026 berkembang pesat dengan integrasi komponen modern. Banyak developer memilihnya karena ekosistem yang matang dan kemudahan integrasi dengan framework CSS seperti Tailwind dan Bootstrap.',
            'category' => 'Teknologi',
            'image' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=600&auto=format&fit=crop',
            'publisher' => 'Rangga Kurnia'
        ]);

        Post::create([
            'title' => 'Tips Membangun Aplikasi Portal Berita yang Responsive',
            'content' => 'Membuat portal berita yang nyaman dibaca memerlukan optimasi pada tata letak grid dan penggunaan font. Penggunaan card list ala Detik atau Kompas terbukti meningkatkan kenyamanan membaca pengguna di perangkat mobile.',
            'category' => 'Edukasi',
            'image' => 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=600&auto=format&fit=crop',
            'publisher' => 'Admin Utama'
        ]);
    }
}