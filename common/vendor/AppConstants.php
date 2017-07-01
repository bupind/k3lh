<?php

namespace common\vendor;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AppConstants
 *
 * @author Joko Hermanto
 */
class AppConstants {
    
    // USER ROLES
    const USER_ROLE_ADMINISTRATOR = 10;
    const USER_ROLE_SUPERVISOR = 20;
    const USER_ROLE_OPERATOR = 30;
    
    // SESSIONS
    const SES_WEB_PROFILE = 'S_WEB_PROFILE';
    const SES_WORKING_PLAN_DETAIL = 'S_WORKING_PLAN';
    
    // APP CONFIG
    const DELIMITER = '#|#';
    const CONCAT = '|!|';
    const LIMIT_PER_PAGE = 20;
    const INVOICE_FORMAT = '{module}/{date}/{number}';
    const APP_BACKEND_BASE_URL = '/k3lh/adminpanel'; // localhost
//    const APP_BACKEND_BASE_URL = '/adminpanel';
    const APP_FRONTEND_BASE_URL = '/k3lh'; // localhost
//    const APP_FRONTEND_BASE_URL = '/';
    const IMG_RESPONSIVE = 'img-responsive';
    
    // COMMON
    const DEFAULT_YEAR_RANGE = 5;
    
    // LAYOUT
    const GRID_TEMPLATE_DEFAULT = '<div class="hidden-sm hidden-xs btn-group">{view} {update} {delete}</div><div class="hidden-md hidden-lg"><div class="inline pos-rel"><button data-position="auto" data-toggle="dropdown" class="btn btn-minier btn-primary dropdown-toggle" aria-expanded="false"><i class="ace-icon fa fa-cog icon-only bigger-110"></i></button><ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close"><li>{view_xs}</li><li>{update_xs}</li><li>{delete_xs}</li></ul></div></div>';
    const GRID_TEMPLATE_VIEW_ONLY = '<div class="hidden-sm hidden-xs btn-group">{view}</div><div class="hidden-md hidden-lg"><div class="inline pos-rel"><button data-position="auto" data-toggle="dropdown" class="btn btn-minier btn-primary dropdown-toggle" aria-expanded="false"><i class="ace-icon fa fa-cog icon-only bigger-110"></i></button><ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close"><li>{view_xs}</li></ul></div></div>';
    const GRID_TEMPLATE_DELETE_ONLY = '<div class="hidden-sm hidden-xs btn-group">{delete}</div><div class="hidden-md hidden-lg"><div class="inline pos-rel"><button data-position="auto" data-toggle="dropdown" class="btn btn-minier btn-primary dropdown-toggle" aria-expanded="false"><i class="ace-icon fa fa-cog icon-only bigger-110"></i></button><ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close"><li>{delete_xs}</li></ul></div></div>';
    const GRID_TEMPLATE_DEFAULT_EXTRA = '<div class="hidden-sm hidden-xs btn-group">{view} {update} {delete} {additional_buttons}</div><div class="hidden-md hidden-lg"><div class="inline pos-rel"><button data-position="auto" data-toggle="dropdown" class="btn btn-minier btn-primary dropdown-toggle" aria-expanded="false"><i class="ace-icon fa fa-cog icon-only bigger-110"></i></button><ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close"><li>{view_xs}</li><li>{update_xs}</li><li>{delete_xs}</li>{additional_buttons_xs}</ul></div></div>';
    const GRID_TEMPLATE_CUSTOM = '<div class="hidden-sm hidden-xs btn-group">{custom_buttons}</div><div class="hidden-md hidden-lg"><div class="inline pos-rel"><button data-position="auto" data-toggle="dropdown" class="btn btn-minier btn-primary dropdown-toggle" aria-expanded="false"><i class="ace-icon fa fa-cog icon-only bigger-110"></i></button><ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">{custom_buttons_xs}</ul></div></div>';
    
    const ACTIVE_FORM_TEMPLATE_INPUT_PLAIN_NO_LABEL = '{input}{error}{hint}';
    const ACTIVE_FORM_TEMPLATE_INPUT_COL_4 = '{label} <div class="col-md-4">{input}</div><div class="col-md-5"><span class="help-inline col-xs-12 col-md-7"><span class="middle">{error}{hint}</span></span></div>';
    const ACTIVE_FORM_TEMPLATE_INPUT_COL_4_EXTRA = '{label} <div id="{wrapper_id}" class="col-md-4"><div class="input-group">{input}<span class="input-group-btn">{extra}</span></div></div><div class="col-md-5"><span class="help-inline col-xs-12 col-md-7"><span class="middle">{error}{hint}</span></span></div>';
    const ACTIVE_FORM_TEMPLATE_INPUT_COL_8_FULL_EXTRA = '{label} <div id="{wrapper_id}" class="col-md-8"><div class="input-group">{input}<span class="input-group-btn">{extra}</span></div><span class="help-inline col-xs-12"><span class="middle">{error}{hint}</span></span></div>';
    const ACTIVE_FORM_TEMPLATE_INPUT_COL_9 = '{label} <div class="col-md-9">{input}<span class="help-inline col-xs-12 col-md-7"><span class="middle">{error}{hint}</span></span></div>';
    const ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL = '{label} <div class="col-md-9">{input}<span class="help-inline col-xs-12"><span class="middle">{error}{hint}</span></span></div>';
    const ACTIVE_FORM_WIDGET_TEMPLATE = '{label}{input}<span class="help-block">{error}{hint}</span>';
    const ACTIVE_FORM_WIDGET_TEMPLATE_EXTRA = '{label} <div id="{wrapper_id}" class="input-group input-large"><div class="input-group">{input}<span class="input-group-btn">{extra}</span></div><span class="help-block">{error}{hint}</span></div>';
    const ACTIVE_FORM_WIDGET_TEMPLATE_INPUT_GROUP = '{label}<div class="input-group">{input}<span class="input-group-addon">{separator}</span>{input2}</div><span class="help-block">{error}{hint}</span>';
    const ACTIVE_FORM_CLASS_LABEL_COL_3 = 'col-md-3 control-label no-padding-right';
    const ACTIVE_FORM_CLASS_LABEL_COL_4 = 'col-sm-4 control-label no-padding-right';

