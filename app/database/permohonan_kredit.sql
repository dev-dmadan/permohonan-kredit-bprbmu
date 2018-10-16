-- Database Permohonan Kredit
-- Name: permohonan-kredit 
-- Engine: MariaDB / MySQL
-- Versi 1.0

-- =============== Table =============== --

-- Table User
CREATE TABLE IF NOT EXISTS user(
    username varchar(255) NOT NULL UNIQUE, -- pk
    password text,

    CONSTRAINT pk_user_username PRIMARY KEY(username)
)ENGINE=MyISAM;

-- Table increment id form permohonan kredit
CREATE TABLE IF NOT EXISTS id_fpk(
    id int NOT NULL AUTO_INCREMENT,
    id_fpk varchar(255) UNIQUE NOT NULL,

    CONSTRAINT pk_id_fpk_id PRIMARY KEY(id)
)ENGINE=MyISAM;

-- Table permohonan kredit
CREATE TABLE IF NOT EXISTS permohonan_kredit(
    id varchar(255) UNIQUE NOT NULL, -- pk
    tgl date NOT NULL,

    -- data pinjaman
    status_nasabah enum('Baru', 'Lama'), -- B: Baru, L: lama
    limit_kredit double(12,2),
    jangka_waktu int,
    tujuan enum('Modal Kerja', 'Investasi', 'Konsumtif'),
    jelaskan varchar(255),

    -- data permohonan
    nama varchar(255),
    nama_panggilan varchar(255),
    tmpt_lahir varchar(255),
    tgl_lahir date,
    jk enum('Pria', 'Wanita'),
    no_ktp varchar(25),
    berlaku date,
    seumur_hidup char(1), -- 1: true/ceklis, 0: false/tidak ceklis
    status_kawin enum('Belum Kawin', 'Kawin', 'Duda/Janda'), -- 
    jumlah_anak int,
    pendidikan_formal enum('SD', 'SLTP', 'SLTA', 'Diploma', 'S1', 'S2', 'S3'), 
    nama_ibu varchar(255),
    alamat text,
    status_rumah enum('Milik Sendiri', 'Keluarga', 'Dinas', 'Sewa'), 
    sewa_rumah date,
    no_telp varchar(50),

    nama_suami_istri varchar(255),
    tmpt_lahir_suami_istri varchar(255),
    tgl_lahir_suami_istri date,
    pekerjaan_suami_istri varchar(255),

    pilih_pekerjaan enum('Karyawan', 'Usaha'),

    -- data pekerjaan
    pekerjaan enum('PNS', 'Pegawai Swasta', 'Profesional', 'Pensiunan', 'TNI/POLRI'),
    bidang_usaha_pekerjaan varchar(255),
    lama_bekerja int,
    nama_perusahaan varchar(255),
    jabatan varchar(255),
    alamat_perusahaan text,
    no_telp_perusahaan varchar(50),
    penghasilan_bersih_pekerjaan double(12,2),
    rata2_biaya_hidup double(12,2),

    bentuk_usaha enum('Perorangan', 'Badan Usaha'),
    prosentase_kepemilikan decimal(4,2),
    usaha_sejak year,
    bidang_usaha varchar(255),
    jumlah_karyawan int,
    alamat_usaha text, 
    no_telp_usaha varchar(50),
    penghasilan_bersih double(12,2),

    -- data agunan
    jenis enum('Mobil', 'Motor', 'Rumah', 'Tanah', 'Deposito', 'Jamsostek'),
    tipe_kendaraan varchar(255),
    warna varchar(255),
    tahun year(4),
    no_bpkb varchar(255),
    atas_nama enum('Sendiri', 'Keluarga', 'Orang Lain'),
    status_agunan enum('SHM', 'SHGB'),
    imb enum('Ada', 'Tidak Ada'),
    ada varchar(255),
    alamat_agunan text,

    -- data keluarga
    nama_keluarga varchar(255),
    alamat_keluarga text,
    no_telp_keluarga varchar(50),
    hubungan_keluarga varchar(255),

    -- data upload
    file_ktp_pemohon text,
    file_ktp_suami_istri text,
    file_kk text,
    file_slip_gaji text,
    file_stnk text,
    file_nota_pajak text,
    file_bpkp text,
    file_faktur text,
    file_kwintasi_jual_beli text,

    CONSTRAINT pk_permohonan_kredit_id PRIMARY KEY(id)
)ENGINE=MyISAM;