<?php
/*
 * Plugin Name: Цирк Шапито
 * Description: Плагин продажи билетов для цирка Шапито
 * Author URI:  t.me/sw710x
 * Author:      Andrey Sundeev
 * Version:     1.0
 * Text Domain: circus_shapito */

// Проверка
 if(!defined('ABSPATH')) {
    die('Жулик, не воруй! =)');
 }

// Вывод в меню
 add_action('admin_menu', 'circus_shapito_show_nav_item');
 function circus_shapito_show_nav_item () {
    add_menu_page(
        'Инструкция',
        'ЦИРК ШАПИТО',
        'manage_options',
        'circus_shapito_admin',
        'circus_shapito_show_content',
        'dashicons-tickets',
        2
    );
    add_submenu_page(
      'circus_shapito_admin', 
      'Добавить', 
      'Добавить запись', 
      'manage_options',
      'circus_shapito_admin_add_new_record',
      'circus_shapito_admin_add_new_record',
   );
   add_submenu_page(
      'circus_shapito_admin', 
      'Все записи', 
      'Все записи', 
      'manage_options',
      'circus_shapito_admin_show_all_record',
      'circus_shapito_admin_show_all_record',
   );
   add_submenu_page(
      'circus_shapito_admin', 
      'Купленные места', 
      'Купленные места', 
      'manage_options',
      'circus_shapito_admin_show_all_bought',
      'circus_shapito_admin_show_all_bought',
   );
 }
// Тело главной админки
 function circus_shapito_show_content () {
    include('admin/circus_shapito_admin.php');
 }
// Тело добавления записи
 function circus_shapito_admin_add_new_record () {
   include('admin/pages/circus_shapito_admin_add_new_record.php');
 }
// Тело показа записей
 function circus_shapito_admin_show_all_record () {
   include('admin/pages/circus_shapito_admin_show_all_record.php');
 }
// Тело показа купленных мест
 function circus_shapito_admin_show_all_bought () {
   include('admin/pages/circus_shapito_admin_show_all_bought.php');
 }
 

// Регистрация скриптов и стилей
 add_action('admin_enqueue_scripts', 'circus_shapito_register_assets');
 function circus_shapito_register_assets () {
    wp_register_style('circus_shapito_styles', plugins_url('admin/assets/styles/admin.css', __FILE__));
    wp_register_script('circus_shapito_scripts', plugins_url('admin/assets/scripts/admin.js', __FILE__));
    wp_register_script('circus_shapito_scripts_search', plugins_url('admin/assets/scripts/search.js', __FILE__));
 }
 

// Подключение скриптов и стилей
 add_action('admin_enqueue_scripts', 'circus_shapito_load_assets');
 function circus_shapito_load_assets ($hook) {
    if($hook != 'toplevel_page_circus_shapito_admin' && 
       $hook != '%d1%86%d0%b8%d1%80%d0%ba-%d1%88%d0%b0%d0%bf%d0%b8%d1%82%d0%be_page_circus_shapito_admin_add_new_record' &&
       $hook != '%d1%86%d0%b8%d1%80%d0%ba-%d1%88%d0%b0%d0%bf%d0%b8%d1%82%d0%be_page_circus_shapito_admin_show_all_record'&&
       $hook != '%d1%86%d0%b8%d1%80%d0%ba-%d1%88%d0%b0%d0%bf%d0%b8%d1%82%d0%be_page_circus_shapito_admin_show_all_bought') {
          return;
    } else if ($hook == '%d1%86%d0%b8%d1%80%d0%ba-%d1%88%d0%b0%d0%bf%d0%b8%d1%82%d0%be_page_circus_shapito_admin_add_new_record') {
      wp_enqueue_script('circus_shapito_scripts');
    } else if ($hook == '%d1%86%d0%b8%d1%80%d0%ba-%d1%88%d0%b0%d0%bf%d0%b8%d1%82%d0%be_page_circus_shapito_admin_show_all_bought') {
      wp_enqueue_script('circus_shapito_scripts_search');
    }
    wp_enqueue_style('circus_shapito_styles');

 }


 add_action('admin_enqueue_scripts', 'circus_shapito_register_assets2');
 function circus_shapito_register_assets2 () {
    wp_register_style('circus_shapito_styles2', plugins_url('admin/pages/dome/dome.css', __FILE__));
    wp_register_script('circus_shapito_scripts2', plugins_url('admin/pages/dome/js/draggabilly.pkgd.min.js', __FILE__));
    wp_register_script('circus_shapito_scripts3', plugins_url('admin/pages/dome/js/magnifier.js', __FILE__));
    wp_register_script('circus_shapito_scripts4', plugins_url('admin/pages/dome/js/checkPlace.js', __FILE__));
 }

 add_action('admin_enqueue_scripts', 'circus_shapito_load_assets2');
 function circus_shapito_load_assets2 ($hook) {
    if($hook != 'toplevel_page_circus_shapito_admin' && 
       $hook != '%d1%86%d0%b8%d1%80%d0%ba-%d1%88%d0%b0%d0%bf%d0%b8%d1%82%d0%be_page_circus_shapito_admin_add_new_record' &&
       $hook != '%d1%86%d0%b8%d1%80%d0%ba-%d1%88%d0%b0%d0%bf%d0%b8%d1%82%d0%be_page_circus_shapito_admin_show_all_record'&&
       $hook != '%d1%86%d0%b8%d1%80%d0%ba-%d1%88%d0%b0%d0%bf%d0%b8%d1%82%d0%be_page_circus_shapito_admin_show_all_bought') {
          return;
      } else if($hook == '%d1%86%d0%b8%d1%80%d0%ba-%d1%88%d0%b0%d0%bf%d0%b8%d1%82%d0%be_page_circus_shapito_admin_show_all_record') {
         wp_enqueue_style('circus_shapito_styles2');
         wp_enqueue_script('circus_shapito_scripts2');
         wp_enqueue_script('circus_shapito_scripts3');
         wp_enqueue_script('circus_shapito_scripts4');
      }

    
 }