    const ACTIVE_FORM_CLASS_INPUT_TEXT = 'col-xs-10 col-md-5';
    const ACTIVE_FORM_CLASS_INPUT_TEXT_UPPERCASE = 'col-xs-10 col-md-5 uppercase';
    const ACTIVE_FORM_CLASS_INPUT_TEXT_NUMBERSONLY = 'col-xs-10 col-md-5 numbersOnly text-right';
    const ACTIVE_FORM_CLASS_INPUT_TEXT_DATEPICKER = 'col-xs-10 col-md-5 date-picker';
    const ACTIVE_FORM_CLASS_TEXTAREA = 'col-xs-10 col-md-9';
    const ACTIVE_FORM_CLASS_DROPDOWN = 'col-xs-10 col-md-5 chosen-select form-control';
    const ACTIVE_FORM_CLASS_FILE_SINGLE = 'col-xs-10 col-md-5 file-input-single';
    const ACTIVE_FORM_CLASS_FILE_MULTIPLE = 'col-xs-10 col-md-5 file-input-multiple';
    const CLASS_FILE_SINGLE = 'file-input-single';
    const CLASS_FILE_MULTIPLE = 'file-input-multiple';
    
    const ACTIVE_FORM_MODAL_CLASS_INPUT_TEXT = 'col-xs-12';
    const ACTIVE_FORM_MODAL_CLASS_INPUT_TEXT_UPPERCASE = 'col-xs-12 uppercase';
    const ACTIVE_FORM_MODAL_CLASS_INPUT_TEXT_NUMBERSONLY = 'col-xs-12 numbersOnly';
    const ACTIVE_FORM_MODAL_CLASS_INPUT_TEXT_DATEPICKER = 'col-xs-12 date-picker';
    const ACTIVE_FORM_MODAL_CLASS_DROPDOWN = 'col-xs-12 chosen-select form-control';
    
    const VIEW_BUTTON_TEMPLATE = '{edit} {create} {delete} {index}';
    const VIEW_BUTTON_TEMPLATE_NO_ACTION = '{index}';
    const VIEW_BUTTON_TEMPLATE_CREATE_ONLY = '{create} {index}';
    const VIEW_BUTTON_TEMPLATE_PRINT = '{edit} {create} {printing} {delete} {index}';
    const VIEW_BUTTON_TEMPLATE_EXCEL = '{excel} {edit} {create} {delete} {index}';
    
    const TABLE_CLASS_DEFAULT = 'table table-bordered table-hover';
    const TABLE_CLASS_DEFAULT_SMALL = 'table table-bordered table-hover small';
    
    // THEME CONFIG
    const THEME_BASE_PATH = '@app/themes/AceMaster';
    const THEME_BASE_URL = '@web/themes/AceMaster';
    const THEME_BASE_WEB_PATH = '@app/web/themes/AceMaster';
    const THEME_VIEW_PATH = '@app/themes/AceMaster/views';
    const THEME_UPLOAD_DIR = '@app/web/themes/AceMaster/uploads/';
    const THEME_UPLOAD_IMG_DIR = '@app/web/themes/AceMaster/uploads/images/';
    const THEME_PRINT_CSS = '@app/web/themes/AceMaster/css/print.css';
    const THEME_IMG_PATH = '@web/themes/AceMaster/img/';
    const THEME_UPLOADED_IMG_PATH = '@web/themes/AceMaster/uploads/images/';
    const THEME_EXCEL_EXPORT_DIR = '@app/web/themes/AceMaster/excels/';
    const THEME_EXCEL_EXPORT_PATH = '@web/themes/AceMaster/excels/';
    
    const MYSQL_SEARCH_FROM_UNIXTIME = 'FROM_UNIXTIME({field}, "%Y-%m-%d")';
    
