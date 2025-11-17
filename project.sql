-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 07:58 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `tabel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `kode`, `nama`, `password`, `role`, `tabel`) VALUES
(1, '1.01.2.22.0.00.01.0000', 'Dinas Pendidikan dan Kebudayaan', '$2y$10$n3EIZVbSPI7cLxYpZIwQR.zEy72Rlh0So9kU5bFUoS2Rk3W9U6IRS', 'user', 'dinas_pendidikan_dan_kebudayaan'),
(2, '1.02.0.00.0.00.01.00', 'Dinas Kesehatan', '$2y$10$ZllWbAFCDzg.tDG8VNriQeHHtx4/2omwzF.3FOkjZaYyuw1EYJS1q', 'user', 'dinas_kesehatan'),
(3, '1.02.0.00.0.00.02.00', 'Rumah Sakit Umum DR. H. Koesnadi', '$2y$10$cPUCudDO/Y8eok/R6KGTJu2IhAocNBSAhgbmyFPyGqkeWCqAwet0m', 'user', 'rumah_sakit_umum_dr_h_koesnadi'),
(4, '1.03.0.00.0.00.01.00', 'Dinas Pekerjaan Umum dan Penataan Ruang', '$2y$10$dAHLKpEiTeXvDkGUdq8/0.iEB31YjHohOq5Zq6kSeLd8fBuujRx/W', 'user', 'dinas_pekerjaan_umum_dan_penataan_ruang'),
(5, '1.04.2.10.0.00.01.00', 'Dinas Perumahan dan Kawasan Permukiman', '$2y$10$YBwBt2T3ji/gVTocDa9i9evy7IRK10S8T4Zb8VUxxgdiq1yRguLoq', 'user', 'dinas_perumahan_dan_kawasan_permukiman'),
(6, '1.05.0.00.0.00.01.0000', 'Satuan Polisi Pamong Praja', '$2y$10$RzEzC.h4zBYLfC4.E8Yys.Qa1X1ScNoYWFuhEWWNm/yMYW1tJic4G', 'user', 'satuan_polisi_pamong_praja'),
(7, '1.05.0.00.0.00.02.0000', 'Badan Penanggulangan Bencana Daerah', '$2y$10$t9SAYZwJQNQRbj.XVufSJeRqkzrEiytf42IucV56fXcUJytGGOMRe', 'user', 'badan_penanggulangan_bencana_daerah'),
(8, '1.06.0.00.0.00.01.0000', 'Dinas Sosial', '$2y$10$G3iIU8oT2OkpXctQ1dND6u2j169K9GU3BLaNPQJR3e6i97M5DjG5S', 'user', 'dinas_sosial'),
(9, '2.08.2.14.0.00.01.0000', 'Dinas Pemberdayaan Perempuan dan Keluarga Berencana', '$2y$10$BnYGykLdbJy2Ig956Zsql.SQyzyVckVyhXFs.sRhdxSjEEa7oexHS', 'user', 'dinas_pemberdayaan_perempuan_dan_keluarga_berencana'),
(10, '2.09.3.25.0.00.01.00', 'Dinas Ketahanan Pangan dan Perikanan', '$2y$10$YL8eLcbvHaPbwK.Yw4N2FOoD1FCgev.8kOAdiwDEqUP2wuPNULiJi', 'user', 'dinas_ketahanan_pangan_dan_perikanan'),
(11, '2.11.2.15.0.00.01.0000', 'Dinas Lingkungan Hidup dan Perhubungan', '$2y$10$8USL6ytByscDM4.NxZtmye.byp/NGDnD4GDep26KYe9TmvsflQxiq', 'user', 'dinas_lingkungan_hidup_dan_perhubungan'),
(12, '2.12.0.00.0.00.01.00', 'Dinas Kependudukan dan Pencatatan Sipil', '$2y$10$qsWZ9sT4TqayJXR7zyUCjeyjQWtesYV9URc2b4z5uAY5jDjhdB1a2', 'user', 'dinas_kependudukan_dan_pencatatan_sipil'),
(13, '2.13.0.00.0.00.01.0000', 'Dinas Pemberdayaan Masyarakat Desa', '$2y$10$oOXdeQv3vrfb2xyj9u.9h.9hh7fVwY512Jqe9Ss.6eefxzlZ/xw1.', 'user', 'dinas_pemberdayaan_masyarakat_desa'),
(14, '2.16.2.20.2.21.01.0000', 'Dinas Komunikasi dan Informatika', '$2y$10$fJJX9pHnkk7/HxZXGF3Ct.TnVgXGHe7BWTOg/SH8jL7ay9.nI3j5m', 'user', 'dinas_komunikasi_dan_informatika'),
(15, '2.17.3.31.3.30.01.00', 'Dinas Koperasi Perindustrian dan Perdagangan', '$2y$10$gQaQwWW3dIDhxwMQ20gLDu9/pVVUlJ9kmRPWo1XSbZfG.XkD4B74e', 'user', 'dinas_koperasi_perindustrian_dan_perdagangan'),
(16, '2.18.2.07.3.32.01.00', 'Dinas Penanaman Modal, Pelayanan Terpadu Satu Pintu dan Tenaga Kerja', '$2y$10$xif3ogePTw7leBXHTOQHm.7QobyC9Fu/AjeEwl6GDNdP1nPrChfLy', 'user', 'dinas_penanaman_modal_pelayanan_terpadu_dan_tenaga_kerja'),
(17, '2.23.2.24.0.00.01.00', 'Dinas Perpustakaan dan kearsipan', '$2y$10$spdbv2fJA.P8w0Ew72tq3uljYBbcqS.OAWZDwaAGp2lH7EQYr/arS', 'user', 'dinas_perpustakaan_dan_kearsipan'),
(18, '3.26.2.19.0.00.01.00', 'Dinas Pariwisata, Pemuda dan Olah Raga', '$2y$10$5e.MU37fDaTqkja1lo4t5.zHtAuOP9NHbf8iNHhHv045oQWRh2zOu', 'user', 'dinas_pariwisata_pemuda_dan_olah_raga'),
(19, '3.27.0.00.0.00.01.00', 'Dinas Pertanian', '$2y$10$maw2ZiYrka6GPGz6jOP5OOK1gUyOmuglEQpjK5LhGP769ZK8T9HRe', 'user', 'dinas_pertanian'),
(20, '4.01.0.00.0.00.01.0000', 'Sekretariat Daerah', '$2y$10$Po85LXbHD3kzbJEirCjJ2OBUrFaKhzQ/03AyZISHra7D.MtYpiGmu', 'user', 'sekretariat_daerah'),
(21, '4.01.0.00.0.00.01.01', 'Bagian Administrasi Pemerintahan', '$2y$10$neS1mmG.s7lFSTeT.Dpoz.ojKFebt95BPD1IYGruByZsU6i.VD1W6', 'user', 'bagian_administrasi_pemerintahan'),
(22, '4.01.0.00.0.00.01.02', 'Bagian Hukum', '$2y$10$64viHhNq7wZ29nV2EXIXDOuE6u7tasQQdoGb6ENF5bB19k6lo.AXi', 'user', 'bagian_hukum'),
(23, '4.01.0.00.0.00.01.03', 'Bagian Kesejahteraan Rakyat', '$2y$10$7AAt66bZAL2EIXsU7MOiou8wJkQXxiQ7BoZOaORiiHrdLwMxhhH8a', 'user', 'bagian_kesejahteraan_rakyat'),
(24, '4.01.0.00.0.00.01.04', 'Bagian Administrasi Perekonomian', '$2y$10$BAc1iU333R0qqL9zB9PBJ.c.tQ2KFI3f03LhRlPY6iIT/sL6FoJkq', 'user', 'bagian_administrasi_perekonomian'),
(25, '4.01.0.00.0.00.01.05', 'Bagian Pengadaan Barang dan Jasa', '$2y$10$Me7knq5FAyslitvQLZBWvuKu5alCgTFf3CwIhXBI1RYbgHDLBYNny', 'user', 'bagian_pengadaan_barang_dan_jasa'),
(26, '4.01.0.00.0.00.01.06', 'Bagian Organisasi', '$2y$10$078B94Kg0l5GNC9MLaTKVOTNfzDUfkl3UTvjzLyHq571IHlchRYSu', 'user', 'bagian_organisasi'),
(27, '4.01.0.00.0.00.01.07', 'Bagian Umum dan Perlengkapan', '$2y$10$zsbXYFav7wnJ8UcJTaqaFeLvuBsn0w2ChGFxFhk1zviZ.esJ14Yk2', 'user', 'bagian_umum_dan_perlengkapan'),
(28, '4.01.0.00.0.00.01.08', 'Bagian Humas dan Protokol', '$2y$10$OBVLhAUqnUvVfJxVGk/6Q.TYtSDi2EaK.tBA7TLZmaXqA9M.I4RR.', 'user', 'bagian_humas_dan_protokol'),
(29, '4.01.0.00.0.00.01.09', 'Bagian Administrasi Pembangunan dan Keuangan', '$2y$10$Z0lpw1JcpiJnCnff37pUAegdQXN1tSotBwtNyrqHRuCeS.pu6hpZC', 'user', 'bagian_administrasi_pembangunan_dan_keuangan'),
(30, '4.02.0.00.0.00.01.00', 'Sekretariat DPRD', '$2y$10$Xs2s35ntu0/i2dRet/5Gn.5IMQk9Lm7xR6HVO2o6pRHJs2rdnHr36', 'user', 'sekretariat_dprd'),
(31, '5.01.5.05.0.00.02.00', 'Badan Perencanaan Pembangunan Daerah', '$2y$10$3T9RZgmTLo7gIvBCq5QPTOqS1/bTOLgDoWNorwShNNFxxM1lGRp62', 'user', 'badan_perencanaan_pembangunan_daerah'),
(32, '5.02.0.00.0.00.01.00', 'Badan Pengelolaan Keuangan dan Aset Daerah', '$2y$10$p73fRrHFIgw2SGT1ejOUlOVtGqANLlSB8RgKpJ31grqYjGLllndd.', 'user', 'badan_pengelolaan_keuangan_dan_aset_daerah'),
(33, '5.02.0.00.0.00.02.0000', 'Badan Pendapatan Daerah', '$2y$10$oxL/sY3KuwimT.5x2pZ68O59l5ifqsdra8wbLqEpkDtS3oKfqoUn.', 'user', 'badan_pendapatan_daerah'),
(34, '5.03.5.04.0.00.01.0000', 'Badan Kepegawaian Daerah', '$2y$10$bzIidLSue1P5ORbHXCGce.2vZ2.qUmfc4CsHayF.jK8N4ojvTpKEa', 'user', 'badan_kepegawaian_daerah'),
(35, '6.01.0.00.0.00.01.00', 'Inspektorat', '$2y$10$nr.bZUolBlYXeBfV2oYd0OJTNGmpn7XgGWFKSdQOhQ40xi1V7cEhu', 'user', 'inspektorat'),
(36, '7.01.0.00.0.00.01.00', 'Kecamatan Bondowoso', '$2y$10$hz7f4ZeKnXu4X.c/5V8dieNvQiY0eu7eX8Sv2/2A.b2RCexcoF1j.', 'user', 'kecamatan_bondowoso'),
(37, '7.01.0.00.0.00.02.00', 'Kecamatan Tamanan', '$2y$10$hwtnr1NmXjbxBsO.CnfA5Oq8XD3xe6/Ffcojk5RpBR5SCpH49L6.C', 'user', 'kecamatan_tamanan'),
(38, '7.01.0.00.0.00.03.00', 'Kecamatan Tenggarang', '$2y$10$zjs5nAm4TfvRzuhDDX1XqOFipfvNI4NUBNan6fn2M0pQeuDeh0u4a', 'user', 'kecamatan_tenggarang'),
(39, '7.01.0.00.0.00.04.00', 'Kecamatan Tegalampel', '$2y$10$JuGJljEJfJN/WBK57F.N4e1B3OV9Hm0WphUGtsApPxvQU6Me1fiFO', 'user', 'kecamatan_tegalampel'),
(40, '7.01.0.00.0.00.05.00', 'Kecamatan Curahdami', '$2y$10$65ZKEn8M7hU0cipbtj3pQ.e/1G6SBUdXeTaiwegyVmh7Id9VLv9Yy', 'user', 'kecamatan_curahdami'),
(41, '7.01.0.00.0.00.06.00', 'Kecamatan Wringin', '$2y$10$FzkVHNcXjwDl6Ook85lkkOC4mffCX91UjY2juu4oWRDHirwKciGJu', 'user', 'kecamatan_wringin'),
(42, '7.01.0.00.0.00.07.00', 'Kecamatan Pakem', '$2y$10$Zm8d4nPwvgpoIeK3HlJOeOX4alHHOVFKbiAwuszMqU0kAVcCzo/f2', 'user', 'kecamatan_pakem'),
(43, '7.01.0.00.0.00.08.00', 'Kecamatan Binakal', '$2y$10$OMF/x8oQ6HOPuznkR2HXjOL63YjhaM7.26UInzRY.I91b0AMD7Uha', 'user', 'kecamatan_binakal'),
(44, '7.01.0.00.0.00.09.00', 'Kecamatan Maesan', '$2y$10$u6Dz/oTzqsl./vmKevYi7eVAW9UeXhu9UWlJRy2tO28tLYCT/t.pO', 'user', 'kecamatan_maesan'),
(45, '7.01.0.00.0.00.10.00', 'Kecamatan Grujugan', '$2y$10$2ihPRNqkfaIMawkywBN8FOOHnl6IE6XtLsUgfIJcnv.URQgsQWsvi', 'user', 'kecamatan_grujugan'),
(46, '7.01.0.00.0.00.11.00', 'Kecamatan Pujer', '$2y$10$ILJKcrwUN4xp4KV67ejlrudByrg0VW60GphjqtWPrS5h9ExpfiNDC', 'user', 'kecamatan_pujer'),
(47, '7.01.0.00.0.00.12.00', 'Kecamatan Wonosari', '$2y$10$w3WKEJWtYb/BRPyMuEjT5.9qNfy3uMJIEEjXkAnB3vI.FzUdtHMRC', 'user', 'kecamatan_wonosari'),
(48, '7.01.0.00.0.00.13.00', 'Kecamatan Sukosari', '$2y$10$rcGXVfOumsrMJ5eJszRp2.8bHOkWqjHvdIFWWA7afd.NJls0tdiyi', 'user', 'kecamatan_sukosari'),
(49, '7.01.0.00.0.00.14.00', 'Kecamatan Tlogosari', '$2y$10$nXEAMDA9bnk2xIWmjsnqvOz2AW5xWbCiw1Kz6bnhMv9O63l7fyOiS', 'user', 'kecamatan_tlogosari'),
(50, '7.01.0.00.0.00.15.00', 'Kecamatan Tapen', '$2y$10$UExW3.hYybXOxmMpjpF1Wu8T1wV9zirbXjua7mqKa5PhK2EPlmDCe', 'user', 'kecamatan_tapen'),
(51, '7.01.0.00.0.00.16.00', 'Kecamatan Sumber Wringin', '$2y$10$DQVwYASsdT0Et.N4h.nj7OUOYr.ktnJuCxjfYddYdFjaVHGOyYhJ2', 'user', 'kecamatan_sumber_wringin'),
(52, '7.01.0.00.0.00.17.00', 'Kecamatan Prajekan', '$2y$10$Lg/rYuEK/8TI2QiRwoniTu.ZAvUwSrsV5tyGjjsJucn2oWXSPLVNC', 'user', 'kecamatan_prajekan'),
(53, '7.01.0.00.0.00.18.00', 'Kecamatan Klabang', '$2y$10$lP8RXzzXIZ9mhYAYNuyaq.nxoAesfbRSl0QQB2IjPA0BB4CIucOOO', 'user', 'kecamatan_klabang'),
(54, '7.01.0.00.0.00.19.0000', 'Kecamatan Cermee', '$2y$10$3JvtgoiWRdjHwAJffTZyYOwe2LOchi.Fq7pwb3PaTC7rBs9jeO1hK', 'user', 'kecamatan_cermee'),
(55, '7.01.0.00.0.00.20.00', 'Kecamatan Ijen', '$2y$10$EZM0bdOfdVoIHxH6acuQyeA7ebex6p5Eq2DrwCVfal.Qw3zDnBf12', 'user', 'kecamatan_ijen'),
(56, '7.01.0.00.0.00.21.00', 'Kecamatan Taman Krocok', '$2y$10$CXwosU0QCkSQJxgmIN8YBe5C/bVuyfhs1GAmw8iOwaIpK9tiOw/Na', 'user', 'kecamatan_taman_krocok'),
(57, '7.01.0.00.0.00.22.00', 'Kecamatan Jambesari Darussholah', '$2y$10$tKkvVME7pVVMsypbFS5yG.8oMJgICsAlKpDPIs7JuWINikYk7wayS', 'user', 'kecamatan_jambesari_darussholah'),
(58, '7.01.0.00.0.00.23.00', 'Kecamatan Botolinggo', '$2y$10$YByRf0HUubwZkKtHc8ynbOofqf532vYSTh/0gn9p0jMq6hgv8yz62', 'user', 'kecamatan_botolinggo'),
(59, '8.01.0.00.0.00.01.0000', 'Badan Kesatuan Bangsa dan Politik', '$2y$10$h1.viAEmuqrPWD33QKcVieKLwLmvEP.ljIoxJPk/j3lfhwY3i.20m', 'user', 'badan_kesatuan_bangsa_dan_politik'),
(60, '10010', 'admin', '$2y$10$eR6ZkTh0MCJJEiIurbbFZez43KbAlhpHr5OjKlUeHq50o14muI/DW', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
