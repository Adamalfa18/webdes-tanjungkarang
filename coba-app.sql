-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 31 Agu 2022 pada 14.04
-- Versi server: 5.7.18
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coba-app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aparatur_desas`
--

CREATE TABLE `aparatur_desas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `assistances`
--

CREATE TABLE `assistances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `assistances`
--

INSERT INTO `assistances` (`id`, `program_id`, `nama`, `nik`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 1, 'waw', '1726538323', 'adaaa', '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(2, 1, 'waw', '1726538323', 'adaaa', '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(3, 2, 'waw', '1726538323', 'adaaa', '2022-08-30 14:32:19', '2022-08-30 14:32:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Sosial', 'sosial', '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(2, 'Budaya', 'budaya', '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(3, 'Politik', 'politik', '2022-08-30 14:32:19', '2022-08-30 14:32:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category_profil`
--

CREATE TABLE `category_profil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_penduduk`
--

CREATE TABLE `data_penduduk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_perkawinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `education`
--

CREATE TABLE `education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `education`
--

INSERT INTO `education` (`id`, `pendidikan`, `jumlah`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'Diploma 1', '177', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `finances`
--

CREATE TABLE `finances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `belanja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sisa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `finances`
--

INSERT INTO `finances` (`id`, `title`, `jumlah`, `belanja`, `sisa`, `category`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'ada', '50000000', '50000000', '0', 'APBD', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(2, 'adaaa', '30000000', '30000000', '0', 'APBD', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan_mandiri`
--

CREATE TABLE `layanan_mandiri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_layanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `layanan_mandiri`
--

INSERT INTO `layanan_mandiri` (`id`, `nama_layanan`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'Surat Keterangan Usaha', 'surat_keterangan_usaha', '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(2, 'Surat Keterangan Tanah', 'surat_keterangan_tanah', '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(3, 'Surat Keterangan Domisili', 'surat_keterangan_domisili', '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(4, 'Surat Pengantar Nikah', 'surat_pengantar_nikah', '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(5, 'Surat Keterangan Tidak Mampu', 'surat_keterangan_tidak_mampu', '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(6, 'Surat Pengantar Nikah', 'surat_pengantar_nikah', '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(7, 'Surat Keterangan Belum Nikah', 'surat_keterangan_belum_nikah', '2022-08-30 14:32:19', '2022-08-30 14:32:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mading_desa`
--

CREATE TABLE `mading_desa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `marriages`
--

CREATE TABLE `marriages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `marriages`
--

INSERT INTO `marriages` (`id`, `status`, `jumlah`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'menikah', 177, NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(2, 'belum', 177, NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(3, 'belut', 177, NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(4, 'memek', 50, NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_21_053018_create_posts_table', 1),
(6, '2022_02_21_053259_create_categories_table', 1),
(7, '2022_02_27_142322_create_professions_table', 1),
(8, '2022_03_13_031122_create_religions_table', 1),
(9, '2022_03_14_065453_create_education_table', 1),
(10, '2022_03_14_104945_create_genders_table', 1),
(11, '2022_03_14_135714_create_marriages_table', 1),
(12, '2022_03_22_073059_create_finances_table', 1),
(13, '2022_03_24_155830_create_potentials_table', 1),
(14, '2022_03_29_021425_create_admins_table', 1),
(15, '2022_04_05_164945_create_assistances_table', 1),
(16, '2022_04_05_170417_create_programs_table', 1),
(17, '2022_04_19_091449_create_villages_table', 1),
(18, '2022_04_20_062147_create_aparatur_desas_table', 1),
(19, '2022_04_24_062538_create_layanan_mandiris_table', 1),
(20, '2022_04_24_153659_create_penduduks_table', 1),
(21, '2022_05_07_084636_create_surat_keterangan_usahas_table', 1),
(22, '2022_06_24_145620_create_user_roles_table', 1),
(23, '2022_07_01_073412_create_data_penduduks_table', 1),
(24, '2022_07_01_164824_create_mading_desas_table', 1),
(25, '2022_07_01_165013_create_pengaduans_table', 1),
(26, '2022_08_23_044550_create_profil_desas_table', 1),
(27, '2022_08_24_091900_create_category_profils_table', 1),
(28, '2022_08_30_102659_create_surat_keterangan_tidak_mampus_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduks`
--

CREATE TABLE `penduduks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmp_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jns_kel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gol_darah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sts_kawin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prihal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `image`, `excerpt`, `body`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'Quia quibusdam consectetur veniam nulla est.', 'sunt-voluptate-a-necessitatibus', NULL, 'Assumenda voluptas nihil praesentium accusantium dolores.', '<p>Cupiditate autem cumque eius recusandae dolores et repellendus esse. Delectus sed ipsum in ducimus. Sed id beatae rerum reprehenderit blanditiis et.</p><p>Placeat at voluptates ducimus quia odit. A nihil illo ipsum. Sed aliquid exercitationem facere quia consequuntur atque. Aut qui laboriosam voluptatem est omnis.</p><p>Facilis et quae rerum deserunt qui inventore non reprehenderit. Autem quo ut fugit quasi. Magni voluptas inventore at unde voluptatem veniam laborum.</p><p>Cum minima rem atque eos sed. Et provident et omnis numquam quia. Quia exercitationem eum impedit delectus aspernatur. Rerum id quia consequatur nesciunt pariatur.</p><p>Ipsam aut quae enim et dolores nulla. Enim necessitatibus expedita repellendus quia nemo debitis.</p><p>Quidem rerum minima corporis et deserunt doloribus. Autem sint iste et repudiandae quaerat magnam. Voluptatem praesentium voluptatem fugit in.</p><p>Veniam labore animi quo mollitia sint impedit. Consequatur aspernatur quae ut nihil. Et aut dicta ea id est.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(2, 2, 3, 'Quibusdam illum aliquam et et minus.', 'iusto-dignissimos-accusantium-et-quisquam-eligendi-ipsa', NULL, 'Iure sed voluptates voluptatem ea.', '<p>Voluptatibus ut laudantium eum ipsa eveniet corporis cum. Enim ipsa et ducimus est voluptas sint optio.</p><p>Sed similique qui minus suscipit. Veniam voluptas enim voluptatem expedita architecto.</p><p>Cum dolore corrupti optio nulla sunt. Laborum non aut aperiam repudiandae est. Soluta rem nihil quibusdam et.</p><p>Laudantium rerum deleniti vitae est molestiae inventore molestias. Tenetur ut porro eum velit vitae voluptatem dolore. Sunt consequuntur impedit dolor dolores rerum aliquid ex.</p><p>Recusandae dolores sint eum et error recusandae. Vitae voluptatem consequatur reiciendis consequatur eaque aut optio. Hic aspernatur sint magni suscipit.</p><p>Occaecati et inventore qui ad. Rerum natus sunt amet quidem hic nulla. Et enim non enim qui ullam.</p><p>Cumque aliquid unde explicabo et. Consequatur odit ratione est est quia et.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(3, 2, 2, 'Nobis doloribus ipsum omnis eum dolor laudantium.', 'deleniti-placeat-eveniet-voluptatem-voluptas-consequatur-corporis-molestiae-laudantium', NULL, 'Officia sint error eligendi et.', '<p>Laudantium et eos quis consequatur aut architecto praesentium corrupti. Dolores neque repudiandae quisquam id dolore dolorem nisi. Recusandae fuga iste sit rerum eius porro. Earum dolorem odio repellendus at.</p><p>Autem et et assumenda tempore. Et ipsam labore veniam error sint. Et saepe aperiam rerum aut quia ipsa. Veniam quos totam qui ad qui sed neque.</p><p>Et maxime qui quia molestiae. Non minima excepturi voluptatem et nihil tenetur reprehenderit ad. Aliquid aut voluptatem quia.</p><p>Tempore atque reiciendis saepe maxime. Doloremque totam sit voluptas perspiciatis.</p><p>Ullam nihil qui deleniti aut. Odit et aliquid exercitationem tempora maiores sed et hic. Qui fuga omnis natus tempore aliquid sunt. Ut nisi et vero et. Culpa voluptatem dolor reiciendis doloremque ut et enim.</p><p>Molestiae libero enim laborum placeat aut reiciendis tempore. Rerum omnis numquam voluptatem. Laborum id et sit est. Mollitia voluptas nulla est iste qui.</p><p>Quia voluptas in laudantium nemo est. Iusto vero eius veritatis consequatur qui. Odio iure veniam numquam incidunt nemo.</p><p>Soluta aliquid laboriosam maxime dolorem maxime. Necessitatibus et corporis libero voluptatem modi deleniti adipisci. Voluptatem nemo nemo aliquid nobis velit ad accusantium.</p><p>Quo similique praesentium quo necessitatibus quia illo. Vero nesciunt sed quod quas sint. Quae delectus ea beatae voluptas.</p><p>Vero fuga id velit veritatis debitis. Et commodi minus omnis numquam. Labore eum libero sequi. Repellat qui assumenda sint quis temporibus omnis.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(4, 2, 3, 'Temporibus odit aut omnis.', 'rerum-illum-maiores-laborum-eos-enim-laboriosam', NULL, 'Saepe voluptates consectetur voluptatibus.', '<p>Dolor est corrupti voluptate praesentium ipsa recusandae fugiat. Magni minus qui impedit omnis facere iusto commodi. Enim velit consequatur minus illo omnis magni ex corrupti. Quisquam ex veritatis et rerum. Odit id sit sunt veritatis.</p><p>Delectus optio sapiente earum nostrum eius delectus quia explicabo. Odio et dolores ullam rerum adipisci veritatis fuga. Quo blanditiis sunt aperiam quod qui.</p><p>Corporis commodi labore delectus illo vel. Reprehenderit mollitia blanditiis harum ipsa quibusdam et illo.</p><p>Rerum qui vel qui aut. Temporibus eum sequi hic doloremque tempora quibusdam. Deleniti rerum mollitia tempore.</p><p>Numquam quis accusantium et repellendus. Ea voluptas tenetur ducimus vero culpa sit. Accusamus iste occaecati numquam vitae explicabo corrupti ipsam. Et earum nam voluptate saepe et alias.</p><p>Impedit optio repellat pariatur atque veniam inventore voluptatem. Iure asperiores hic sunt expedita sit. Ex impedit eos nemo quisquam possimus. Aperiam sit maxime doloribus itaque voluptatum.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(5, 1, 2, 'Quas voluptas totam quidem eos natus dolorem autem deleniti.', 'nemo-laboriosam-excepturi-cum-dignissimos', NULL, 'Aut maiores in.', '<p>Quis quod autem explicabo accusamus repellendus. Quibusdam dicta commodi a quia amet. Quia laudantium placeat est minus minima. Neque dolorem ipsum sint quidem voluptas consequatur. Nesciunt sed distinctio excepturi nihil impedit dignissimos et.</p><p>Nesciunt repellendus quo id autem tempore. Quam numquam doloribus at asperiores est consequuntur eligendi enim. Explicabo inventore eligendi et at aut voluptas occaecati. Quo natus et et molestiae rem. Itaque est voluptatem nam.</p><p>Voluptatum id accusamus hic dolores quasi nam. Doloribus voluptatum aut rerum nostrum quis eligendi ut. Aperiam natus repellendus autem et consequatur.</p><p>Ea saepe quae nulla. In explicabo in atque repudiandae recusandae. Voluptas et nisi autem perspiciatis dignissimos nihil natus.</p><p>Officia harum hic voluptatem quasi molestiae qui beatae. Ex dolorem consequatur corporis suscipit id fugit animi. Exercitationem quaerat dolorum alias nobis aliquam repudiandae. Et nihil inventore non dolorem et magnam eaque.</p><p>Ut magni consectetur dolor sit hic iusto rerum. Necessitatibus enim sit quia sit. Repellendus autem natus laudantium rem aperiam. Ut nesciunt magni distinctio est. Reprehenderit qui quaerat et iusto ea occaecati ipsa non.</p><p>Ullam ea ipsam tempore est fugit sed. Voluptates in eius dolorem sunt. Fugiat minima laudantium voluptatem harum est. Voluptatem enim ratione repellendus quia mollitia corrupti.</p><p>Veniam blanditiis ab sunt qui voluptatem. Praesentium rem voluptatibus ut quam. Est asperiores quisquam ratione provident.</p><p>Illo quas suscipit ab eius et. Voluptatem a voluptas cumque id ut molestiae. Non voluptatum et ex aut aperiam.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(6, 1, 3, 'Ut excepturi sed.', 'nesciunt-in-nihil-molestiae-cum', NULL, 'Qui maxime quo id expedita possimus.', '<p>Ut nesciunt velit aut similique vel porro. Voluptatibus consequatur ut quidem aut laboriosam voluptatem.</p><p>Nostrum ullam autem natus voluptate alias sunt. Et rerum voluptates et dolor. Sed enim omnis dolores nisi corporis.</p><p>Reprehenderit consectetur quia id beatae. At voluptas quia sequi atque eveniet blanditiis porro. Et rerum et cumque sunt id sint. Nemo vero cupiditate aliquam sunt.</p><p>Omnis sequi sed velit incidunt veritatis et. Sit soluta qui non ut necessitatibus aut sequi. Enim eos ipsa maiores dolor est rerum cumque omnis. Fuga exercitationem provident voluptatem voluptas fugit rem.</p><p>Et itaque necessitatibus ab repellendus et. In sit et corporis aut. Exercitationem accusamus facere aut. Dignissimos maxime sequi ut pariatur sunt.</p><p>Consequuntur deleniti autem minus quo. Odio autem quidem nemo est laboriosam totam. Et voluptatibus a suscipit accusantium officia commodi. Officiis maiores id ab et et rem.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(7, 1, 3, 'Similique modi dignissimos velit.', 'consequatur-pariatur-suscipit-nulla-et-ducimus-vero', NULL, 'Vitae expedita amet non molestiae non atque repellendus expedita repellat.', '<p>Delectus ullam quo odio delectus aut molestias. Rerum sit iusto at sint. Saepe officia suscipit est qui quos qui adipisci expedita.</p><p>Consectetur deleniti velit error. Voluptas perferendis natus cumque voluptatem dolorem. Maxime et et sit provident est quasi.</p><p>Necessitatibus nobis pariatur iusto. Assumenda eius ut earum et.</p><p>Voluptate aut reprehenderit nulla vero error. Culpa aspernatur et quod illum possimus doloremque sunt. Hic pariatur porro laborum voluptate rerum.</p><p>Quas facere labore dolor occaecati quae nobis. Eligendi eaque est sunt ex cum dolores debitis. Nisi animi voluptatem dolorum pariatur.</p><p>Rerum non temporibus odio dolor non tempora ab. Sunt optio quibusdam dicta reiciendis voluptas fugiat. Dolorum et asperiores autem est. Distinctio nostrum dolores commodi quam.</p><p>Similique exercitationem reprehenderit non esse voluptatem. Aut laudantium est fuga molestiae incidunt voluptatem. Quas facere non quia magni quasi odio numquam.</p><p>Numquam aspernatur ut quam aspernatur perspiciatis ad non. Et fugiat sunt et ut quo nam alias. Ab modi quas quaerat ex hic occaecati. Fuga quidem similique in ex facilis.</p><p>Nihil quasi provident quos aut maiores atque deleniti. Ut recusandae aut facilis nostrum ex. Dignissimos mollitia sunt voluptatibus et maxime deserunt quis.</p><p>Enim quisquam occaecati libero nulla. Nihil ipsam illo eos aut. Illo ut id rerum.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(8, 1, 3, 'Eos voluptatum mollitia deleniti qui possimus autem ea consectetur pariatur.', 'cupiditate-nisi-tenetur-officiis-dolorem-velit-et-omnis', NULL, 'Excepturi tempore culpa impedit eligendi optio.', '<p>Ut dolores culpa in aut vel libero blanditiis explicabo. Id eius atque atque odit unde dolor mollitia. Et ab et minima est ut.</p><p>Repellat sit quia fuga repudiandae atque reprehenderit est. Corporis aut vero eum ut nam dolorem. Ullam aut in ipsum veritatis quia nam amet.</p><p>Repellat repellendus mollitia dolores ab et ut. Harum veniam quo deleniti a et. Eaque molestias dicta et id deserunt quia. Dolores voluptas impedit totam at.</p><p>Enim dignissimos fuga et est. Ut velit voluptatem molestias sunt suscipit possimus. Nam nobis eos voluptatum sit. Rerum consectetur sed ea iure non. Nemo sapiente vero autem perferendis.</p><p>Voluptatibus ratione voluptates aut adipisci. Est quia quaerat ut. Et veritatis est autem quasi numquam. Ipsum molestiae id qui est voluptatibus provident. Perspiciatis tempora ut quo possimus.</p><p>Et voluptas sint accusantium tempora voluptatibus voluptas. Earum officia est distinctio quam velit est. Ut rem sequi praesentium dolorum ex.</p><p>Rerum maiores architecto doloribus sint illum. Magni ut quod et qui eligendi. Quaerat nostrum officia cupiditate corporis amet expedita. Expedita quibusdam quia repudiandae repellendus est.</p><p>Nihil ut dolores ipsam harum est vel. Voluptatum animi rerum earum dolores maxime quo quis voluptate. Molestiae architecto harum consectetur maxime id sequi placeat.</p><p>Harum laborum animi excepturi est. Similique natus aliquam quibusdam est et numquam. Repudiandae architecto quo ut vel optio libero.</p><p>Est eveniet dolores eum. Et illo reprehenderit et vitae consequuntur.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(9, 1, 3, 'Adipisci omnis.', 'ut-deleniti-ullam-sit-error', NULL, 'Atque minus sunt ut.', '<p>Deleniti et omnis esse qui. Enim totam nesciunt sequi dolorem iusto consequatur. Sit necessitatibus tempora delectus et.</p><p>Facilis iste dolor magni est dolor quo et. Voluptas explicabo sapiente voluptatum. Molestiae unde blanditiis iusto doloremque a dolor consectetur. Cumque saepe mollitia et totam laborum sunt.</p><p>Enim fuga necessitatibus cupiditate et provident. Molestiae eum nesciunt sint vitae. Suscipit ipsa optio voluptas alias.</p><p>Sunt voluptate quidem sed cupiditate. Eum asperiores eos a consectetur.</p><p>Et et magni accusamus et omnis illo iure optio. Et ea aut nesciunt. Mollitia odio est quam labore molestiae.</p><p>Deserunt occaecati amet vel velit laudantium nulla nihil. Quibusdam molestias voluptas ullam nihil maiores quod est. Amet eos placeat excepturi exercitationem laboriosam.</p><p>Ullam eos porro odit dolorum labore. Quas in ut molestias est est quod. Assumenda sit accusantium voluptas dolore ullam aut ratione. Quia molestias consequatur culpa veritatis.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(10, 1, 1, 'Quidem mollitia sit tempora eum.', 'nulla-quia-explicabo-architecto-dicta-magni-odio-dolorem', NULL, 'Quam qui omnis quam.', '<p>Possimus delectus cupiditate est aspernatur non voluptatem et et. Quia voluptates earum debitis quos consequuntur. Quia id beatae et.</p><p>Consequuntur suscipit et sed molestias rem voluptatem iure. Hic libero provident vel explicabo. Ut quia consequatur ducimus quas fugit adipisci. Beatae expedita modi fugit sit atque dignissimos vitae.</p><p>Omnis eos veniam dolores qui quibusdam aspernatur. Ex cupiditate ut recusandae eaque eligendi neque. Omnis unde explicabo non vero ut.</p><p>Sint velit nisi itaque. Vel consequatur ipsa non alias minus doloremque. Eius rerum odit sunt assumenda non rerum quae. Nostrum voluptatem quos impedit quis omnis rerum qui.</p><p>Voluptatem eum molestias odit et. Aut vitae eum dignissimos vero aut laborum quis. Ad itaque laudantium sed amet.</p><p>Qui et aut sint vero consequatur qui sit. Ut eaque earum vel iste. Eos molestias recusandae natus non. Rerum ut sit laboriosam et.</p><p>Iure eaque et assumenda. Earum molestias ut voluptate. Iure ut animi omnis ut. Ea non sed odio minus.</p><p>Quibusdam facilis rerum cupiditate nemo dicta. Id reiciendis libero dolores sint ad error. Voluptatum aspernatur laborum laborum eius nesciunt odit natus.</p><p>Voluptatibus nemo sed fugiat necessitatibus aspernatur voluptatem qui. Placeat est ut eaque tenetur unde.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(11, 2, 1, 'Amet rem est.', 'consequatur-et-quos-neque-vitae-esse-pariatur-et', NULL, 'Et veniam maiores.', '<p>Necessitatibus asperiores atque ea perferendis id quo. Ut quam itaque possimus vitae adipisci voluptate nobis unde. Sit sed earum non dolorem. A ab sit ut nulla dignissimos.</p><p>Totam praesentium quam est. Earum quisquam quis omnis porro qui dolore. Et ut occaecati ipsam deserunt non ut. Sed tenetur quaerat voluptas labore.</p><p>Soluta dicta molestiae ratione exercitationem et. Adipisci iure provident non ea voluptatibus vel qui. Ex ut omnis laudantium incidunt sint accusamus cumque. Expedita rerum rerum laborum placeat aut incidunt.</p><p>Fugit enim labore itaque sint. Animi provident repellendus aperiam quis commodi est. Saepe consequatur rerum eius ipsum.</p><p>Deserunt et explicabo praesentium velit reiciendis officiis. Voluptatem necessitatibus a quia dolor quisquam velit ut. Rerum corporis autem vel nemo delectus sed. Et omnis non sed.</p><p>Ratione sed in fugit pariatur voluptate atque ea dolores. In fugit rem temporibus rerum praesentium corporis. Sunt ut deserunt rerum rem velit voluptatem. Quidem voluptas magnam dicta possimus placeat consectetur culpa.</p><p>Et eos repellat ut eum quibusdam sint magnam. Repudiandae culpa sapiente vel neque eligendi voluptatibus adipisci. Omnis officiis et ullam. Occaecati quo quae hic harum tempora. Optio atque aperiam veritatis a iure corrupti.</p><p>Veniam rerum ipsa qui alias similique necessitatibus sequi autem. Sit accusantium animi optio modi rerum. Et rerum voluptatem explicabo eum temporibus voluptatem rem. Consequuntur eius voluptatem quasi quo omnis.</p><p>Nostrum animi fugit aut et. Sint accusantium alias quia et nihil qui. Natus porro nulla quasi veritatis et ut. Aut odio dolor sed quae autem id.</p><p>Nesciunt et recusandae beatae sequi laudantium facilis et. Culpa cupiditate non atque veniam et animi. Et doloribus aut porro et dolor et voluptatem.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(12, 2, 1, 'Eligendi reiciendis quasi corrupti consequuntur.', 'quos-autem-rem-consequatur-voluptatum-eveniet-facilis-aut', NULL, 'Libero aspernatur laborum voluptatibus necessitatibus quae dolorem incidunt voluptatem expedita.', '<p>Veritatis minima praesentium velit et quibusdam. Dignissimos ut reiciendis occaecati laudantium at veniam.</p><p>Qui voluptas qui possimus saepe et. Tempore minima voluptatem qui voluptate similique voluptas. Distinctio et eius est earum ut quam. Qui dolor veniam eligendi ut deleniti repudiandae aliquam.</p><p>Dolore id animi vero tempora eveniet amet maxime. Excepturi ratione fugiat sint.</p><p>Qui sed nostrum labore officia magni. Consequuntur ducimus adipisci omnis rem non commodi.</p><p>Et et qui sed cumque maiores eveniet. Omnis qui qui itaque impedit deleniti. Modi quod sed cupiditate ut.</p><p>Consequuntur reprehenderit quia sit. Eos sit veritatis ducimus assumenda nemo commodi et.</p><p>Quam doloribus rerum consequatur cupiditate at. Officiis non rerum nam illum et pariatur. Ipsum quibusdam minus aliquid fugiat sunt ipsam laboriosam optio. Dolore ut ut aliquam.</p><p>Veniam doloremque aliquid autem expedita voluptas ea mollitia. Dolores eos ducimus magnam vel vel deserunt temporibus.</p><p>Quia eius eius tempora natus. Quis quas maxime aut assumenda aut quia.</p><p>Totam vitae ducimus enim necessitatibus. Tenetur et voluptas incidunt. Magni consectetur repudiandae temporibus possimus quidem sunt qui.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(13, 2, 1, 'Eveniet rem est deleniti in impedit.', 'cum-odio-eligendi-sit-ducimus-est-et-aut', NULL, 'Voluptas qui aut sit laboriosam.', '<p>Vel ut quaerat eum consequatur et rerum. Cupiditate vel eveniet ab dolor enim suscipit vitae dolores. Possimus qui tempore et qui impedit.</p><p>Et sit rerum voluptatibus fuga et iste. Et et facilis et voluptatibus ipsa. Voluptatem nostrum dolore molestias est. Nemo sit et et facilis quibusdam cum vel voluptates.</p><p>Recusandae et voluptas vel reiciendis aut. Eos itaque nam placeat. Voluptatum non maxime praesentium non nostrum nemo eaque. Dolores quo dolor porro voluptatem. Necessitatibus ut ipsum sed adipisci perspiciatis maxime architecto.</p><p>Velit est aut non ex cum maiores in. Id earum provident quis laborum velit in sint. Aut accusantium mollitia quisquam nihil. Architecto nesciunt quod minima qui reprehenderit.</p><p>Aut quia eligendi porro facilis. Qui non facere voluptate corporis atque et. Odit esse minus ea maiores doloribus amet.</p><p>Vel tenetur veniam ex vero. Et qui tenetur at necessitatibus dignissimos.</p><p>Illo tempora tempora nobis nisi assumenda enim odio. Sit quia ipsam quidem tempore voluptas et sit. Voluptas quia laboriosam aut quia. Deleniti esse repudiandae exercitationem molestias maiores. Dignissimos est dolore rerum recusandae ab.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(14, 2, 2, 'Consequatur mollitia labore qui tempora.', 'officiis-a-amet-molestiae-a-tempora-eveniet-qui', NULL, 'Quidem iusto sunt aut voluptatum.', '<p>Adipisci eaque sed ut adipisci ratione non. Ipsa ut sint et repellendus at non sed corrupti. Iusto eveniet qui ipsum possimus fugit sit neque error.</p><p>Ab repellat quia consequatur libero aut ad necessitatibus. Alias reiciendis voluptas aut eius laboriosam pariatur assumenda aspernatur. Non reiciendis eveniet molestias et saepe. Nihil quisquam a facilis illo porro libero.</p><p>Porro eveniet fugiat dolorem magnam. Earum quam voluptates nobis nisi officia magni. Aut maxime natus reprehenderit consectetur ad voluptatum et. Amet temporibus dignissimos animi nam consequatur.</p><p>Autem quis delectus qui. Officia maxime fugiat et provident temporibus ab incidunt molestiae. Sapiente accusamus qui optio reprehenderit. Voluptatum veritatis et quas reprehenderit et ipsum.</p><p>Id quam et saepe cum eos molestiae. At eius sunt quaerat necessitatibus nostrum. Nemo sed inventore a numquam nostrum. Sint mollitia doloremque rerum. Ea dignissimos exercitationem quo praesentium voluptatem voluptatum perferendis est.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(15, 1, 1, 'Quisquam neque commodi omnis nam aliquam voluptatem sunt vitae quo quos magnam.', 'et-eius-et-atque-sint-exercitationem-a', NULL, 'Saepe omnis cupiditate et.', '<p>Soluta quasi aut laudantium et. Voluptate voluptates reiciendis non neque neque tempora qui illum. Voluptatem non aut excepturi sunt. Eligendi deserunt quibusdam provident quo ipsum voluptate exercitationem.</p><p>Dolorum qui vero officia consequatur facilis. Eligendi repudiandae nihil in qui voluptate. Occaecati quia voluptas architecto minus eum eum sed. Tempore suscipit eum non itaque.</p><p>Quidem iusto cupiditate rerum distinctio dolorem. Veniam minima vel autem et beatae. Sed pariatur et illo molestiae animi sit dolorem. Cumque facere ipsam aut aut in dignissimos.</p><p>Qui dolorem quod suscipit omnis rerum modi in. Incidunt animi eos exercitationem porro voluptate. Quis nihil id earum eos.</p><p>Numquam iste quaerat sequi amet. Sit eius et accusantium ut asperiores laudantium quis. Sed quisquam dolore ad omnis qui iste.</p><p>Neque neque qui minus consequatur similique praesentium dolorum sint. Ipsa deleniti est sed et. Est nihil amet aliquid voluptates et non nobis.</p><p>Sint ut quo distinctio quia. Sed necessitatibus molestiae itaque consequatur optio modi. Possimus rem nesciunt fugit sapiente officia doloribus. Aliquam distinctio dolorum dicta.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(16, 1, 2, 'Explicabo doloremque qui laudantium.', 'quia-consequatur-consequatur-inventore-aspernatur-quis-et-vero', NULL, 'Eum vitae atque rerum quis facere.', '<p>Sint ipsum adipisci pariatur deleniti. Illo molestiae a qui ipsam nulla nostrum suscipit. Est impedit maiores dignissimos quo vero ex repellendus assumenda.</p><p>Ut sed quaerat nobis at omnis illo quidem quo. Qui et ullam velit sunt.</p><p>Aut assumenda quam animi dignissimos nemo eaque ab. Sunt perspiciatis recusandae id autem. Sapiente ut deserunt vero consectetur doloribus nemo.</p><p>Hic deserunt eum officiis hic. Recusandae ad impedit laborum consequatur ipsum aut. Nisi voluptas ex sit est vel voluptas.</p><p>Doloremque id reiciendis eum ratione est. Sed facilis veritatis est ipsam. Magni iusto qui odit repellat officia eligendi. Autem illo labore architecto sint eos enim.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(17, 1, 1, 'Rerum inventore id.', 'voluptates-magni-eos-impedit-magni-doloribus-possimus', NULL, 'Voluptas nulla repudiandae.', '<p>Alias vero aut distinctio est est et. Illum aspernatur eos nulla natus non ducimus tempore voluptate. Qui accusantium exercitationem autem est quo iste. Qui quia aut dolores iusto.</p><p>At ipsam perspiciatis quaerat consequuntur dolorum minima. Error nulla praesentium cum et sunt veritatis. Aut ut voluptate maiores sapiente. Aut omnis eius iste id quasi magnam recusandae.</p><p>Optio molestiae eos ut maiores. Saepe laudantium nisi deserunt sit necessitatibus. Eligendi error voluptas molestiae id sed. Delectus corporis odio sit delectus sit qui sit vitae.</p><p>Quam iusto sunt id ut rem non voluptas voluptate. Dolore rerum nam officiis impedit est tenetur rem. Reprehenderit ea sapiente inventore et. Illo nam quod corporis quia voluptatem. Est illum sed pariatur qui dolorem magnam excepturi.</p><p>Repudiandae velit quae reprehenderit vero doloribus. Aut voluptatem sed aut adipisci quo non. Praesentium eos pariatur rerum sint. Praesentium sint dolor magni ut.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(18, 1, 1, 'Deserunt consequatur neque animi ut unde.', 'sequi-cumque-atque-aut-nesciunt-aut-commodi', NULL, 'Deserunt nobis rerum.', '<p>Itaque vel consequatur sint eos labore eos. Nemo similique ut ut recusandae numquam. Officiis id veniam amet deleniti esse culpa quas. Eum architecto quaerat tempore inventore mollitia et asperiores eaque.</p><p>Quidem nemo aut illum placeat hic ad. Sint autem autem magni. Modi et accusamus sequi et voluptatem. Et vel quia quas voluptatibus at occaecati distinctio.</p><p>Ut dolorum sit sit placeat tempora id dolore. Dignissimos omnis quidem vel architecto. Ea facilis cumque et et beatae in. Modi deleniti praesentium distinctio omnis quidem eos totam.</p><p>Dolore officia exercitationem dolore assumenda cum. Voluptas eos nemo omnis ad aut. Provident aut numquam nihil unde deleniti dolores.</p><p>Molestias impedit et et et fuga. Id deleniti eligendi eveniet qui dolor tenetur est. Voluptatem sit doloribus dolorem sequi reprehenderit non tempora amet.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(19, 1, 1, 'Magni qui iste natus non ab.', 'cumque-vel-voluptatem-totam-deserunt', NULL, 'Dolores consectetur blanditiis.', '<p>Autem laboriosam ab blanditiis. Ut voluptates consequatur rem quaerat similique quia voluptatem.</p><p>Quo provident natus laudantium et quibusdam quo. Excepturi velit quaerat aperiam amet id. Et et quas quam alias iusto eos expedita.</p><p>Velit alias temporibus repellat et. Qui corrupti et quo voluptatem. Omnis eligendi aut amet debitis beatae ex sed asperiores. Tempora et nihil necessitatibus et quidem ipsam.</p><p>Hic voluptatum voluptatem tempora vel sed quidem repudiandae. Natus ratione aspernatur ipsum sit consectetur ut sed. Praesentium dolor laborum accusamus repudiandae aliquam aliquid accusamus. Debitis et ea sint natus. Quis voluptas et quibusdam dicta et.</p><p>Ut doloribus libero inventore natus reiciendis eos cumque tenetur. Eum aut atque eaque omnis eum quia eius. Repudiandae dolore ullam perspiciatis ut in. Ut ad aut odio deleniti reprehenderit id temporibus ut.</p><p>Architecto quos officia alias enim. Et ea inventore nihil nisi. Possimus eligendi aut temporibus est quia. Nihil molestiae et saepe rerum neque error.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(20, 1, 3, 'Quidem dolore autem consequatur.', 'adipisci-voluptatum-ut-facilis-doloremque', NULL, 'Quis eos omnis sint.', '<p>Non ipsa sit reprehenderit numquam. Non dignissimos ad laudantium praesentium tempora. Alias non laborum molestiae. Quis qui officia non assumenda.</p><p>Nemo quidem incidunt dolorum illum. Eos occaecati asperiores molestiae distinctio sequi. Et sit officia nihil veniam. Aut est voluptas voluptas architecto eveniet.</p><p>Ab sit eveniet inventore ducimus. Et et voluptas voluptas ipsum quibusdam accusamus quia.</p><p>Fugit delectus ipsam unde quidem totam. Iste aliquam amet impedit quae aliquid voluptatibus.</p><p>Ducimus enim corporis laudantium fugit et. Blanditiis incidunt molestias dicta excepturi aut. Quo corporis nemo consequatur rem. Dolores aliquid voluptatem est ipsum.</p><p>Sunt expedita porro ipsam nesciunt sunt quos. Ex perspiciatis et est dolorem. Nisi non vitae blanditiis quos.</p><p>Natus assumenda qui nobis. Tenetur ut officia voluptatibus et ut molestiae.</p><p>Voluptatibus eos odit id impedit. Ipsum ipsam eos rerum officiis temporibus. Qui dolor praesentium possimus molestias.</p><p>Commodi non ut incidunt inventore nihil sed. Quod architecto eos nihil quod asperiores reprehenderit. Qui et at quae eaque.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `potentials`
--

CREATE TABLE `potentials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `potentials`
--

INSERT INTO `potentials` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Wisata', 'wisata', '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(2, 'Budaya', 'budaya', '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(3, 'Umkm', 'umkm', '2022-08-30 14:32:19', '2022-08-30 14:32:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `professions`
--

CREATE TABLE `professions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelompok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `professions`
--

INSERT INTO `professions` (`id`, `kelompok`, `jumlah`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'Politik', '177', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_desa`
--

CREATE TABLE `profil_desa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_profil_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sasaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `programs`
--

INSERT INTO `programs` (`id`, `name`, `asal`, `jumlah`, `sasaran`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Adaaa', 'dsgfvdsf', '12', 'dsgfvdsf', 'dsgfvdsf', '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(2, 'Adaaa', 'dsgfvdsf', '3', 'dsgfvdsf', 'dsgfvdsf', '2022-08-30 14:32:19', '2022-08-30 14:32:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `religions`
--

CREATE TABLE `religions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agama` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `religions`
--

INSERT INTO `religions` (`id`, `agama`, `jumlah`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'Islam', 177, NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keterangan_tidak_mampu`
--

CREATE TABLE `surat_keterangan_tidak_mampu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_pengaju` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pengaju` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poto_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poto_kk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keterangan_usaha`
--

CREATE TABLE `surat_keterangan_usaha` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_pengaju` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pengaju` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_usaha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_usaha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_usaha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poto_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poto_kk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poto_usaha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `nik`, `email_verified_at`, `password`, `user_role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Adam Alfarizi', 'adamalfarizi', 'adamalfa18@gmail.com', '173040023', NULL, '$2y$10$.JUGHXnGmz1qheicOCeV8uNv4zVU5k5ZCsbakUZwhIZ06nhSC8l6a', 1, NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(2, 'Adam Alfarizi', 'adamal', 'adama18@gmail.com', '173040024', NULL, '$2y$10$eLv/DdiXUNFM/i6USKpmrepdmDMIbgWUxgtnu4b.LE/uEu0LBJTg2', 2, NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(3, 'Adam Alfarizi', 'adal', 'dama18@gmail.com', '173040025', NULL, '$2y$10$AO11BU.fONhAP3H0lMKO2.DEXC//DJ5cPDeEhGfuY6rW7e0K4kZKm', 3, NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(4, 'Adam Alfarizi', 'adalaaa', 'dama1@gmail.com', '1730400', NULL, '$2y$10$7jiSr/5i3sg.iUDdFKSaR.DLUNOgr8pZgcjsQM/lKtmXqaQp6dXhS', 3, NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(2, 'pelayanan', '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(3, 'masyarakat', '2022-08-30 14:32:19', '2022-08-30 14:32:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `villages`
--

CREATE TABLE `villages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `potential_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `villages`
--

INSERT INTO `villages` (`id`, `potential_id`, `title`, `slug`, `image`, `excerpt`, `body`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'Repellat odit necessitatibus est ratione.', 'perferendis-provident-ullam-rem-sunt', NULL, 'Nostrum consectetur in.', '<p>Molestiae molestiae in cum nemo et provident cupiditate. Rerum non facilis consequatur qui et doloremque qui totam. Vel repellat et voluptas placeat rerum quia. Et error a non eum. Dolores possimus odio fugiat.</p><p>Voluptas dolores non ut nemo est. Eveniet sit voluptatem sequi repudiandae expedita vero quos. Dolor harum odit non optio corporis. Excepturi voluptates vero cumque inventore incidunt id.</p><p>Est sed explicabo dolorem aut et tenetur reiciendis dolor. Numquam quam accusantium error magnam veniam. Vel sed sit qui et dolor et magnam expedita. Optio sint harum qui quisquam consequatur.</p><p>Nostrum est ratione magnam vero quod similique. Et animi sed est. Numquam porro sunt ut laudantium et rerum.</p><p>Nam voluptatem et eveniet accusamus qui. Modi molestias dolor iusto rerum minus laboriosam.</p><p>In a sit reiciendis praesentium dolorum. Error voluptatem ducimus aut eum quaerat quia tempore magni. Nihil error nisi asperiores corporis ducimus. Repellat praesentium debitis quis corporis esse maxime consequatur et. Eveniet id quod porro dolorum doloremque.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(2, 1, 'Est et sint perferendis occaecati illum.', 'reprehenderit-et-nesciunt-aliquid', NULL, 'Voluptatem nam nemo sit doloremque incidunt libero fuga eum.', '<p>Voluptas harum aspernatur quo mollitia. Aut reiciendis ut ipsam corrupti aut ut. Aspernatur consequatur qui enim sit fugiat deleniti.</p><p>Est veniam non eius expedita quasi quo rerum. Velit modi quaerat autem quae. Ducimus sapiente possimus sint error. Quos quis modi veritatis consectetur officiis nostrum.</p><p>Velit eveniet quis officia quas accusantium. Quasi et sequi cumque. Et quia impedit cupiditate possimus sed. Enim suscipit aliquid voluptates molestiae.</p><p>Ut vel sed perferendis. Et odio aut maxime cumque placeat molestias. Blanditiis aliquam fuga ut sed. Tenetur assumenda est doloribus.</p><p>Nihil nihil qui aliquid. Omnis rerum hic et possimus odit sit. Maiores magni esse architecto laboriosam quod voluptas.</p><p>Debitis iusto et labore ex. Molestiae modi ipsam et delectus sed sint et. Magnam voluptatum exercitationem amet ut. Enim labore perferendis veritatis et possimus corporis.</p><p>Amet dolorem repellat nemo quis similique. Doloribus aliquam earum excepturi sit. Ex soluta et eos magni praesentium. Et in rerum modi perspiciatis similique. Doloribus quia dolores vitae aut tenetur.</p><p>Corrupti vel maiores eligendi aliquid maiores id. Quam velit vero ipsam eum ipsam quibusdam quasi. Commodi sed suscipit ad vel. Sit et adipisci sit ipsum ratione.</p><p>Iure distinctio omnis consequatur et. Nesciunt libero et veritatis. Eaque hic autem repellat et est impedit ducimus.</p><p>Ea quod rerum non molestias tempora. Dolorum deserunt facere in repellendus nisi voluptatibus fugiat dolore. Nisi vitae dolore omnis sed qui ipsam. Quia enim sit natus dolorem enim.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(3, 2, 'Odit eos quia.', 'voluptas-voluptatem-recusandae-autem-qui-inventore', NULL, 'Dolor accusantium occaecati molestiae atque.', '<p>Minima incidunt eos omnis ea sed fugit. Qui aspernatur eos delectus. Occaecati saepe debitis distinctio dolor eos.</p><p>Quis in sit sed in. Nobis facilis eos magnam voluptas at cum. Voluptatem temporibus fugiat explicabo qui. Occaecati corporis nam deserunt.</p><p>Harum inventore laudantium voluptatem. Quia velit deserunt maiores excepturi nesciunt debitis. Perferendis non consequatur ut dolor provident. Voluptas quam placeat quia adipisci enim quis.</p><p>Illo iusto beatae similique molestiae qui perferendis qui veritatis. Dolores excepturi in vitae aliquid. Ut voluptates odit a ut et. Minus facere dolores eveniet deserunt.</p><p>Omnis eaque quia et dolores deleniti aspernatur. Consectetur rerum rerum maiores vel et autem rerum. Voluptatem ea exercitationem fugiat est similique eius.</p><p>Et sed et et aliquid iusto fuga. Est impedit error commodi velit libero rerum repellat dolor. Qui quo occaecati repudiandae consequatur. Id vel in ut optio.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(4, 2, 'Esse alias et sint modi dolorem.', 'dicta-molestiae-ducimus-ipsa-aperiam-quasi-ea-aut', NULL, 'Et sapiente nobis fuga ullam ipsam.', '<p>Ipsa quam voluptates cumque aut. Dicta voluptatibus est non rerum. Et sed eveniet expedita repellat. Et qui quaerat ab explicabo. Incidunt sed sed voluptatem necessitatibus earum est quo sed.</p><p>Vel nulla consequatur laboriosam. Error neque dolores perspiciatis neque ea voluptatem accusantium. Quis voluptatibus deserunt et blanditiis voluptatum.</p><p>Veniam placeat voluptatibus quidem accusantium. Temporibus eos quidem voluptatem consequuntur corporis explicabo.</p><p>Alias voluptas ipsum ea ut ea. Voluptatibus rerum non nulla aspernatur. Reiciendis natus adipisci est.</p><p>Natus aut quas temporibus aut quidem dolor quia impedit. Voluptatem vel asperiores iste. Voluptates qui rerum dolor harum est nobis. Voluptate enim soluta nostrum quod consequatur excepturi quo.</p><p>Beatae in tempora non aliquam cupiditate. Doloribus eaque veritatis accusamus eos est iste voluptas. Quasi tenetur voluptas reiciendis adipisci nisi qui.</p><p>Adipisci numquam et a saepe qui. Quaerat nemo voluptas rerum aut sequi iure eum. Vero nesciunt quidem possimus voluptas a eius. Repudiandae officia reprehenderit aspernatur veniam nesciunt eum.</p><p>Nisi adipisci aut placeat omnis aut. Blanditiis neque assumenda optio quia ab. Qui explicabo nobis doloremque est. Ipsum quia dolor assumenda nihil doloribus esse nostrum commodi. Quibusdam ad ut aut delectus voluptatem et distinctio.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(5, 1, 'Dignissimos dolorum atque incidunt sapiente ut impedit atque animi.', 'dignissimos-dolores-adipisci-recusandae-quaerat', NULL, 'Assumenda error nam sed qui voluptatem rerum voluptatem aperiam.', '<p>Eum sit ea cupiditate nesciunt optio. Iste omnis itaque quod in. Quia accusantium aut accusantium et tempore sed sint.</p><p>Molestias aut cupiditate est sit ipsa. Rerum aut eum culpa nulla facilis eius. Adipisci quisquam aut beatae id aspernatur rerum odit velit. Delectus ab vitae in nostrum aut et.</p><p>Modi corporis in mollitia rerum. Illum nesciunt at ad et placeat. Voluptatem ut necessitatibus aut expedita non et.</p><p>Sed officiis aut voluptatem vitae perspiciatis temporibus. Nobis quae aut quod pariatur omnis in est. Consequatur aut at dolores sunt commodi laudantium quae.</p><p>Qui tempore rerum id et. Qui quia qui ex suscipit voluptate voluptatem. Vel temporibus et est aut harum et aut. Totam eius inventore libero voluptatibus similique nihil et. Quisquam voluptatem quae vel maxime assumenda illum quidem.</p><p>Doloremque non sit dolores voluptatibus aut. Doloribus qui enim ut ut. Earum iste dolorem nisi minus ad ducimus non.</p><p>Soluta numquam deserunt distinctio reiciendis eum error. Placeat aut dolores reprehenderit quis nam nemo commodi. Dolores nisi dolorem commodi enim cumque asperiores quidem. Consequuntur ipsa et ut possimus ut culpa.</p><p>Rem odio iure voluptate dolorem sequi. Ut suscipit mollitia aliquam doloremque at laudantium incidunt. Non commodi aut enim eveniet illo iure quia. Et recusandae aut doloremque in laudantium quia.</p><p>Non qui voluptatem est eaque ut. Et amet consequuntur neque. Impedit est aliquid qui unde eum.</p><p>Maxime rerum temporibus ut in velit. Tenetur aspernatur in molestias quidem magnam sunt velit doloremque.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(6, 1, 'Eaque nam ut sit non.', 'repellendus-veritatis-fugiat-corrupti-voluptas-laborum', NULL, 'At aperiam praesentium aperiam tempore nulla.', '<p>Consequatur ratione suscipit saepe fugiat accusantium est soluta. Totam dicta officia est deserunt. Ut impedit alias corporis non.</p><p>Optio ullam sed est omnis a. Vel sit id culpa doloribus delectus porro odio. Dolor deleniti qui ad quo qui nemo voluptatibus. Voluptas sed pariatur natus ut. Commodi aut molestias sint.</p><p>Cupiditate expedita ex dignissimos ratione. Sint itaque dolor ducimus itaque pariatur. Blanditiis dicta rerum repellendus qui qui est repellendus. Illo animi atque expedita ab quas.</p><p>Ipsum aut vero minus. Laborum ut quod saepe. Cumque molestias consequuntur animi et vitae nihil. Sint incidunt voluptatem odio sit suscipit tempora perferendis reiciendis. Exercitationem voluptatem sit saepe dolorem aut sit.</p><p>Aspernatur inventore voluptatum qui molestias. Qui esse illum possimus explicabo placeat quam placeat. Doloribus cumque perspiciatis mollitia et. Quo ut quidem libero rerum ut.</p><p>Itaque itaque rerum incidunt. Iure velit non eligendi illo. Corrupti ipsam debitis architecto quo modi inventore qui qui. Pariatur dolorum consequatur sed et dolores iusto.</p><p>Iste rem qui modi qui nisi quod. Accusamus labore ea magnam corporis dicta enim sit. Autem iure voluptas ipsam vero est. Quis qui doloribus rerum alias a sunt id inventore.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(7, 2, 'Autem amet amet.', 'odit-ut-repellendus-in-a-voluptas-aut', NULL, 'Consequatur quas omnis soluta sunt.', '<p>Soluta veniam sit aut dignissimos sapiente. Delectus sunt sit repellat amet et sunt modi. Provident exercitationem asperiores omnis esse. Quia est amet est eos.</p><p>Veritatis quia repellat hic sequi. Modi iste nobis et voluptates modi consequatur cum. Enim asperiores nesciunt earum aut omnis eligendi.</p><p>Et tenetur quas ut veritatis in architecto non. Ea aut optio ab doloremque omnis autem. Eum sequi necessitatibus minus nihil est totam libero. Eius nam in veniam consequatur.</p><p>Dignissimos voluptatem aut optio. Sit mollitia illum et eligendi dolore. Dolor cumque accusantium soluta autem aliquam molestiae placeat. In sed vel eum.</p><p>Asperiores et quo expedita est quod id. Molestias iste ut et quos. Et recusandae assumenda qui consequatur ut ut quaerat.</p><p>Quis nihil ab aliquam. Sunt dicta et vel. Nemo vitae rerum cum est unde sit totam.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(8, 1, 'Et non quis optio in sed quia alias.', 'minus-velit-quia-earum-vel-similique-eum', NULL, 'Rerum incidunt enim.', '<p>Est cupiditate molestias qui corrupti sunt aut. Inventore iusto esse temporibus velit voluptatem et enim. Nihil dolores laboriosam cumque aut. Magnam distinctio excepturi nihil aliquam minima.</p><p>Qui est distinctio earum voluptas ut. Sapiente dolores mollitia qui deleniti perferendis debitis qui iste. Fuga velit quisquam et sed occaecati soluta in. At error et vel pariatur eum quaerat expedita.</p><p>Rerum saepe aut odit enim aliquid velit. Ut non quia itaque aut. Deleniti nesciunt nostrum aut.</p><p>Quae dolorum est quia aut sit voluptatum. Rerum autem facere sit. Officia temporibus rerum reiciendis sint exercitationem quia aut impedit.</p><p>Ut quia quia et quae ut autem et. Explicabo et doloribus aspernatur placeat et. Non magnam mollitia velit aperiam adipisci.</p><p>Sequi harum fugiat voluptatibus praesentium vel. Aliquam quod quia dolor ut non eos libero. Fugit doloremque delectus delectus animi est occaecati aspernatur.</p><p>Sapiente sapiente ducimus hic quia. Repellat quis dolor odit omnis. Quia eos ipsam consequuntur eius.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(9, 1, 'Occaecati quis porro quo veniam aliquam.', 'eveniet-qui-unde-rem-dolor-accusantium-et-esse', NULL, 'Ex incidunt eligendi sit aut.', '<p>Molestiae excepturi maiores dolorem sint magnam. Deleniti est commodi ratione dicta qui et expedita. Eos vel sunt minus omnis.</p><p>Accusantium voluptatem illo et. Voluptatibus qui eum officia quos pariatur nam. Ab sunt voluptatem eum maiores.</p><p>Iure minima consectetur minus sunt qui doloribus. Delectus nulla ullam rem ipsum consequuntur cumque explicabo accusantium. Tempore pariatur impedit eaque. Repudiandae ab consectetur minima nisi voluptas.</p><p>Asperiores doloremque magnam et incidunt voluptatem qui. Sed exercitationem ratione delectus voluptatem corporis debitis. Ipsum quam commodi veniam laudantium. Nihil voluptates necessitatibus tempore aliquam amet aut dolor amet.</p><p>Enim fuga quia dolorem fugit in rerum dolorum alias. Est quo est dolores illo sit qui iure. Et magnam eos a iste corporis suscipit.</p><p>Autem molestiae eveniet sint eos eius eum. Animi ut labore autem nulla sit. Molestias et quia ab corrupti dicta autem.</p><p>Iusto ut aut esse ipsum commodi omnis. Corrupti similique asperiores voluptate repudiandae. Voluptatem voluptatem rerum atque. Sit sint amet quia voluptas.</p><p>Accusantium molestiae ea sint et placeat sapiente. In quia libero nobis quas.</p><p>Vero adipisci est ut optio officia illum eum sit. Nihil ea possimus illo beatae. Ipsum reprehenderit corporis totam omnis.</p><p>Aut sint laudantium ratione temporibus. Recusandae ab cum deleniti sint iure maiores. Sequi illo ut non. Consequatur consequuntur aperiam repudiandae sit eum ut nostrum.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19'),
(10, 2, 'Id laborum non occaecati facilis.', 'et-quod-molestiae-accusantium-consequuntur-nobis-sint-minus-pariatur', NULL, 'Occaecati qui ipsum cum.', '<p>Maiores nostrum molestiae molestiae quo. Accusantium rerum tempora dolor dolorum voluptates. Dolores et ullam praesentium.</p><p>Dolor qui consectetur tempore quod aut neque dolores. Ipsam iure debitis voluptas quibusdam. Eveniet et inventore similique impedit nemo repellat deleniti.</p><p>Ex voluptas ut ut ab laboriosam doloribus eum consequatur. Consequatur possimus molestiae unde laudantium. Debitis quam minima non occaecati optio iste hic. Sed eius culpa molestiae sunt tenetur molestiae aut.</p><p>Labore quo similique in sunt. Voluptas est hic enim laudantium veritatis quidem ipsum. Voluptatum nobis vel odit placeat sunt provident voluptatibus. Saepe tempora soluta et exercitationem excepturi. Consequatur et qui facilis provident.</p><p>Sunt ut laboriosam nihil porro doloremque corrupti deserunt. Dolor et sed et consequatur nostrum debitis possimus. Eius autem sequi quidem nihil sunt autem. Facilis optio minima ab recusandae voluptatem quo animi non.</p><p>Voluptatem quis enim veniam omnis tempora consequuntur explicabo et. Vel placeat illo nesciunt suscipit veritatis fuga aperiam ut. Illo aut dolor at dolores sunt ut at. Et nulla velit laborum dolores assumenda maiores fugit.</p><p>Earum necessitatibus eveniet consectetur ipsam explicabo. Quo id quos ut doloribus laboriosam totam.</p>', NULL, '2022-08-30 14:32:19', '2022-08-30 14:32:19');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indeks untuk tabel `aparatur_desas`
--
ALTER TABLE `aparatur_desas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `assistances`
--
ALTER TABLE `assistances`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indeks untuk tabel `category_profil`
--
ALTER TABLE `category_profil`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_profil_nama_unique` (`nama`),
  ADD UNIQUE KEY `category_profil_slug_unique` (`slug`);

--
-- Indeks untuk tabel `data_penduduk`
--
ALTER TABLE `data_penduduk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_penduduk_nik_unique` (`nik`);

--
-- Indeks untuk tabel `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `finances`
--
ALTER TABLE `finances`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `layanan_mandiri`
--
ALTER TABLE `layanan_mandiri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mading_desa`
--
ALTER TABLE `mading_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `marriages`
--
ALTER TABLE `marriages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `penduduks`
--
ALTER TABLE `penduduks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indeks untuk tabel `potentials`
--
ALTER TABLE `potentials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `potentials_name_unique` (`name`),
  ADD UNIQUE KEY `potentials_slug_unique` (`slug`);

--
-- Indeks untuk tabel `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profil_desa`
--
ALTER TABLE `profil_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `religions`
--
ALTER TABLE `religions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_keterangan_tidak_mampu`
--
ALTER TABLE `surat_keterangan_tidak_mampu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_keterangan_usaha`
--
ALTER TABLE `surat_keterangan_usaha`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_nik_unique` (`nik`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `villages`
--
ALTER TABLE `villages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `villages_slug_unique` (`slug`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `aparatur_desas`
--
ALTER TABLE `aparatur_desas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `assistances`
--
ALTER TABLE `assistances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `category_profil`
--
ALTER TABLE `category_profil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_penduduk`
--
ALTER TABLE `data_penduduk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `finances`
--
ALTER TABLE `finances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `layanan_mandiri`
--
ALTER TABLE `layanan_mandiri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `mading_desa`
--
ALTER TABLE `mading_desa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `marriages`
--
ALTER TABLE `marriages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `penduduks`
--
ALTER TABLE `penduduks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `potentials`
--
ALTER TABLE `potentials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `professions`
--
ALTER TABLE `professions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `profil_desa`
--
ALTER TABLE `profil_desa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `religions`
--
ALTER TABLE `religions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `surat_keterangan_tidak_mampu`
--
ALTER TABLE `surat_keterangan_tidak_mampu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surat_keterangan_usaha`
--
ALTER TABLE `surat_keterangan_usaha`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `villages`
--
ALTER TABLE `villages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