    // MODULE CODE
    const MODULE_CODE_WORKING_PLAN = 'WORKPLAN';
    const MODULE_CODE_MATURITY_LEVEL = 'MAT_LEV';
    const MODULE_CODE_ENVIRONMENT_PERMIT = 'ENV_PERM_DTL';
    const MODULE_CODE_ENVIRONMENT_PERMIT_DISTRICT = 'ENV_PERM_DSTRCT';
    const MODULE_CODE_ENVIRONMENT_PERMIT_PROVINCE = 'ENV_PERM_PRVNCE';
    const MODULE_CODE_ENVIRONMENT_PERMIT_MINISTRY = 'ENV_PERM_MNSTRY';

    const MODULE_CODE_PPA_TECH_PROVISION = 'PPA_TECH_PROV';
    const MODULE_CODE_PPA_POLLUTION_LOAD_DECREASE = 'PPA_POLL_LD';
    const MODULE_CODE_PPA_SETUP_PERMIT_CERT_NUMB = 'PPA_SETUP_CERT_NUM';

    const MODULE_CODE_PPU_EMISSION_SOURCE = 'PPU_EMS_SRC';
    const MODULE_CODE_PPU_EMISSION_LOAD_GRK = 'PPU_EMS_LD_GRK';
    const MODULE_CODE_PPU_TECHNICAL_PROVISION = 'PPU_TECH_PROV';
    const MODULE_CODE_PPU_LOAD_CALCULATION_GRK = 'PPU_LOAD_CALC_GRK';
    const MODULE_CODE_PPUA_MONITORING_POINT = 'PPUA_MONIT_POIN';
    const MODULE_CODE_PPUCEMS_REPORT_BM = 'PPUCEMS_RBM';
    const MODULE_CODE_PLB3_CHECKLIST = 'PLB3_CHECKLIST';
    const MODULE_CODE_SKKO_DOCUMENT = 'SKKO_DOCUMENT';
    const MODULE_CODE_EMERGENCY_RESPONSE = 'EMER_RESPONSE';
    const MODULE_CODE_SAFETY_CAMPAIGN = 'SAFETY_CAMP';
    
    const MODULE_CODE_PLB3_SA = 'PLB3_SA';
    const MODULE_CODE_PLB3_SA_STATIC = 'PLB3_SA_STATIC';
    const MODULE_CODE_PLB3_SA_STATIC_QUARTERLY = 'PLB3_SA_STATIC_Q';
    
    const MODULE_CODE_PROJECT_TRACKING = 'PROJECT_TRACKING';
    const MODULE_CODE_COMMON_UPLOAD = 'COMMON_UPLOAD';

    const MODULE_CODE_SLO_GENERATOR = 'SLO_GENERATOR';
    const MODULE_CODE_SLO_TOOLS = 'SLO_TOOLS';
    const MODULE_CODE_COMPETENCY_CERTIFICATION = 'COMPETENCY_CERTIFICATION';
    const MODULE_CODE_WORKING_PERMIT = 'WORKING_PERMIT';
    const MODULE_CODE_HOUSEKEEPING_IMPLEMENTATION = 'HOUSEKEEPING_IMPLEMENTATION';

    // ATTACHMENT TYPE
    const ATTACHMENT_TYPE_IMAGE = 'IMG';
    const ATTACHMENT_TYPE_FILE = 'FILE';
    
    // FORMAT
    const FORMAT_DATE = 'd-m-Y';
    const FORMAT_DB_DATE = 'Y-m-d';
    const FORMAT_DATE_DATEPICKER = 'dd-mm-yyyy';
    const FORMAT_DATE_PHP = 'php:d-m-Y';
    const FORMAT_DATE_PHP_SHOW_MONTH = 'php:d M Y';
    const FORMAT_DATETIME_PHP = 'php:d-m-Y H:i';
    const FORMAT_DB_DATE_PHP = 'php:Y-m-d';
    const FORMAT_DB_DATETIME_PHP = 'php:Y-m-d H:i:s';
    const FORMAT_TIME_PHP = 'php:H:i';
    const PATTERN_REGEX_NUMBER_ONLY = '/[^-0-9]/i';
    const PATTERN_REGEX_VALIDATION_NUMBER = '/^\s*[-+]?[0-9]*[.,]?[0-9]+([eE][-+]?[0-9]+)?\s*$/';
    
    // CALX DATA FORMAT
    const CALX_DATA_FORMAT_THO = '0,0';
    const CALX_DATA_FORMAT_DEC = '0[.]00';
    const CALX_DATA_FORMAT_THO_DEC = '0,0[.]00';
    const CALX_DATA_FORMAT_CURRENCY = '$0,0[.]00';
    const CALX_DATA_FORMAT_PLAIN = '0';
    const CALX_DATA_FORMAT_PLAIN_DEC = '0[.]00';
    
    // FORMAT TYPE
    const FORMAT_TYPE_YES_NO = 'YN';
    const FORMAT_TYPE_VARIABLE = 'VAR';
    const FORMAT_TYPE_PERCENTAGE = 'PCT';
    const FORMAT_TYPE_FILE = 'FILE';
    const FORMAT_TYPE_OPEN_CLOSE = 'OC';
    const FORMAT_TYPE_HIGH_LOW = 'HL';
    
