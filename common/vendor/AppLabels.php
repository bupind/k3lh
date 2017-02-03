<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\vendor;

/**
 * Description of AppLabels
 *
 * @author Joko Hermanto
 */
class AppLabels {

    // BUTTONS
    const BTN_ADD = 'Tambah';
    const BTN_VIEW = 'Lihat';
    const BTN_UPDATE = 'Ubah';
    const BTN_DELETE = 'Hapus';
    const BTN_DELETE_ALL = 'Hapus Semua';
    const BTN_SAVE = 'Simpan';
    const BTN_CANCEL = 'Batal';
    const BTN_BACK = 'Kembali';
    const BTN_PROCESS = 'Proses';
    const BTN_PRINT = 'Cetak';
    const BTN_SEARCH = 'Cari';
    const BTN_RESET = 'Ulangi';
    const BTN_INSERT = 'Sisipkan';
    const PLEASE_SELECT = '- Silahkan Pilih -';
    
    // ALERT
    const ALERT_ARE_YOU_SURE = 'Apakah Anda yakin data sudah benar?';
    const ALERT_CONFIRM_DELETE = 'Apakah Anda yakin akan menghapus data ini?';
    const ALERT_CONFIRM_DELETE_ALL = 'Apakah Anda yakin akan menghapus semua data?';
    const ALERT_CONFIRM_DELETE_AUTH_ITEM = "Menghapus Item Otorisasi akan menyebabkan kehilangan hak akses bagi pengguna terkait.\nApakah Anda yakin?";
    const ALERT_CONFIRM_DELETE_IMG = 'Apakah Anda yakin akan menghapus gambar ini?';
    
    // COMMON
    const CODE = 'Kode';
    const NAME = 'Nama';
    const FULL_NAME = 'Nama Lengkap';
    const EMAIL = 'Email';
    const ADDRESS = 'Alamat';
    const CITY = 'Kota';
    const PROVINCE = 'Provinsi';
    const ZIP_CODE = 'Kode Pos';
    const HANDPHONE = 'No. Handphone';
    const REMARK = 'Remark';
    const PROFILE = 'Profil';
    const ACTIVE_STATUS = 'Status Aktif';
    const JOIN_DATE = 'Tanggal Bergabung';
    const DATE = 'Tanggal';
    const CREATED_BY = 'Dibuat Oleh';
    const CREATED_AT = 'Dibuat Pada';
    const USERNAME = 'Username';
    const PASSWORD = 'Password';
    const IP_ADDRESS = 'Ip Address';
    const DASHBOARD = 'Dashboard';
    const COMPANY = 'Perusahaan';
    const MASTER = 'Master';
    const SETTING = 'Pengaturan';
    const APPLICATION = 'Aplikasi';
    const USER_LOGIN = 'Login Pengguna';
    const ASSIGNMENT = 'Penugasan';
    const DETAIL = 'Rincian';
    const DESCRIPTION = 'Keterangan';
    const SEARCH_COLUMN = 'Kolom Pencarian';
    const RELATED = 'Terkait';
    const STATUS = 'Status';
    const WEEK = 'Minggu';
    const MONTH = 'Bulan';
    const MONTHLY = 'Bulanan';
    const YEAR = 'Tahun';
    const PERIOD = 'Periode';
    const PHONE = 'No. Telepon';
    const START_DATE = 'Tanggal Mulai';
    const END_DATE = 'Tanggal Akhir';
    const LOGIN = 'Login';
    const ITEM = 'Item';
    const VALUE = 'Nilai';
    const PARENT = 'Induk';
    const ORDER = 'Urutan';
    const LISTS = 'Daftar';
    const DAY = 'Hari';
    const START_FROM = 'Mulai dari';
    const UNTIL = 'Sampai dengan';
    const TITLE = 'Judul';
    const ALT = 'Alt';
    const LINK = 'Link';
    const TARGET = 'Target';
    const LOCATION = 'Lokasi';
    const PREVIEW = 'Pratinjau';
    const THUMBNAIL = 'Thumbnail';
    const SCHEDULE = 'Jadwal';
    const CONTENT = 'Isi';
    const URL = 'Url';
    const INTRO = 'Intro';
    const CAPTCHA = 'Captcha';
    const AMOUNT = 'Jumlah';
    const OFFLINE = 'Offline';
    const ONLINE = 'Online';
    const DATA_FORM = 'Data Form';
    const OTHER = 'Lain-lain';
    const SALARY = 'Gaji';
    const COMMISSIONS = 'Komisi';
    const FIND_DOCUMENTS = 'Cari Dokumen';
    const DOCUMENTS = 'Dokumen';
    const MAIN_OFFICE = 'Kantor Induk';
    const TYPE = 'Tipe';
    const FORM_TYPE = 'Jenis Form';
    const PROGRAM = 'Program';
    const WHEN = 'When';
    const WHERE = 'Where';
    const WHO = 'Who';
    const HOW_MANY = 'How Many';
    const HOW_MUCH = 'How Much';
    const ACTION = 'Tindakan';
    const ATTRIBUTE_TYPE = 'Jenis Attribute';
    const TEXT = 'Teks';
    const RNR = 'R / NR';
    const PIC = 'PIC';
    const LEGEND = 'Legenda';
    
