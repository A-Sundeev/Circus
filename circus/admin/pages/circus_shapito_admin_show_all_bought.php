<?php
    global $wpdb;
    $pref = $wpdb -> prefix;
    $n_circus_shapito_name_event = $pref . 'circus_shapito_name_event';
    if(!isset($_GET['id_name_event']) && !isset($_GET['name_event']) && !isset($_GET['sub_id_name_event'])) {

    $_query = "SELECT * FROM $n_circus_shapito_name_event";
    $wpdb->query( $_query );

    $circus_shapito_event_ids           = wp_list_pluck( $wpdb->last_result, 'id' );
    $circus_shapito_event_name_events   = wp_list_pluck( $wpdb->last_result, 'name_event' );
?>
<div class="circus_container">
    <div class="circus_header">
        <h2>Список купленных мест</h2>
    </div>
    <div class="circus_body">
    <div class="name_output_event">
        <div>Номер мероприятия</div>
        <div>Место проведения</div>
        <div class="fake_name_output_event"></div>
    </div>
    <div class="output_event_wrapper">
        <?php 
            for($i = 0; $i < count($circus_shapito_event_ids); $i++) {
                ?>
                    <div class="output_event">
                        <div class="output_event_id_events"><?=$circus_shapito_event_ids[$i]?></div>
                        <div class="output_event_name_events"><?=removeBackSlash($circus_shapito_event_name_events[$i])?></div>
                        <a href="?page=circus_shapito_admin_show_all_bought&id_name_event=<?=$circus_shapito_event_ids[$i]?>&name_event=<?=$circus_shapito_event_name_events[$i]?>"><div class="button_edit_event_group button_edit_event" style="height:100%">Выбрать</div></a>
                    </div>
                <?php
            }
        ?>
    </div>
</div>
<?php
} else if (isset($_GET['id_name_event']) && isset($_GET['name_event'])) {
    include('circus_shapito_admin_selected_sold_events.php');
} else if (isset($_GET['sub_id_name_event'])) {
    include('circus_shapito_admin_selected_sub_sold_events.php');
}