    // LOGIN STATUS
    const LOGIN_STATUS_FAILED = 'LOGIN FAILED';
    const LOGIN_STATUS_SUCCESS = 'LOGIN SUCCESS';
    const LOGIN_STATUS_LOGOUT = 'LOGOUT';
    
    // FLASH MESSAGES
    const MSG_SAVE_SUCCESS = 'Data berhasil disimpan.';
    const MSG_UPDATE_SUCCESS = 'Data berhasil diubah.';
    const MSG_DELETE_SUCCESS = 'Data berhasil dihapus.';
    const MSG_IMPORT_SUCCESS = 'Data berhasil diimport.';
    const MSG_GENERATE_FILE_SUCCESS = 'File berhasil dibuat.';
    const MSG_DOWNLOAD_SUCCESS = 'File berhasil diunduh.';
    const MSG_EMPTY_PLEASE_ADD = 'Data kosong. Silahkan tambahkan data terlebih dahulu.';
    const MSG_DATA_NOT_FOUND = 'Data tidak ditemukan.';
    
    const ERR_AT_LEAST_ONE = '%s tidak ditemukan. Mohon ditambahkan paling sedikit <strong>1</strong>.';
    const ERR_USER_DELETE_FAILED = 'Dilarang menghapus diri sendiri ataupun pengguna lain dengan hak akses yang lebih tinggi.';
    const ERR_COUNT_AT_LEAST_ONE = 'Jumlah %s minimal 1.';
    const ERR_INTEGRITY_CONSTRAINT_VIOLATION = 'Database Integrity Constraint Violation.';
    const ERR_ACCOUNT_POSTED_DELETE = 'Dilarang menghapus transaksi posted.';
    const ERR_INCORRECT_AMOUNT = 'Jumlah tidak benar.';
    const ERR_PROCESS_FAILED = 'Proses gagal.';
    const ERR_PROCESS_FAILED_TRY_AGAIN_LATER = 'Proses gagal. Silahkan coba beberapa saat lagi.';
    const ERR_DOWNLOAD_FAILED = 'Unduh file gagal.';
    const ERR_UPLOAD_FAILED = "Unggah file gagal.<br />Pastikan semua file telah memenuhi syarat ketentuan unggah.";
    
    // WARNING
    const WARNING_LOAD_FAILED = 'WARNING: Load Multiple %s Failed.';
    
    // VALIDATION MESSAGES
    const VALIDATE_REQUIRED = '{attribute} harus diisi.';
    const VALIDATE_INTEGER = '{attribute} harus berupa angka.';
    const VALIDATE_UNIQUE = '{attribute} sudah pernah digunakan.';
    const VALIDATE_TOO_SHORT = '{attribute} minimal {min} karakter.';
    const VALIDATE_TOO_LONG = '{attribute} maksimal {max} karakter.';
    const VALIDATE_EMAIL = '{attribute} harus benar.';
    const VALIDATE_MIN_VALUE = '{attribute} minimal {compareValue}.';
    const VALIDATE_LARGER_THAN = '{attribute} harus lebih besar dari {compareValue}.';
    const VALIDATE_LARGER_OR_EQUAL = '{attribute} harus lebih besar atau sama dengan {compareValue}.';
    const VALIDATE_WRONG_EXTENSION = 'Jenis file yang diizinkan adalah {extensions}.';
    const VALIDATE_UPLOAD_REQUIRED = 'Silahkan pilih minimal 1 file.';
    const VALIDATE_TOO_MANY = 'Maksimal {limit} file dalam sekali upload.';
    const VALIDATE_TOO_BIG = 'Ukuran file {file} melebihi batas maksimal 1MB.';
    const VALIDATE_LOGIN_FAILED = 'Username atau Password salah.';
    const VALIDATE_NOT_ALLOWED_IP = 'IP Address tidak terdaftar.';
    const VALIDATE_DATE = 'Format {attribute} tidak benar.';
    const VALIDATE_OVER_PAYMENT = 'Kelebihan pembayaran.';
    const VALIDATE_NOT_ENOUGH_DEPOSIT = 'Saldo tidak mencukupi.';
    const VALIDATE_REQUIRED_WHEN = '{attribute} harus diisi jika {second_attribute} tidak kosong.';
    const VALIDATE_COMPARE_MUST_EQUAL = '{attribute} harus sama dengan {compareAttribute}.';
    const VALIDATE_COMPARE_MUST_NOT_EQUAL = '{attribute} tidak boleh sama dengan {compareAttribute}.';
    const VALIDATE_CAPTCHA = 'Kode verifikasi captcha salah.';
    const VALIDATE_NOT_EXISTS = '{attribute} tidak ditemukan.';
    
