<?php
// Array definitions
  $tNG_login_config = array();
  $tNG_login_config_session = array();
  $tNG_login_config_redirect_success  = array();
  $tNG_login_config_redirect_failed  = array();
  $tNG_login_config_redirect_success = array();
  $tNG_login_config_redirect_failed = array();

// Start Variable definitions
  $tNG_debug_mode = "DEVELOPMENT";
  $tNG_debug_log_type = "";
  $tNG_debug_email_to = "you@yoursite.com";
  $tNG_debug_email_subject = "[BUG] The site went down";
  $tNG_debug_email_from = "webserver@yoursite.com";
  $tNG_email_host = "mail.thietkewebdep24h.com";
  $tNG_email_user = "testmail@thietkewebdep24h.com";
  $tNG_email_port = "25";
  $tNG_email_password = "testmail";
  $tNG_email_defaultFrom = "phuongnho.thanh@gmail.com";
  $tNG_login_config["connection"] = "conn_project";
  $tNG_login_config["table"] = "thanhvien";
  $tNG_login_config["pk_field"] = "MaThanhVien";
  $tNG_login_config["pk_type"] = "NUMERIC_TYPE";
  $tNG_login_config["email_field"] = "Email";
  $tNG_login_config["user_field"] = "Username";
  $tNG_login_config["password_field"] = "Pass";
  $tNG_login_config["level_field"] = "Level";
  $tNG_login_config["level_type"] = "NUMERIC_TYPE";
  $tNG_login_config["randomkey_field"] = "";
  $tNG_login_config["activation_field"] = "";
  $tNG_login_config["password_encrypt"] = "true";
  $tNG_login_config["autologin_expires"] = "30";
  $tNG_login_config["redirect_failed"] = "login_error.php";
  $tNG_login_config["redirect_success"] = "login_success.php";
  $tNG_login_config["login_page"] = "index.php";
  $tNG_login_config["max_tries"] = "3";
  $tNG_login_config["max_tries_field"] = "SoLanLogin";
  $tNG_login_config["max_tries_disableinterval"] = "10";
  $tNG_login_config["max_tries_disabledate_field"] = "DisableDateUser";
  $tNG_login_config["registration_date_field"] = "";
  $tNG_login_config["expiration_interval_field"] = "";
  $tNG_login_config["expiration_interval_default"] = "";
  $tNG_login_config["logger_pk"] = "";
  $tNG_login_config["logger_table"] = "";
  $tNG_login_config["logger_user_id"] = "";
  $tNG_login_config["logger_ip"] = "";
  $tNG_login_config["logger_datein"] = "";
  $tNG_login_config["logger_datelastactivity"] = "";
  $tNG_login_config["logger_session"] = "";
  $tNG_login_config_redirect_success["1"] = "index.php";
  $tNG_login_config_redirect_failed["1"] = "login_error.php";
  $tNG_login_config_redirect_success["2"] = "index.php";
  $tNG_login_config_redirect_failed["2"] = "login_error.php";
  $tNG_login_config_redirect_success["3"] = "index.php";
  $tNG_login_config_redirect_failed["3"] = "login_error.php";
  $tNG_login_config_session["kt_login_id"] = "MaThanhVien";
  $tNG_login_config_session["kt_login_user"] = "Username";
  $tNG_login_config_session["kt_login_level"] = "Level";
  $tNG_login_config_redirect_success["4"] = "index.php";
  $tNG_login_config_redirect_failed["4"] = "login_error.php";
// End Variable definitions
?>