// создание таблиц в бд при активации плагина
 register_activation_hook(__FILE__, 'create_table');
 function create_table() {
   global $wpdb;

   require_once ABSPATH . 'wp-admin/includes/upgrade.php';
   
   $charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset} COLLATE {$wpdb->collate}";
   $table_prefix = $wpdb->get_blog_prefix();

   function circus_shapito_name_event($charset_collate, $table_prefix) {
      $full_table_name = $table_prefix . 'circus_shapito_name_event';
      $sql = "CREATE TABLE {$full_table_name} (
         id int(4) NOT NULL auto_increment,
         name_event varchar(200) NOT NULL,
         status_event bool NOT NULL default false,
         PRIMARY KEY(id)
      )
      {$charset_collate};";
      dbDelta($sql);
   }
   circus_shapito_name_event($charset_collate, $table_prefix);

 // circus_shapito_event 
   function circus_shapito_event($charset_collate, $table_prefix) {
      $table_name = $table_prefix . 'circus_shapito_event';
      $circus_shapito_name_event = $table_prefix . 'circus_shapito_name_event';
      $sql = "CREATE TABLE {$table_name} (
         id int(4) NOT NULL auto_increment,
         id_name_event int(4) NOT NULL,
         location varchar(200) NOT NULL,
         date date NOT NULL,
         time_start time NOT NULL,
         PRIMARY KEY(id),
         FOREIGN KEY(id_name_event) REFERENCES $circus_shapito_name_event(id)
      )
      {$charset_collate};";
      dbDelta($sql);
   }
   circus_shapito_event($charset_collate, $table_prefix);
 

 // circus_shapito_sector_price 
   function circus_shapito_sector_price($charset_collate, $table_prefix, $table_name, $price) {
      $full_table_name = $table_prefix . $table_name;
      $circus_shapito_event = $table_prefix . 'circus_shapito_event';
      $sql = "CREATE TABLE {$full_table_name} (
         id int(4) NOT NULL auto_increment,
         id_event int(4) NOT NULL,
         first_row int(4) NOT NULL default $price[0],
         second_row int(4) NOT NULL default $price[1],
         terium_row int(4) NOT NULL default $price[2],
         fourth_row int(4) NOT NULL default $price[3],
         fifth_row int(4) NOT NULL default $price[4],
         sixth_row int(4) NOT NULL default $price[5],
         seventh_row int(4) NOT NULL default $price[6],
         eighth_row int(4) NOT NULL default $price[7],
         PRIMARY KEY(id),
         FOREIGN KEY(id_event) REFERENCES $circus_shapito_event(id)
      )
      {$charset_collate};";
      dbDelta($sql);
   }

   $circus_shapito_lateral_sector_price = [1200, 1000, 900, 900, 800, 700, 600, 500];
   $circus_shapito_central_sector_price = [1200, 1200, 1000, 1000, 900, 800, 700, 600];

   circus_shapito_sector_price($charset_collate, $table_prefix, 'circus_shapito_lateral_sector_price', $circus_shapito_lateral_sector_price);
   circus_shapito_sector_price($charset_collate, $table_prefix, 'circus_shapito_central_sector_price', $circus_shapito_central_sector_price);
 


 // circus_shapito_vip_price 
   function circus_shapito_vip_price ($charset_collate, $table_prefix, $table_name) {
      $full_table_name = $table_prefix . $table_name;
      $circus_shapito_event = $table_prefix . 'circus_shapito_event';
      $sql = "CREATE TABLE {$full_table_name} (
         id int(4) NOT NULL auto_increment,
         id_event int(4) NOT NULL,
         vip_price int(4) NOT NULL default 1400,
         PRIMARY KEY(id),
         FOREIGN KEY(id_event) REFERENCES $circus_shapito_event(id)
      )
      {$charset_collate};";
      dbDelta($sql);
   }
   circus_shapito_vip_price($charset_collate, $table_prefix, 'circus_shapito_vip_price');
 // кол-во мест в рядах
   function circus_shapito_sectors_rows_places ($charset_collate, $table_prefix, $table_name) {
      $full_table_name = $table_prefix . $table_name;
      $circus_shapito_event = $table_prefix . 'circus_shapito_event';
      $sql = "CREATE TABLE {$full_table_name} (
         id int(4) NOT NULL auto_increment,
         name_row varchar(30) NOT NULL,
         number_of_seats int(4) NOT NULL,
         PRIMARY KEY(id)
      )
      {$charset_collate};";
      dbDelta($sql);
   }
   circus_shapito_sectors_rows_places($charset_collate, $table_prefix, 'circus_shapito_lateral_fourth_sector');
   circus_shapito_sectors_rows_places($charset_collate, $table_prefix, 'circus_shapito_lateral_first_sector');
   circus_shapito_sectors_rows_places($charset_collate, $table_prefix, 'circus_shapito_central_tritium_sector');
   circus_shapito_sectors_rows_places($charset_collate, $table_prefix, 'circus_shapito_central_second_sector');
   circus_shapito_sectors_rows_places($charset_collate, $table_prefix, 'circus_shapito_vip_sector');


   $name_row = ['first_row', 'second_row', 'terium_row', 'fourth_row', 'fifth_row', 'sixth_row','seventh_row','eighth_row'];
   $lateral_sector_number_of_seats = [18, 19, 21, 22, 24, 25, 26, 28];
   $central_sector_number_of_seats = [20, 21, 23, 25, 26, 28, 29, 31];
   
 //добавление кол-во мест по умолчанию
   function circus_shapito_insert_default_values_in_sectors($wpdb, $table_prefix, $table_name, $name_row, $number_of_seats) {
      $table_prefix .=  $table_name;
      $wpdb->insert(
         $table_prefix,
         array ( 'name_row' => $name_row, 'number_of_seats' => $number_of_seats ),
         array ( '%s', '%d' )
      );
   }
   function circus_shapito_default_values_in_sectors_laterals ($name_row, $wpdb, $table_prefix, $table_name, $number_of_seats) {
      for($i = 0; $i < count($name_row); $i++) {
         circus_shapito_insert_default_values_in_sectors($wpdb, $table_prefix, $table_name, $name_row[$i], $number_of_seats[$i]);
      }
   }
   circus_shapito_default_values_in_sectors_laterals($name_row, $wpdb, $table_prefix, 'circus_shapito_lateral_fourth_sector', $lateral_sector_number_of_seats);
   circus_shapito_default_values_in_sectors_laterals($name_row, $wpdb, $table_prefix, 'circus_shapito_lateral_first_sector', $lateral_sector_number_of_seats);
   circus_shapito_default_values_in_sectors_laterals($name_row, $wpdb, $table_prefix, 'circus_shapito_central_tritium_sector', $central_sector_number_of_seats);
   circus_shapito_default_values_in_sectors_laterals($name_row, $wpdb, $table_prefix, 'circus_shapito_central_second_sector', $central_sector_number_of_seats);
   circus_shapito_insert_default_values_in_sectors($wpdb, $table_prefix, 'circus_shapito_vip_sector', 'vip', 13);

 //таблица для проданных мест
   function circus_shapito_sold_seats ($charset_collate, $table_prefix, $table_name) {
      $full_table_name = $table_prefix . $table_name;
      $circus_shapito_event = $table_prefix . 'circus_shapito_event';
      $sql = "CREATE TABLE {$full_table_name} (
         id int(4) NOT NULL auto_increment,
         id_event int(4) NOT NULL,
         ticket_number varchar(100),
         section varchar(40) NOT NULL,
         row varchar(30),
         place int(4) NOT NULL,
         price int(4),
         phone varchar(100),
         email varchar(100),
         stock varchar(100),
         admin bool NOT NULL default false,
         PRIMARY KEY(id),
         FOREIGN KEY(id_event) REFERENCES $circus_shapito_event(id)
      )
      {$charset_collate};";
      dbDelta($sql);
   }
   circus_shapito_sold_seats($charset_collate, $table_prefix, 'circus_shapito_sold_seats');

 //таблица с возможными акциями
   function circus_shapito_stock ($charset_collate, $table_prefix, $table_name) {
      $full_table_name = $table_prefix . $table_name;
      $sql = "CREATE TABLE {$full_table_name} (
         id int(4) NOT NULL auto_increment,
         stock varchar(10) NOT NULL,
         PRIMARY KEY(id)
      )
      {$charset_collate};";
      dbDelta($sql);
   }
   circus_shapito_stock($charset_collate, $table_prefix, 'circus_shapito_stock');

 //добавление акций поумолчанию
   function circus_shapito_insert_default_values_in_stock($wpdb, $table_prefix, $stock) {
      $table_prefix .=  'circus_shapito_stock';
      foreach($stock as $elem) {
         $wpdb->insert( $table_prefix, array ( 'stock' => $elem), array ( '%s') );
      }
   }
   circus_shapito_insert_default_values_in_stock($wpdb, $table_prefix, ['1+1', '2+1', '3+1']);

 //Таблица для обозначений акций по рядам в каждом секторе
   function circus_shapito_sector_row_stock($charset_collate, $table_prefix, $table_name) {
      $full_table_name = $table_prefix . $table_name;
      $circus_shapito_event = $table_prefix . 'circus_shapito_event';
      $sql = "CREATE TABLE {$full_table_name} (
         id int(4) NOT NULL auto_increment,
         id_event int(4) NOT NULL,
         first_row int(4),
         second_row int(4),
         terium_row int(4),
         fourth_row int(4),
         fifth_row int(4),
         sixth_row int(4),
         seventh_row int(4),
         eighth_row int(4),
         PRIMARY KEY(id),
         FOREIGN KEY(id_event) REFERENCES $circus_shapito_event(id)
      )
      {$charset_collate};";
      dbDelta($sql);
   }
   $circus_shapito_sector_row_stock_name = ['circus_shapito_lateral_fourth_sector_stock',
           'circus_shapito_lateral_first_sector_stock',
           'circus_shapito_central_tritium_sector_stock',
           'circus_shapito_central_second_sector_stock'
          ];
   foreach($circus_shapito_sector_row_stock_name as $elem) {
      circus_shapito_sector_row_stock($charset_collate, $table_prefix, $elem );
   }
   function circus_shapito_sector_vip_row_stock($charset_collate, $table_prefix, $table_name) {
      $full_table_name = $table_prefix . $table_name;
      $circus_shapito_event = $table_prefix . 'circus_shapito_event';
      $sql = "CREATE TABLE {$full_table_name} (
         id int(4) NOT NULL auto_increment,
         id_event int(4) NOT NULL,
         vip_row int(4),
         PRIMARY KEY(id),
         FOREIGN KEY(id_event) REFERENCES $circus_shapito_event(id)
      )
      {$charset_collate};";
      dbDelta($sql);
   }
   circus_shapito_sector_vip_row_stock($charset_collate, $table_prefix, 'circus_shapito_sector_vip_row_stock');

   
 }


 