    // HINT MESSAGES
    const HINT_LEAVE_EMPTY = 'Kosongkan kolom ini jika tidak ada perubahan.';
    const HINT_ONE_PER_ROW = "Satu data per baris.";
    const HINT_UPLOAD_FILE = "Jenis file yang diizinkan adalah pdf, xlsx, xls, doc, docx.<br/>Ukuran file maksimal 1MB.";
    const HINT_UPLOAD_FILES = "Jenis file yang diizinkan adalah pdf, xlsx, xls, doc, docx.<br/>Maksimal 5 file dalam sekali upload.<br/>Ukuran file maksimal 1MB.";
    
    //INFO MESSAGES
    const INFO_PLEASE_INPUT_ACCOUNT_CREDENTIAL = 'Silahkan masukkan info akun';
    const INFO_DATA_FETCH = 'Data fetching, please wait..';
    
    // CONFIRM MESSAGES
    
    // CODESETS NAME
    const CODESET_NAME_WEB_CONFIG = 'WEB_CONFIG';
    const CODESET_NAME_POST_TYPE_CODE = 'POST_TYPE_CODE';
    const CODESET_NAME_FORM_TYPE_CODE = 'FORM_TYPE_CODE';
    const CODESET_NAME_ATTRIBUTE_TYPE_CODE = 'ATTRIBUTE_TYPE_CODE';
    const CODESET_WORKING_PLAN_LEGEND = 'WP_LEGEND';
    const CODESET_UNIT_CODE = 'UNIT_CODE';
    const CODESET_WASTE_WATER_TECHNOLOGY_CODE = 'WWATER_TECH_CODE';
    const CODESET_PPA_RBM_PARAM_CODE = 'PPA_RBM_PARAM_CODE';
    const CODESET_PPA_RBM_PARAM_UNIT_CODE = 'PPA_RBM_PARAM_UNIT_CODE';
    const CODESET_QS_UNIT_CODE = 'QS_UNIT_CODE';
    const CODESET_QS_LOAD_UNIT_CODE = 'QS_LOAD_UNIT_CODE';
    const CODESET_PPA_QUESTION_TYPE_CODE = 'PPA_QUESTION_TYPE_CODE';

    const CODESET_PPABA_MONITORING_FREQUENCY = 'PPABA_MONITORING_FREQUENCY';
    const CODESET_PPABA_MONITORING_STATUS_PERIOD = 'PPABA_MONITORING_STATUS_PERIOD';
    
    const CODESET_PLB3_SA_QUESTION_CATEGORY_CODE = 'PLB3_SA_QUESTION_CATEGORY';
    const CODESET_PLB3_SA_QUESTION_INPUT_TYPE_CODE = 'PLB3_SA_QUESTION_INPUT_TYPE';
    
    const CODESET_WORKING_PERMIT_JOB_CLASSIFICATION = 'WP_JOB_CLASSIFICATION';
    const CODESET_WORKING_PERMIT_K3_RULES = 'WP_K3_RULES';
    const CODESET_WORKING_PERMIT_SELF_PROTECTION = 'WP_SELF_PROTECTION';
    const CODESET_WORKING_PERMIT_DANGEROUS_WORK = 'WP_DANGEROUS_WORK';
    
    const CODESET_PROJECT_TRACKING_LIST = 'PROJECT_TRACKING_LIST';
    const CODESET_COMMON_UPLOAD_TYPE_CODE = 'UPLOAD_TYPE_CODE';
    
    const WP_JOB_CLASSIFICATION_OTHER = 'JCO';
    const WP_K3_RULES_OTHER = 'RO';
    const WP_SELF_PROTECTION_FIRE_TYPE = 'SP9';
    const WP_SELF_PROTECTION_OTHER = 'SPO';
    const WP_DANGEROUS_WORK_CRITICAL_AREA = 'DW1';
    const WP_DANGEROUS_WORK_OHTER = 'DWO';

    // PPA RBM PARAM
    const PPA_RBM_PARAM_PH = 'PH';

    //PPU CODESETS NAME
    const CODESET_PPU_ES_CHIMNEY_SHAPE_CODE = 'PPU_ES_CHIMNEY_SHAPE_CODE';
    const CODESET_PPU_ES_MONITORING_DATA_STATUS_CODE = 'PPU_ES_MONITORING_DATA_STATUS_CODE';
    const CODESET_PPU_ES_FREQ_MONITORING_OBLIGATION_CODE = 'PPU_ES_FREQ_MONITORING_OBLIGATION_CODE';
    const CODESET_PPU_ES_FUEL_NAME_CODE = 'PPU_ES_FUEL_NAME_CODE';
    const CODESET_PPU_ES_FUEL_UNIT_CODE = 'PPU_ES_FUEL_UNIT_CODE';
    const CODESET_PPU_AP_FREQ_MONITORING_OBLIGATION_CODE = 'PPU_AP_FREQ_MONITORING_OBLIGATION_CODE';
    const CODESET_PPU_RBM_PARAM_CODE = 'PPU_RBM_PARAM_CODE';
    const CODESET_PPU_RBM_PARAM_UNIT_CODE = 'PPU_RBM_PARAM_UNIT_CODE';
    const CODESET_PPU_RBM_QS_UNIT_CODE = 'PPU_RBM_QS_UNIT_CODE';
    const CODESET_PPU_RBM_QS_LOAD_UNIT_CODE = 'PPU_RBM_QS_LOAD_UNIT_CODE';
    const CODESET_PPU_QUESTION_TYPE_CODE = 'PPU_QUESTION_TYPE_CODE';
    //PPU AMBIENT CODESETS NAME
    const CODESET_PPUA_MP_MONITORING_DATA_STATUS_CODE = 'PPUA_MP_MONITORING_DATA_STATUS_CODE';
    const CODESET_PPUA_MP_FREQ_MONITORING_OBLIGATION_CODE = 'PPUA_MP_FREQ_MONITORING_OBLIGATION_CODE';
    const CODESET_PPUA_RBM_PARAM_CODE = 'PPUA_RBM_PARAM_CODE';
    const CODESET_PPUA_RBM_QS_UNIT_CODE = 'PPUA_RBM_QS_UNIT_CODE';
    const CODESET_PPUA_RBM_QS_LOAD_UNIT_CODE = 'PPUA_RBM_QS_LOAD_UNIT_CODE';
    //PPU CEMS CODESETS NAME
    const CODESET_PPUCEMS_RBM_PARAM_CODE = 'PPUCEMS_RBM_PARAM_CODE';
    const CODESET_PPUCEMS_RBM_PARAM_REPORT_QS_UNIT_CODE = 'PPUCEMS_RBM_PARAM_REPORT_QS_UNIT_CODE';