    // MONTH
    const JANUARY = 'Januari';
    const FEBRUARY = 'Februari';
    const MARCH = 'Maret';
    const APRIL = 'April';
    const MAY = 'Mei';
    const JUNE = 'Juni';
    const JULY = 'Juli';
    const AUGUST = 'Agustus';
    const SEPTEMBER = 'September';
    const OCTOBER = 'Oktober';
    const NOVEMBER = 'November';
    const DECEMBER = 'Desember';
    
    //MONTH (IN SHORT)
    const SHORT_JANUARY = 'Jan';
    const SHORT_FEBRUARY = 'Feb';
    const SHORT_MARCH = 'Mar';
    const SHORT_APRIL = 'Apr';
    const SHORT_MAY = 'Mei';
    const SHORT_JUNE = 'Jun';
    const SHORT_JULY = 'Jul';
    const SHORT_AUGUST = 'Agu';
    const SHORT_SEPTEMBER = 'Sep';
    const SHORT_OCTOBER = 'Okt';
    const SHORT_NOVEMBER = 'Nov';
    const SHORT_DECEMBER = 'Des';
    
    // ATTACHMENT
    const ATTACHMENT = 'Attachment';
    const FILENAME = 'Nama File';
    const FILESIZE = 'Ukuran File';
    const FILETYPE = 'Jenis File';
    const IMAGE_FILE = 'File Gambar';
    const FILE = 'File';
    
    // AUTH
    const AUTH = 'Otorisasi';
    const AUTH_ITEM = 'Item Otorisasi';
    const AUTH_ASSIGNMENT = 'Penugasan Otorisasi';
    const AUTH_ITEM_CHILD = 'Kelompok Otorisasi';
    const AUTH_PARENT = 'Induk';
    const AUTH_CHILD = 'Anak';
    const ROLE = 'Hak Akses';
    
    // CODESET
    const CODESET = 'Codeset';
        
    // USER
    const USER = 'Pengguna';
    
    // EMPLOYEE
    const EMPLOYEE = 'Karyawan';
    
    // LOG DIRTY
    const LOG_DIRTY = 'Log Perubahan Data';
    const DATA_ID = 'ID';
    const CONTROLLER = 'Controller';
    const MODEL = 'Model';
    const LABEL = 'Label';
    const ORIGINAL_VALUE = 'Data Awal';
    const CHANGED_VALUE = 'Data Menjadi';
    
    // LOGIN HISTORY
    const LOGIN_HISTORY = 'History Login';
    
    // PRINT
    const PRINT_TO = 'Kepada Yth:';

    // MISC
    const APPLICATION_SETTING = 'Pengaturan Aplikasi';
    
    // REPORT
    const REPORT = 'Laporan';
    
    // PROFILE
    const APP_NAME = 'Nama Aplikasi';
    const MASTER_EMAIL = 'Email Master';
    const TITLE_TAG = 'Title Tag - 66 Char';
    const FOOTER_TEXT = 'Teks Footer';
    const META_DESC = 'Meta Description';
    const META_KEYWORD = 'Meta Keyword';
    
    // SECTOR
    const SECTOR = 'Sektor';
    
    // POWER PLANT
    const POWER_PLANT = 'Pembangkit Listrik';
    
    // ROAD MAP K3L
    const ROADMAP = 'Road Map';
    const ROADMAP_PROGRAM = 'Road Map Program';
    
    // WORKING PLAN
    const WORKING_PLAN = 'Rencana Kerja';
    const PROGRAM_PROGRESS = 'Tahapan Program';
    
    // BUDGET MONITORING
    const PRK_NUMBER = 'Nomor PRK';
    const PLAN_VALUE = 'Nilai Rencana';
    const REALIZATION_VALUE = 'Nilai Realisasi';
    const BUDGET_MONITORING = 'Monitor Anggaran';
    const PLAN = 'Rencana';
    const REALIZATION = 'Realisasi';
    const ACCUMULATION = "Akumulasi";
    const ACCUMULATION_MONTH = "Akumulasi Perbulan";
    
}
