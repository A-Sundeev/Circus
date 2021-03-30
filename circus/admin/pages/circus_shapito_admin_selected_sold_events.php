<?php
global $wpdb;
require_once ABSPATH . 'wp-admin/includes/upgrade.php';

$charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset} COLLATE {$wpdb->collate}";
$id_name_event = (int) $_GET['id_name_event'];

$pref = $wpdb -> prefix;

$n_circus_shapito_event = $pref . 'circus_shapito_event';
$n_circus_shapito_name_event = $pref . 'circus_shapito_name_event';

$n_circus_shapito_vip_price = $pref . 'circus_shapito_vip_price';
$n_circus_shapito_lateral_sector_price = $pref . 'circus_shapito_lateral_sector_price';
$n_circus_shapito_central_sector_price = $pref . 'circus_shapito_central_sector_price';
$n_circus_shapito_lateral_first_sector_stock = $pref . 'circus_shapito_lateral_first_sector_stock';
$n_circus_shapito_central_second_sector_stock = $pref . 'circus_shapito_central_second_sector_stock';
$n_circus_shapito_central_tritium_sector_stock = $pref . 'circus_shapito_central_tritium_sector_stock';
$n_circus_shapito_lateral_fourth_sector_stock = $pref . 'circus_shapito_lateral_fourth_sector_stock';
$n_circus_shapito_sector_vip_row_stock = $pref . 'circus_shapito_sector_vip_row_stock';


//основаная таблица
    $_query = "SELECT * FROM $n_circus_shapito_event WHERE `id_name_event` = $id_name_event";
    $wpdb->query( $_query );

    $circus_shapito_event_id            = wp_list_pluck( $wpdb->last_result, 'id' );
    if(!empty($circus_shapito_event_id)) {

    $circus_shapito_event_date          = wp_list_pluck( $wpdb->last_result, 'date' );
    $circus_shapito_event_time_start    = wp_list_pluck( $wpdb->last_result, 'time_start' );

    //имя ивента
    $_circus_shapito_name_event = "SELECT * FROM $n_circus_shapito_name_event WHERE `id` = $id_name_event";
    $wpdb->query( $_circus_shapito_name_event );

    $circus_shapito_name_event          = wp_list_pluck( $wpdb->last_result, 'name_event' );

    //без обратных слэшей
    $circus_shapito_name_event          = removeBackSlash($circus_shapito_name_event[0]);
?>


<div class="circus_container">
    <div class="circus_body">
        <div class="circus_header">
            <h2><?= $id_name_event . ' - ' . $circus_shapito_name_event ?></h2>
        </div>
        <div class="name_output_event">
            <div>Номер мероприятия</div>
            <div>Дата</div>
            <div>Время начала</div>
            <div class="fake_name_output_event"></div>
        </div>
        <div class="output_event_wrapper">
            <?php 
                for($i = 0; $i < count($circus_shapito_event_id); $i++) {
                    $date = date('d-m-Y', strtotime($circus_shapito_event_date[$i]));
                    $time = date('H:i', strtotime($circus_shapito_event_time_start[$i]));

                    echo "<div class=\"output_event\">
                    <div class=\"output_event_id_events\">$circus_shapito_event_id[$i]</div>
                    <div class=\"\">$date</div>
                    <div class=\"\">$time</div>
                    <a href=\"?page=circus_shapito_admin_show_all_bought&sub_id_name_event=$circus_shapito_event_id[$i]\"><div class=\"button_edit_event_group button_edit_event\">выбрать</div></a>
                    </div>";
                }
            ?>
        </div>
    </div>
</div>
<?php
    }