    //PPU RBM PARAM CODE
    const PPU_RBM_PARAM_CODE_LAJUALIR = 'LAJUALIR';
    //PPU ES MONITORING OBLIGATION CODE
    const PPU_ES_MONITORING_OBLIGATION_CODE_WATCHED = 'WATCHED';

    //PLB3_BALANCE_SHEET CODESETS NAME
    const CODESET_PLB3_BS_WASTE_TYPE_CODE = 'PLB3_BS_WASTE_TYPE_CODE';
    const CODESET_PLB3_BS_WASTE_UNIT_CODE = 'PLB3_BS_WASTE_UNIT_CODE';
    const CODESET_PLB3_BS_TREATMENT_TYPE_CODE = 'PLB3_BS_TREATMENT_TYPE_CODE';

    //PLB3_QUESTION
    const CODESET_PLB3_QUESTION_TYPE_CODE_PCFTC1 = 'PLB3_QUESTION_TYPE_CODE_PCFTC1';
    const CODESET_PLB3_QUESTION_TYPE_CODE_PCFTC2 = 'PLB3_QUESTION_TYPE_CODE_PCFTC2';
    const CODESET_PLB3_QUESTION_TYPE_CODE_PCFTC3 = 'PLB3_QUESTION_TYPE_CODE_PCFTC3';

    //PLB3 CHECKLIST
    const CODESET_PLB3_CHECKLIST_FORM_TYPE_CODE = 'PLB3_CHECKLIST_FORM_TYPE_CODE';

    const PPA_RBM_PARAM_DEBIT = 'DBT';
    const PPA_RBM_PARAM_PRODUCTION = 'PRD';

    //BEYOND OBEDIENCE
    const CODESET_NAME_BO_FORM_TYPE_CODE = 'BO_FORM_TYPE_CODE';
    const CODESET_BOP_UNIT_CODE = 'BOP_UNIT_CODE';

    //SLO GENERATOR
    const CODESET_SLOG_GEN_UNIT_CODE = 'SLOG_GEN_UNIT_CODE';
    const CODESET_FORM_MONTH_TYPE_CODE = 'FORM_MONTH_TYPE_CODE';
    const CODESET_SLOG_MACHINE_BRAND = 'SLOG_MACHINE_BRAND';
    const CODESET_SLOG_GENERATOR_BRAND = 'SLOG_GEN_BRAND';
    const CODESET_SLOG_BOILER_BRAND = 'SLOG_BOILER_BRAND';


    //SLO TOOLS
    const CODESET_SLOT_GEN_STATUS_CODE = 'SLOT_GEN_CODE';
    const CODESET_SLOT_CATEGORY_CODE = 'SLOT_CAT_CODE';
    const CODESET_SLOT_NEXT_CHECK_CODE = 'SLOT_NC_CODE';

    //MONITORING APAR
    const CODESET_M_APAR_FIRE_CLASS = 'M_APAR_FC';
    const CODESET_M_APAR_CONDITION = 'M_APAR_COND';
    const CODESET_M_APAR_TECH_PROVI = 'M_APAR_T_P';

    //FIRE DETECTOR
    const CODESET_FD_DETECT_TYPE = 'FD_DETECT_TYPE';
    const CODESET_FD_ALARM_ZONE = 'FD_ALARM_ZONE';
    const CODESET_FD_FLOOR_TYPE = 'FD_FLOOR_TYPE';
    const CODESET_FD_DETECTOR_PHYSIC = 'FD_DET_PHY';
    const CODESET_FD_INSTALLATION = 'FD_INSTALLATION';
    const CODESET_WIRING_CONDITION = 'FD_WIRING_COND';
    const CODESET_LAST_CHECK = 'FD_LAST_CHECK';
    const CODESET_FDD_TEST_RESULT = 'FDD_TEST_RESULT';