// удаление таблиц в бд при деактивации плагина 
 function circus_shapito_remove_table_wrapper () {
   function circus_shapito_remove_table ($table_name) {
      global $wpdb;
      $table_name = $wpdb->get_blog_prefix() . $table_name;
      $wpdb->query( "DROP TABLE IF EXISTS $table_name" );
   }
   circus_shapito_remove_table('circus_shapito_lateral_fourth_sector_price');
   circus_shapito_remove_table('circus_shapito_lateral_first_sector_price');
   circus_shapito_remove_table('circus_shapito_central_tritium_sector_price');
   circus_shapito_remove_table('circus_shapito_central_second_sector_price');
   circus_shapito_remove_table('circus_shapito_vip_price');
   circus_shapito_remove_table('circus_shapito_lateral_fourth_sector');
   circus_shapito_remove_table('circus_shapito_lateral_first_sector');
   circus_shapito_remove_table('circus_shapito_central_tritium_sector');
   circus_shapito_remove_table('circus_shapito_central_second_sector');
   circus_shapito_remove_table('circus_shapito_vip_sector');
   circus_shapito_remove_table('circus_shapito_sold_seats');
   circus_shapito_remove_table('circus_shapito_stock');
   circus_shapito_remove_table('circus_shapito_lateral_sector_price');
   circus_shapito_remove_table('circus_shapito_central_sector_price');
   circus_shapito_remove_table('circus_shapito_sector_vip_row_stock');
   circus_shapito_remove_table('circus_shapito_lateral_fourth_sector_stock');
   circus_shapito_remove_table('circus_shapito_lateral_first_sector_stock');
   circus_shapito_remove_table('circus_shapito_central_tritium_sector_stock');
   circus_shapito_remove_table('circus_shapito_central_second_sector_stock');
   circus_shapito_remove_table('circus_shapito_event');
   circus_shapito_remove_table('circus_shapito_name_event');
 }
 register_deactivation_hook(__FILE__, 'circus_shapito_remove_table_wrapper');
 

 //костыль для убирания костыля)
 function removeBackSlash($variable) {
   return str_replace('\\', "", $variable);
 }
 