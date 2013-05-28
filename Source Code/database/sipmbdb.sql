-- phpMyAdmin SQL Dump
-- version 2.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 19, 2011 at 04:53 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `sipmbdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL auto_increment,
  `ad_nama` varchar(20) collate latin1_general_ci NOT NULL,
  `ad_alamat` varchar(100) collate latin1_general_ci NOT NULL,
  `ad_tlp` varchar(20) collate latin1_general_ci NOT NULL,
  `username` varchar(40) collate latin1_general_ci NOT NULL,
  `password` varchar(40) collate latin1_general_ci NOT NULL,
  `sa_id` int(11) NOT NULL,
  PRIMARY KEY  (`ad_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_nama`, `ad_alamat`, `ad_tlp`, `username`, `password`, `sa_id`) VALUES
(1, 'pengusaha', 'tes', '089876656333', 'webmaster', 'c33367701511b4f6020ec61ded352059', 1),
(6, 'sukses', 'jalan solo', '08923423432', 'sukses', 'e10adc3949ba59abbe56e057f20f883e', 2);

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `a_id` int(11) NOT NULL auto_increment,
  `a_nama` varchar(20) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`a_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`a_id`, `a_nama`) VALUES
(1, 'Islam'),
(2, 'Katolik'),
(3, 'Protestan'),
(4, 'Budha'),
(5, 'Hindhu'),
(6, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `beasiswa`
--

CREATE TABLE `beasiswa` (
  `b_id` int(11) NOT NULL auto_increment,
  `b_nama` bigint(20) NOT NULL,
  `b_max` float NOT NULL,
  `b_min` float NOT NULL,
  PRIMARY KEY  (`b_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `beasiswa`
--

INSERT INTO `beasiswa` (`b_id`, `b_nama`, `b_max`, `b_min`) VALUES
(1, 500000, 0, 0),
(2, 600000, 0, 0),
(3, 700000, 0, 0),
(4, 800000, 0, 0),
(5, 900000, 0, 0),
(6, 1000000, 0, 0),
(7, 1100000, 7.49, 7),
(8, 1200000, 7.99, 7.5),
(9, 1300000, 8.49, 8),
(10, 1400000, 8.99, 8.5),
(11, 1500000, 10, 9),
(0, 0, 6.99, 0);

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(3) NOT NULL auto_increment,
  `judul_berita` varchar(50) collate latin1_general_ci NOT NULL default '',
  `detail_berita` varchar(200) collate latin1_general_ci NOT NULL default '',
  `tanggal_masuk` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`id_berita`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `detail_berita`, `tanggal_masuk`) VALUES
(1, 'Gempa Bumi Melanda Nias', 'Baru beberapa hari masyarakat di Pulai Nias merasakan ketenangan, sekarang ALLAH telah menguji kembali dengan terguncangnya Gempa yang bertenaga 8,2 SL', '2005-03-30'),
(2, 'Keterlambatan Bantuan', 'Sampai berita ini dionlinekan, bantuan yang berasal dari pemerintah masih belum dapat didistirbusikan. Hal ini karena tidak adanya transportasi disana', '2005-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `gelombang`
--

CREATE TABLE `gelombang` (
  `g_id` int(11) NOT NULL auto_increment,
  `g_nama` varchar(20) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`g_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gelombang`
--

INSERT INTO `gelombang` (`g_id`, `g_nama`) VALUES
(1, 'Gelombang Khusus'),
(2, 'Gelombang I'),
(3, 'Gelombang II'),
(4, 'Gelombang III');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `i_id` int(11) NOT NULL auto_increment,
  `i_nama` varchar(20) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`i_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`i_id`, `i_nama`) VALUES
(1, 'Internet'),
(2, 'TV / Radio'),
(3, 'Brosur / Koran'),
(4, 'Teman / Saudara / Gu'),
(5, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `j_id` int(11) NOT NULL auto_increment,
  `j_nama` varchar(20) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`j_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`j_id`, `j_nama`) VALUES
(1, 'Pria'),
(2, 'Wanita');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `ju_id` int(11) NOT NULL auto_increment,
  `ju_nama` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`ju_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`ju_id`, `ju_nama`) VALUES
(1, 'S1 UTM'),
(2, 'S1 UP'),
(3, 'S1 UJ'),
(4, 'S1 UBBB');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan2`
--

CREATE TABLE `jurusan2` (
  `ju_id` int(11) NOT NULL auto_increment,
  `ju_nama` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`ju_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `jurusan2`
--

INSERT INTO `jurusan2` (`ju_id`, `ju_nama`) VALUES
(1, 'D3 Manajemen Informatika'),
(2, 'D3 Teknik Informatika'),
(4, 'S1 Sistem Informasi'),
(5, 'S1 Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan_smu`
--

CREATE TABLE `jurusan_smu` (
  `js_id` int(11) NOT NULL auto_increment,
  `js_nama` varchar(20) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`js_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `jurusan_smu`
--

INSERT INTO `jurusan_smu` (`js_id`, `js_nama`) VALUES
(1, 'IPA'),
(2, 'IPS'),
(3, 'Bahasa'),
(4, 'STM'),
(5, 'SMEA'),
(6, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `k_id` int(11) NOT NULL auto_increment,
  `pr_id` int(11) NOT NULL,
  `k_nama` varchar(20) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`k_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12475 ;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`k_id`, `pr_id`, `k_nama`) VALUES
(1171, 11, 'Kota Banda Aceh'),
(1204, 12, 'Tapanuli Tengah'),
(1207, 12, 'Labuhan Batu'),
(1209, 12, 'Simalungun'),
(1211, 12, 'Karo'),
(1213, 12, 'Langkat'),
(1271, 12, 'Kota Sibolga'),
(1272, 12, 'Kota Tanjung Balai'),
(1273, 12, 'Kota Pematang Sianta'),
(1274, 12, 'Kota Tebing Tinggi'),
(1275, 12, 'Kota Medan'),
(1276, 12, 'Kota Binjai'),
(2071, 20, 'Kota Batam'),
(1403, 14, 'Indragiri Hil'),
(1471, 14, 'Pekan Baru'),
(1302, 13, 'Pesisir Selatan'),
(1305, 13, 'Tanah Datar'),
(1307, 13, 'Agam'),
(1308, 13, 'Lima Puluh Koto'),
(1371, 13, 'Kota Padang'),
(1372, 13, 'Kota Solok'),
(1374, 13, 'Kota Padang Panjang'),
(1375, 13, 'Kota Bukit Tingggi'),
(1376, 13, 'Kota Payakumbuh'),
(1501, 15, 'Kerinci'),
(1571, 15, 'Kota Jambi'),
(1771, 17, 'Kota Bengkulu'),
(1671, 16, 'Kota Palembang'),
(1971, 19, 'Kota Pangkal Pinang'),
(1871, 18, 'Kota Bandar Lampung'),
(1801, 18, 'Lampung Barat'),
(6108, 61, 'Kapuas Hulu'),
(6171, 61, 'Kota Pontianak'),
(6301, 63, 'Tanah Laut'),
(6304, 63, 'Barito Kuala'),
(6305, 63, 'Tapin'),
(6306, 63, 'Hulu Sei Selatan'),
(6307, 63, 'Hulu Sei Tengah'),
(6309, 63, 'Tabalong'),
(6371, 63, 'Kota Banjarmasin'),
(12474, 124, 'Kota Palangka Raya'),
(6405, 64, 'Berau'),
(6472, 64, 'Kota Samarinda'),
(6471, 64, 'Kota Balikpapan'),
(7571, 75, 'Kota Gorontalo'),
(7172, 71, 'Kota Bitung'),
(7171, 71, 'Kota Manado'),
(7271, 72, 'Kota Palu'),
(7402, 74, 'Muna'),
(7301, 73, 'Selayar'),
(7302, 73, 'Bulukumba'),
(7303, 73, 'Bantaeng'),
(7305, 73, 'Takalar'),
(7310, 73, 'Kota Ujung Pandang'),
(7307, 73, 'Sinjai'),
(7308, 73, 'Maros'),
(7311, 73, 'Bone'),
(7312, 73, 'Soppeng'),
(7313, 73, 'Wajo'),
(7372, 73, 'Kota Pare-pare'),
(7314, 73, 'Sidenreng Rappang'),
(7316, 73, 'Enrekang'),
(7315, 73, 'Pinrang'),
(7601, 76, 'Majene'),
(7304, 73, 'Jeneponto'),
(7306, 73, 'Gowa'),
(7309, 73, 'Pangkajene Kepulauan'),
(8171, 81, 'Kota Ambon'),
(1115, 11, 'Nagan Raya'),
(1116, 11, 'Aceh Jaya'),
(1106, 11, 'Aceh Tengah'),
(1114, 11, 'Aceh Tamiang'),
(1174, 11, 'Kota Lhoksumawe'),
(1104, 11, 'Aceh Tenggara'),
(1103, 11, 'Aceh Selatan'),
(1112, 11, 'Aceh Barat Daya'),
(1113, 11, 'Gayo Lues'),
(1173, 11, 'Kota Langsa'),
(1117, 11, 'Bener Meriah'),
(1105, 11, 'Aceh Timur'),
(1111, 11, 'Aceh Utara'),
(1110, 11, 'Bireun'),
(1205, 12, 'Tapanuli Utara'),
(1206, 12, 'Toba Samosir'),
(1217, 12, 'Samosir'),
(1404, 14, 'Pelalawan'),
(1406, 14, 'Kampar'),
(1202, 12, 'Mandailing Natal'),
(1405, 14, 'Siak'),
(1407, 14, 'Rokan Hulu'),
(1408, 14, 'Kota Dumai'),
(1409, 14, 'Rokan Hilir'),
(1401, 14, 'Kuantan Singingi'),
(1509, 15, 'Bungo'),
(1506, 15, 'Tanjung Jabung Timur'),
(1504, 15, 'Batanghari'),
(1505, 15, 'Muaro Jambi'),
(1508, 15, 'Tebo'),
(1507, 15, 'Tanjung Jabung Barat'),
(1402, 14, 'Indragiri Hulu'),
(1503, 15, 'Sarolangun'),
(1674, 16, 'Kota Lubuk Linggau'),
(1606, 16, 'Musi Banyuasin'),
(1605, 16, 'Musi Rawas'),
(1502, 15, 'Merangin'),
(1607, 16, 'Banyuasin'),
(1702, 17, 'Rejang Lebong'),
(1707, 17, 'Lebong'),
(1703, 17, 'Bengkulu Utara'),
(1706, 17, 'Muko-muko'),
(1704, 17, 'Kaur'),
(1610, 16, 'Ogan Ilir'),
(1672, 16, 'Kota Prabumulih'),
(1673, 16, 'Kota Pagar Alam'),
(1872, 18, 'Kota Metro'),
(1806, 18, 'Lampung Utara'),
(1803, 18, 'Lampung Selatan'),
(1802, 18, 'Tanggamus'),
(1804, 18, 'Lampung Timur'),
(1805, 18, 'Lampung Tengah'),
(1701, 17, 'Bengkulu Selatan'),
(1705, 17, 'Seluma'),
(1601, 16, 'Ogan Komering Ulu'),
(1808, 18, 'Tulangbawang'),
(1609, 16, 'Oku Timur'),
(1603, 16, 'Muara Enim'),
(1602, 16, 'Ogan Komering Ilir'),
(1807, 18, 'Way Kanan'),
(1905, 19, 'Bangka Selatan'),
(1904, 19, 'Bangka Tengah'),
(1903, 19, 'Bangka Barat'),
(6109, 61, 'Sekadau'),
(6110, 61, 'Melawi'),
(6206, 62, 'Sukamara'),
(6210, 62, 'Pulang Pisau'),
(6104, 61, 'Pontianak'),
(6201, 62, 'Kota Waringin Barat'),
(6207, 62, 'Lamandau'),
(6202, 62, 'Kota Waringin Timur'),
(6208, 62, 'Seruyan'),
(6209, 62, 'Katingan'),
(6103, 61, 'Landak'),
(6107, 61, 'Sintang'),
(6105, 61, 'Sanggau'),
(6203, 62, 'Kapuas'),
(6211, 62, 'Gunung Mas'),
(6205, 62, 'Barito Utara'),
(6213, 62, 'Murung Raya'),
(6212, 62, 'Barito Timur'),
(6204, 62, 'Barito Selatan'),
(6372, 63, 'Kota Banjar Baru'),
(6303, 63, 'Banjar'),
(6310, 63, 'Tanah Bumbu'),
(6302, 63, 'Kota Baru'),
(6401, 64, 'Pasir'),
(6409, 64, 'Penajem Paser Utara'),
(6402, 64, 'Kutai Barat'),
(6473, 64, 'Kota Tarakan'),
(6407, 64, 'Bulungan'),
(6406, 64, 'Malinau'),
(6408, 64, 'Nunukan'),
(7603, 76, 'Polewali Mandar'),
(7602, 76, 'Mamasa'),
(7604, 76, 'Mamuju'),
(7605, 76, 'Mamuju Utara'),
(7373, 73, 'Kota Palopo'),
(7325, 73, 'Luwu Timur'),
(7322, 73, 'Luwu Utara'),
(7404, 74, 'Kolaka'),
(7410, 74, 'Kolaka Utara'),
(7501, 75, 'Boalemo'),
(7504, 75, 'Bone Bolango'),
(8203, 82, 'Kepulauan Sula'),
(8205, 82, 'Halmahera Utara'),
(8206, 82, 'Halmahera Timur'),
(9106, 91, 'Sorong Selatan'),
(9103, 91, 'Teluk Wondama'),
(9104, 91, 'Teluk Bintuni'),
(9105, 91, 'Manokwari'),
(9101, 91, 'Fak Fak'),
(9404, 94, 'Nabire'),
(9420, 94, 'Keerom'),
(9471, 94, 'Kota Jayapura'),
(9419, 94, 'Sarmi'),
(9403, 94, 'Jayapura'),
(9417, 94, 'Pegunungan Bintang'),
(9401, 94, 'Merauke'),
(9414, 94, 'Mappi'),
(9413, 94, 'Boven Digoel'),
(9402, 94, 'Jaya Wijaya'),
(9410, 94, 'Paniai'),
(9411, 94, 'Puncak Jaya'),
(9418, 94, 'Tolikara'),
(9416, 94, 'Yahukimo'),
(6101, 61, 'Sambas'),
(6102, 61, 'Bengkayang'),
(6172, 61, 'Kota Singkawang'),
(9102, 91, 'Kaimana'),
(9412, 94, 'Mimika'),
(2001, 20, 'Karimun'),
(2003, 20, 'Natuna'),
(1901, 19, 'Bangka'),
(1107, 11, 'Aceh Barat'),
(1101, 11, 'Simeuleu'),
(1201, 12, 'Nias'),
(1214, 12, 'Nias Selatan'),
(1210, 12, 'Dairi'),
(1216, 12, 'Pakpak Bharat'),
(1309, 13, 'Pasaman'),
(1312, 13, 'Pasaman Barat'),
(1303, 13, 'Solok'),
(1310, 13, 'Solok Selatan'),
(1311, 13, 'Dharmasraya'),
(1301, 13, 'Kep.Mentawai'),
(1902, 19, 'Belitung'),
(1906, 19, 'Belitung Timur'),
(7205, 72, 'Donggala'),
(7203, 72, 'Morowali'),
(7208, 72, 'Parigi Moutong'),
(7206, 72, 'Toli Toli'),
(7207, 72, 'Buol'),
(7202, 72, 'Banggai'),
(7201, 72, 'Banggai Kepualauan'),
(7407, 74, 'Wakatobi'),
(7406, 74, 'Bombana'),
(7405, 74, 'Konawe Selatan'),
(8104, 81, 'Buru'),
(8107, 81, 'Seram Bagian Timur'),
(8103, 81, 'Maluku Tengah'),
(8106, 81, 'Seram Bagian Barat'),
(8101, 81, 'Maluku Tenggara Bara'),
(8102, 81, 'Maluku Tenggara'),
(8105, 81, 'Kepulauan Aru'),
(8204, 82, 'Halmahera Selatan'),
(9108, 91, 'Raja Ampat'),
(9426, 94, 'Waropen'),
(9408, 94, 'Yapen'),
(9427, 94, 'Supiori'),
(9409, 94, 'Biak Numfor'),
(1108, 11, 'Aceh Besar'),
(1172, 11, 'Kota Sabang'),
(1277, 12, 'Padang Sidempuan'),
(1203, 12, 'Tapanuli Selatan'),
(1218, 12, 'Serdang Bedagai'),
(1212, 12, 'Deli Serdang'),
(1377, 13, 'Kota Pariaman'),
(1306, 13, 'Padang Pariaman'),
(2004, 20, 'Lingga'),
(2072, 20, 'Kota Tanjung Pinang'),
(2002, 20, 'Kepulauan Riau'),
(3601, 36, 'Pandeglang'),
(3602, 36, 'Lebak'),
(3272, 32, 'Kota Sukabumi'),
(3202, 32, 'Sukabumi'),
(3205, 32, 'Garut'),
(3208, 32, 'Kuningan'),
(3274, 32, 'Kota Cirebon'),
(3209, 32, 'Cirebon'),
(3210, 32, 'Majalengka'),
(3211, 32, 'Sumedang'),
(3212, 32, 'Indramayu'),
(3213, 32, 'Subang'),
(3215, 32, 'Karawang'),
(3603, 36, 'Tangerang'),
(3271, 32, 'Kota Bogor'),
(3671, 36, 'Kota Tangerang'),
(3171, 31, 'Kota Jakarta Selatan'),
(3172, 31, 'Kota Jakarta Timur'),
(3173, 31, 'Kota Jakarta Pusat'),
(3174, 31, 'Kota Jakarta Barat'),
(3301, 33, 'Cilacap'),
(3302, 33, 'Banyumas'),
(3303, 33, 'Purbalingga'),
(3304, 33, 'Banjarnegara'),
(3305, 33, 'Kebumen'),
(3306, 33, 'Purworejo'),
(3310, 33, 'Klaten'),
(3311, 33, 'Sukoharjo'),
(3313, 33, 'Karanganyar'),
(3314, 33, 'Sragen'),
(3315, 33, 'Grobogan'),
(3316, 33, 'Blora'),
(3317, 33, 'Rembang'),
(3318, 33, 'Pati'),
(3320, 33, 'Jepara'),
(3319, 33, 'Kudus'),
(3321, 33, 'Demak'),
(3309, 33, 'Boyolali'),
(3322, 33, 'Semarang'),
(3323, 33, 'Temanggung'),
(3307, 33, 'Wonosobo'),
(3324, 33, 'Kendal'),
(3325, 33, 'Batang'),
(3326, 33, 'Pekalongan'),
(3327, 33, 'Pemalang'),
(3328, 33, 'Tegal'),
(3312, 33, 'Wonogiri'),
(3373, 33, 'Kota Salatiga'),
(3374, 33, 'Kota Semarang'),
(3375, 33, 'Kota Pekalongan'),
(3376, 33, 'Kota Tegal'),
(3372, 33, 'Kota Surakarta'),
(3401, 34, 'Kulon Progo'),
(3402, 34, 'Bantul'),
(3403, 34, 'Gunung Kidul'),
(3404, 34, 'Sleman'),
(3471, 34, 'Kota Yogyakarta'),
(3577, 35, 'Kota Madiun'),
(3571, 35, 'Kota Kediri'),
(3506, 35, 'Kediri'),
(3501, 35, 'Pacitan'),
(3502, 35, 'Ponorogo'),
(3503, 35, 'Trenggalek'),
(3504, 35, 'Tulungagung'),
(3505, 35, 'Blitar'),
(3572, 35, 'Kodya Blitar'),
(3573, 35, 'Kota Malang'),
(3508, 35, 'Lumajang'),
(3509, 35, 'Jember'),
(3510, 35, 'Banyuwangi'),
(3511, 35, 'Bondowoso'),
(3512, 35, 'Situbondo'),
(3513, 35, 'Probolinggo'),
(3529, 35, 'Sumenep'),
(3528, 35, 'Pamekasan'),
(3527, 35, 'Sampang'),
(3526, 35, 'Bangkalan'),
(3525, 35, 'Gresik'),
(3524, 35, 'Lamongan'),
(3523, 35, 'Tuban'),
(3522, 35, 'Bojonegoro'),
(3521, 35, 'Ngawi'),
(3520, 35, 'Magetan'),
(3519, 35, 'Madiun'),
(3518, 35, 'Nganjuk'),
(3517, 35, 'Jombang'),
(3515, 35, 'Sidoarjo'),
(3514, 35, 'Pasuruan'),
(3575, 35, 'Kodya Pasuruan'),
(3574, 35, 'Kodya Probolinggo'),
(3578, 35, 'Kota Surabaya'),
(5108, 51, 'Buleleng'),
(5101, 51, 'Jembrana'),
(5102, 51, 'Tabanan'),
(5103, 51, 'Badung'),
(5171, 51, 'Kota Denpasar'),
(5104, 51, 'Gianyar'),
(5105, 51, 'Klungkung'),
(5106, 51, 'Bangli'),
(5107, 51, 'Karang Asem'),
(5201, 52, 'Lombok Barat'),
(5271, 52, 'Kota Mataram'),
(5202, 52, 'Lombok Tengah'),
(5203, 52, 'Lombok Timur'),
(5205, 52, 'Dompu'),
(5304, 53, 'Timur Tengah Selatan'),
(5305, 53, 'Timur Tengah Utara'),
(5306, 53, 'Belu'),
(5307, 53, 'Alor'),
(5310, 53, 'Sikka'),
(5311, 53, 'Ende'),
(3329, 33, 'Brebes'),
(3672, 36, 'Kota Cilegon'),
(3604, 36, 'Serang'),
(3275, 32, 'Kota Bekasi'),
(3216, 32, 'Bekasi'),
(3273, 32, 'Kota Bandung'),
(3277, 32, 'Kota Cimahi'),
(3278, 32, 'Kota Tasikmalaya'),
(3279, 32, 'Kota Banjar'),
(3207, 32, 'Ciamis'),
(3206, 32, 'Tasikmalaya'),
(5207, 52, 'Sumbawa Barat'),
(5204, 52, 'Sumbawa'),
(5206, 52, 'Bima'),
(5272, 52, 'Kota Bima'),
(5309, 53, 'Flores Timur'),
(5308, 53, 'Lembata'),
(5303, 53, 'Kupang'),
(5314, 53, 'Rote Ndao'),
(5371, 53, 'Kota Kupang'),
(5315, 53, 'Manggarai Barat'),
(5313, 53, 'Manggarai'),
(3175, 31, 'Kota Jakarta Utara'),
(3101, 31, 'Kepulauan Seribu'),
(3214, 32, 'Purwakarta'),
(3203, 32, 'Cianjur'),
(3276, 32, 'Kota Depok'),
(3201, 32, 'Bogor'),
(3579, 35, 'Kota Batu'),
(3507, 35, 'Malang'),
(3516, 35, 'Mojokerto'),
(7173, 71, 'Kota Tomohon'),
(7102, 71, 'Minahasa'),
(7106, 71, 'Minahasa Utara'),
(7503, 75, 'Pohuwato'),
(6404, 64, 'Kutai Timur'),
(6403, 64, 'Kutai Kartanegara'),
(7317, 73, 'Luwu'),
(7318, 73, 'Tana Toraja'),
(7471, 74, 'Kota Kendari'),
(7472, 148, 'Kota Baubau'),
(9171, 91, 'Kota Sorong'),
(9107, 91, 'Sorong'),
(6474, 64, 'Kota Bontang'),
(1608, 16, 'Oku Selatan'),
(8201, 82, 'Halmahera Barat'),
(9415, 94, 'Asmat'),
(1410, 14, 'Bengkalis'),
(1109, 11, 'Pidie'),
(1118, 11, 'Pidie Jaya'),
(1102, 11, 'Aceh Singkil'),
(1175, 11, 'Kota Subulusssalam'),
(1208, 12, 'Asahan'),
(1219, 12, 'Batubara'),
(1304, 13, 'Sawahlunto Sijunjung'),
(1378, 13, 'Kota Sawahlunto'),
(1604, 16, 'Lahat'),
(1708, 17, 'Kepahiang'),
(1611, 16, 'Empat Lawang'),
(3204, 32, 'Bandung'),
(3217, 32, 'Bandung Barat'),
(3308, 33, 'Magelang'),
(3377, 33, 'Kota Magelang'),
(5312, 53, 'Ngada'),
(5316, 53, 'Negekeo'),
(5301, 53, 'Sumba Barat'),
(5317, 53, 'Sumba Barat Daya'),
(5302, 53, 'Sumba Timur'),
(5318, 53, 'Sumba Tengah'),
(6106, 61, 'Ketapang'),
(6111, 61, 'Kayong Utara'),
(6308, 63, 'Hulu Sei Utara'),
(6311, 63, 'Balangan'),
(7505, 75, 'Gorontalo Utara'),
(7408, 74, 'Buton Utara'),
(7401, 74, 'Buton'),
(7403, 74, 'Konawe'),
(7409, 74, 'Konawe Utara'),
(7204, 72, 'Poso'),
(7209, 72, 'Tojo Una-Una'),
(7502, 75, 'Gorontalo'),
(7107, 71, 'Bolaang Mongondow Ut'),
(7105, 71, 'Minahasa Selatan'),
(7108, 71, 'Minahasa Tenggara'),
(7101, 71, 'Bolaang Mongondow'),
(7174, 71, 'Kotamobagu'),
(7103, 71, 'Kepulauan Sangihe'),
(7109, 71, 'Kepulauan Sitaro'),
(7104, 71, 'Kepulauan Talaud'),
(8207, 82, 'Tidore'),
(8202, 82, 'Halmahera Tengah'),
(8272, 82, 'Kota Tidore');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `ko_id` int(11) NOT NULL,
  `ko_tgl` varchar(10) collate latin1_general_ci NOT NULL,
  `ko_jam` varchar(10) collate latin1_general_ci NOT NULL,
  `ko_no_rek` varchar(40) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`ko_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`ko_id`, `ko_tgl`, `ko_jam`, `ko_no_rek`) VALUES
(33, '2010-07-21', '12:00', '123456'),
(32, '1', '14', '123'),
(35, '20/07/2010', '16:00', '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `p_id` int(11) NOT NULL auto_increment,
  `p_tgl` datetime NOT NULL,
  `p_nama` varchar(100) collate latin1_general_ci NOT NULL,
  `p_no_id` varchar(100) collate latin1_general_ci NOT NULL,
  `j_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `p_asal` varchar(100) collate latin1_general_ci NOT NULL,
  `js_id` int(11) NOT NULL,
  `p_nem` decimal(3,2) NOT NULL,
  `p_alamat` text collate latin1_general_ci NOT NULL,
  `w_id` int(11) NOT NULL,
  `k_id` int(11) NOT NULL,
  `p_kodepos` varchar(6) collate latin1_general_ci NOT NULL,
  `p_tlp` varchar(30) collate latin1_general_ci NOT NULL,
  `p_email` varchar(30) collate latin1_general_ci NOT NULL,
  `ju_id` int(11) NOT NULL,
  `ju_id2` int(11) NOT NULL,
  `ju_fix` int(11) NOT NULL,
  `i_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL default '1',
  `s_id` int(11) NOT NULL default '1',
  `g_id` int(11) NOT NULL default '1',
  `b_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL default '1',
  PRIMARY KEY  (`p_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=55 ;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`p_id`, `p_tgl`, `p_nama`, `p_no_id`, `j_id`, `a_id`, `p_asal`, `js_id`, `p_nem`, `p_alamat`, `w_id`, `k_id`, `p_kodepos`, `p_tlp`, `p_email`, `ju_id`, `ju_id2`, `ju_fix`, `i_id`, `t_id`, `s_id`, `g_id`, `b_id`, `st_id`) VALUES
(35, '2010-07-04 14:49:01', 'Rini', '09898878789', 2, 1, 'SMA Negeri 1 Yogyakarta', 1, 8.00, 'Jl. Gambusan no 9', 1, 1204, '555555', '085343434643543', 'Rini_2a@gmail.com', 1, 3, 1, 2, 1, 1, 2, 9, 1),
(33, '2010-07-04 14:42:10', 'aryanto', '123456', 1, 1, 'SMK Negeri 6 Yogyakarta', 1, 7.55, 'Jl. Kaliurang no 45', 1, 1204, '555555', '089898099809809', 'defefsdsd@gfc.com', 2, 4, 4, 1, 1, 2, 1, 8, 2),
(34, '2010-07-04 14:45:12', 'anton', '98765432', 1, 2, 'SMA 2 Yogyakarta', 2, 7.09, 'Jl. Nusa Indah no 43', 1, 1204, '555555', '086756543434', 'anton@gmail.com', 2, 4, 4, 1, 1, 2, 1, 7, 2),
(47, '2010-07-12 04:08:38', 'aku', '123', 1, 1, 'sma', 1, 7.00, 'ssss', 1, 3404, '123', '321', 'kamu', 1, 3, 1, 1, 2, 1, 2, 7, 1),
(48, '2010-07-12 04:13:48', 'tes lagi', '322', 2, 1, 'depok', 2, 6.00, 'haha', 1, 3403, '4321', '123456', 'aaaaa', 2, 3, 2, 2, 2, 1, 3, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pmb_config`
--

CREATE TABLE `pmb_config` (
  `g_id` int(11) NOT NULL,
  `pm_tahun` varchar(10) collate latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `pmb_config`
--

INSERT INTO `pmb_config` (`g_id`, `pm_tahun`) VALUES
(3, '2010/2011');

-- --------------------------------------------------------

--
-- Table structure for table `propinsi`
--

CREATE TABLE `propinsi` (
  `pr_id` int(11) NOT NULL auto_increment,
  `pr_nama` varchar(20) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`pr_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=95 ;

--
-- Dumping data for table `propinsi`
--

INSERT INTO `propinsi` (`pr_id`, `pr_nama`) VALUES
(11, 'Nanggroe Aceh Daruss'),
(20, 'Kepulauan Riau'),
(12, 'Sumatera Utara'),
(36, 'Banten'),
(31, 'DKI Jakarta'),
(32, 'Jawa Barat'),
(33, 'Jawa Tengah'),
(34, 'DI. Yogyakarta'),
(35, 'Jawa Timur'),
(51, 'Bali'),
(52, 'Nusa Tenggara Barat'),
(53, 'Nusa Tenggara Timur'),
(61, 'Kalimantan Barat'),
(62, 'Kalimantan Tengah'),
(63, 'Kalimantan Selatan'),
(73, 'Sulawesi Selatan'),
(76, 'Sulawesi Barat'),
(74, 'Sulawesi Tenggara'),
(64, 'Kalimantan Timur'),
(72, 'Sulawesi Tengah'),
(75, 'Gorontalo'),
(71, 'Sulawesi Utara'),
(82, 'Maluku Utara'),
(81, 'Maluku'),
(91, 'Irian Jaya Barat'),
(14, 'Riau'),
(13, 'Sumatera Barat'),
(15, 'Jambi'),
(16, 'Sumatera Selatan'),
(19, 'Bangka Belitung'),
(18, 'Lampung'),
(94, 'Papua'),
(17, 'Bengkulu');

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `r_id` int(11) NOT NULL auto_increment,
  `r_nama` varchar(20) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`r_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`r_id`, `r_nama`) VALUES
(1, 'Belum Registrasi'),
(2, 'Sudah Registrasi');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `st_id` int(11) NOT NULL auto_increment,
  `st_nama` varchar(40) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`st_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`st_id`, `st_nama`) VALUES
(1, 'Tes Tertulis'),
(2, 'Lulus Tes Tertulis'),
(3, 'Tidak Lulus Tes Tertulis');

-- --------------------------------------------------------

--
-- Table structure for table `status_admin`
--

CREATE TABLE `status_admin` (
  `sa_id` int(11) NOT NULL auto_increment,
  `sa_nama` varchar(20) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`sa_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `status_admin`
--

INSERT INTO `status_admin` (`sa_id`, `sa_nama`) VALUES
(1, 'Super Admin'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `syarat`
--

CREATE TABLE `syarat` (
  `s_id` int(11) NOT NULL auto_increment,
  `s_nama` varchar(20) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`s_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `syarat`
--

INSERT INTO `syarat` (`s_id`, `s_nama`) VALUES
(1, 'Dalam Proses'),
(2, 'Lengkap'),
(3, 'Tidak Lengkap');

-- --------------------------------------------------------

--
-- Table structure for table `tempat`
--

CREATE TABLE `tempat` (
  `t_id` int(11) NOT NULL auto_increment,
  `t_nama` varchar(20) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`t_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tempat`
--

INSERT INTO `tempat` (`t_id`, `t_nama`) VALUES
(1, 'Via Online'),
(2, 'Via Offline');

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `w_id` int(11) NOT NULL auto_increment,
  `w_nama` varchar(20) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`w_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`w_id`, `w_nama`) VALUES
(1, 'WNI'),
(2, 'WNA');