    //WORKING ENV DATA
    const CODESET_WEDD_UNIT_CODE = 'WEDD_UNIT_CODE';

    //K3l PROBLEM
    const CODESET_KP_STATUS_CODE = 'KP_STATUS_CODE';
    
    // COMMON UPLOAD TYPE CODE
    const CODESET_COMMON_UPLOAD_TYPE_CODE_HIRADC = 'HIRADC';
    const CODESET_COMMON_UPLOAD_TYPE_CODE_ENVIRONMENT_POLICY= 'ENV_POLICY';
    const CODESET_COMMON_UPLOAD_TYPE_CODE_K3_POLICY= 'K3_POLICY';
    const CODESET_COMMON_UPLOAD_TYPE_CODE_IADL= 'IADL';
    const CODESET_COMMON_UPLOAD_TYPE_CODE_JSA= 'JSA';
    const CODESET_COMMON_UPLOAD_TYPE_CODE_WORK_SOP= 'WORK_SOP';
    const CODESET_COMMON_UPLOAD_TYPE_CODE_COMPETENCY_CERTIFICATE= 'COM_CERT';
    const CODESET_COMMON_UPLOAD_TYPE_CODE_COMPETENCY_SUPERVISOR= 'COM_SUPER';
    const CODESET_COMMON_UPLOAD_TYPE_CODE_APD= 'APD';
    const CODESET_COMMON_UPLOAD_TYPE_CODE_LOTO= 'LOTO';
    const CODESET_COMMON_UPLOAD_TYPE_CODE_APAT= 'APAT';
    const CODESET_COMMON_UPLOAD_TYPE_CODE_EMERGENCY_TEAM= 'EMER_TEAM';
    const CODESET_COMMON_UPLOAD_TYPE_CODE_FIRE_OFFICER_CERTIFICATE= 'F_OFF_CERT';
    const CODESET_COMMON_UPLOAD_TYPE_CODE_P3K= 'P3K';
    const CODESET_COMMON_UPLOAD_TYPE_CODE_CLINIC= 'CLINIC';
    const CODESET_COMMON_UPLOAD_TYPE_CODE_COMPANY_DOCTOR= 'COMP_DOC';
    const CODESET_COMMON_UPLOAD_TYPE_CODE_AMBULANCE= 'AMBULANCE';
    const CODESET_COMMON_UPLOAD_TYPE_CODE_P3K_OFFICER_CERTIFICATE= 'P3K_OFF_CERT';
    const CODESET_COMMON_UPLOAD_TYPE_CODE_K3_SIGN= 'K3_SIGN';
    const CODESET_COMMON_UPLOAD_TYPE_CODE_INFORMATION_BOARD= 'INF_BOARD';

    // PLB3 SELF ASSESSMENT
    const PLB3_SA_QUESTION_CATEGORY_GENERAL = 'GNRL';
    const PLB3_SA_QUESTION_CATEGORY_HAZARD = 'HZRD';

    // FIRE DETECTOR TEST RESULT TYPE
    const FD_TEST_RESULT_TYPE_NORMAL = 'FTR3';
    const FD_TEST_RESULT_TYPE_ABNORMAL = 'FTR4';
    const FD_TEST_RESULT_TYPE_UNKNOWN = 'FTR2';
    const FD_TEST_RESULT_TYPE_NOT_CHECKED = 'FTR1';
    const FD_DETECTOR_TYPE_UNKNOWN = 'FDT3';
    const FD_ALARM_ZONE_UNKNOWN = 'FAZ1';

    // WEB CONFIG
    const WEB_CONFIG_SALE_EXTERNAL_SALES = 'SALE_EXT_SALES';
    const WEB_CONFIG_ALLOWED_IP = 'ALLOWED_IP';
    
    // POST TYPE
    const POST_TYPE_PAGE = 'PAGE';
    const POST_TYPE_NEWS = 'NEWS';
    
    // FORM TYPE
    const FORM_TYPE_K3 = 'K3';
    const FORM_TYPE_LH = 'LH';

    const FORM_TYPE_AD = 'AD';
    const FORM_TYPE_GD = 'GD';

    const FORM_TYPE_TPS = 'PCFTC1';
    const FORM_TYPE_LF = 'PCFTC2';
    const FORM_TYPE_PK = 'PCFTC3';

    const FORM_TYPE_DRKPL = 'DRKPL';
    const FORM_TYPE_EE = 'EE';
    const FORM_TYPE_PPLB3 = 'PPLB3';
    const FORM_TYPE_PGPU = 'PGPU';
    const FORM_TYPE_KA = 'KA';
    const FORM_TYPE_SML = 'SML';
    const FORM_TYPE_PPLNB3 = 'PPLNB3';
    const FORM_TYPE_KH = 'KH';
    const FORM_TYPE_CD = 'CD';
    const FORM_TYPE_PBP = 'PBP';

    // QS LOAD UNIT CODE
    const QS_LOAD_UNIT_CODE_GRAM_PER_M3 = 'GR_P_M3';
    const QS_LOAD_UNIT_CODE_TON_PER_MONTH = 'TON_P_M';

    // ATTRIBUTE TYPE
    const ATTRIBUTE_TYPE_TARGET = 'TGT';
    const ATTRIBUTE_TYPE_PROGRAM_HEADER = 'PHDR';
    const ATTRIBUTE_TYPE_PROGRAM_SUB_HEADER = 'PSHDR';
    const ATTRIBUTE_TYPE_PROGRAM_ITEM = 'PITEM';
    
    // LOG
    const LOG_SUCCESS = 'SUCCESS';
    const LOG_ERROR = 'ERROR';
    const LOG_MSG_ACTION_INSERT = 'INSERTING NEW DATA WITH ID #%s';
    const LOG_MSG_ACTION_UPDATE = 'UPDATING DATA ID #%s';
    const LOG_MSG_ACTION_DELETE = 'DELETING DATA ID #%s';
    
    const STATUS_YES = 'Y';
    const STATUS_NO = 'N';
    
    const ACTION_VIEW = 'view';
    
    const META_DESCRIPTION = 'meta_desc';
    const META_KEYWORD = 'meta_kw';
    
    const EMAIL_SUBJECT_NEW_MEMBER_CONFIRMATION = 'Selamat Datang di %s';
    const EMAIL_SUBJECT_NEW_MEMBER = 'Member Baru Terdaftar';
    const EMAIL_SUBJECT_DEPOSIT = 'Request Deposit';
    const EMAIL_SUBJECT_WITHDRAWAL = 'Request Penarikan';
    const EMAIL_SUBJECT_TRANSFER_GAME = 'Request Transfer Game';

    //SECTOR_CONSTANT
    const SECTOR_CONSTANT_PARENT_OFFICE = 'KTR_IDK';
    
    // REPORT
    const REPORT_NAME_ROADMAP = 'report_roadmap_%s.xlsx';
    const REPORT_NAME_BUDGET_MONITORING = 'report_monitoring_anggaran_%s.xlsx';
    const REPORT_NAME_IMPORTANT_PN = 'report_nomor_telepon_penting_%s.xlsx';
    const REPORT_NAME_SLO_GENERATOR = 'report_monitoring_slo_pembangkit_%s.xlsx';
    const REPORT_NAME_SLO_TOOLS = 'report_monitoring_slo_peralatan_%s.xlsx';
    const REPORT_NAME_CC = 'report_sertifikasi_kompetensi_%s.xlsx';
    const REPORT_NAME_MONITORING_APAR = 'report_monitoring_apar_%s.xlsx';
    const REPORT_NAME_EMERGENCY_RESPONSE = 'report_simulasi_tanggap_darurat_%s.xlsx';
    const REPORT_NAME_SAFETY_CAMPAIGN = 'report_safety_campaign_%s.xlsx';
    const REPORT_NAME_K3L_PROBLEM = 'report_permasalahan_k3l_%s.xlsx';
    const REPORT_NAME_WORK_ENV_DATA = 'report_monitoring_data_lingkungan_kerja_%s.xlsx';
    const REPORT_NAME_HYDRANT_CHECKLIST = 'report_checklist_hydrant_%s.xlsx';
    const REPORT_NAME_PROJECT_TRACKING = 'report_project_tracking_%s.xlsx';
    const REPORT_NAME_FIRE_DETECTOR = 'report_fire_detector_%s.xlsx';


    // PHPEXCEL
    const PHPEXCEL_FORMAT_CURRENCY = 'Rp #,##0.00';
    
    // HTML
    const HTML_ORDERED_LIST = 'ol';
    const HTML_UNORDERED_LIST = 'ul';
    
    public static $yesNoList = [
        'Y' => 'Ya',
        'N' => 'Tidak',
    ];
    
    public static $daysList = [
        'Minggu',
        'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu'
    ];
    
    public static $monthsList = [
        '1' => AppLabels::JANUARY,
        '2' => AppLabels::FEBRUARY,
        '3' => AppLabels::MARCH,
        '4' => AppLabels::APRIL,
        '5' => AppLabels::MAY,
        '6' => AppLabels::JUNE,
        '7' => AppLabels::JULY,
        '8' => AppLabels::AUGUST,
        '9' => AppLabels::SEPTEMBER,
        '10' => AppLabels::OCTOBER,
        '11' => AppLabels::NOVEMBER,
        '12' => AppLabels::DECEMBER
    ];
    
    public static $linkTargetList = [
        '_blank' => '_blank',
        '_self' => '_self',
    ];
    
    public static $rateList = [
        1 => 1,
        2 => 2,
        3 => 3,
        4 => 4,
        5 => 5,
    ];
    
    public static $rnrList = [
        'R' => 'R',
        'NR' => 'NR'
    ];
    
    public static $lowHighList = [
        'L' => 'Rendah',
        'H' => 'Tinggi'
    ];
    
    public static $openCloseList = [
        'O' => 'Open',
        'C' => 'Close'
    ];
    
}
