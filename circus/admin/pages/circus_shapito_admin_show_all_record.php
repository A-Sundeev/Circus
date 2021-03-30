<?php
global $wpdb;
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
$n_circus_shapito_sold_seats = $pref . 'circus_shapito_sold_seats';

// переменная для ошибки либо успеха
$errorMessage;
$successMessage;
if(isset($_GET['id_remove_event'])) {
    $id_remove_event = (int) $_GET['id_remove_event'];

    $_query = "SELECT * FROM $n_circus_shapito_event WHERE `id_name_event` = $id_remove_event";
    $wpdb->query( $_query );
    
    $circus_shapito_event_id = wp_list_pluck( $wpdb->last_result, 'id' );
    if(!empty($circus_shapito_event_id)) {
        
    for($i = 0; $i < count($circus_shapito_event_id); $i++) {

    $callback_remove_circus_shapito_sector_vip_row_stock = $wpdb -> delete(
        $n_circus_shapito_sector_vip_row_stock,
        array('id_event' => $circus_shapito_event_id[$i]),
        array('%d')
    );

    $callback_remove_circus_shapito_lateral_fourth_sector_stock = $wpdb -> delete(
        $n_circus_shapito_lateral_fourth_sector_stock,
        array('id_event' => $circus_shapito_event_id[$i]),
        array('%d')
    );

    $callback_remove_circus_shapito_central_tritium_sector_stock = $wpdb -> delete(
        $n_circus_shapito_central_tritium_sector_stock,
        array('id_event' => $circus_shapito_event_id[$i]),
        array('%d')
    );

    $callback_remove_circus_shapito_central_second_sector_stock = $wpdb -> delete(
        $n_circus_shapito_central_second_sector_stock,
        array('id_event' => $circus_shapito_event_id[$i]),
        array('%d')
    );

    $callback_remove_circus_shapito_lateral_first_sector_stock = $wpdb -> delete(
        $n_circus_shapito_lateral_first_sector_stock,
        array('id_event' => $circus_shapito_event_id[$i]),
        array('%d')
    );
    
    $callback_remove_circus_shapito_central_sector_price = $wpdb -> delete(
        $n_circus_shapito_central_sector_price,
        array('id_event' => $circus_shapito_event_id[$i]),
        array('%d')
    );

    $callback_remove_circus_shapito_lateral_sector_price = $wpdb -> delete(
        $n_circus_shapito_lateral_sector_price,
        array('id_event' => $circus_shapito_event_id[$i]),
        array('%d')
    );

    $callback_remove_circus_shapito_vip_price = $wpdb -> delete(
        $n_circus_shapito_vip_price,
        array('id_event' => $circus_shapito_event_id[$i]),
        array('%d')
    );

    $callback_remove_circus_shapito_name_event = $wpdb -> delete(
        $n_circus_shapito_sold_seats,
        array('id_event' => $circus_shapito_event_id[$i]),
        array('%d')
    );
}

    

    $callback_remove_circus_shapito_event = $wpdb -> delete(
        $n_circus_shapito_event,
        array('id_name_event' => $id_remove_event),
        array('%d')
    );

    $callback_remove_circus_shapito_name_event = $wpdb -> delete(
        $n_circus_shapito_name_event,
        array('id' => $id_remove_event),
        array('%d')
    );
    
    
    if( $callback_remove_circus_shapito_sector_vip_row_stock            === false || 
        $callback_remove_circus_shapito_lateral_fourth_sector_stock     === false ||
        $callback_remove_circus_shapito_central_tritium_sector_stock    === false ||
        $callback_remove_circus_shapito_central_second_sector_stock     === false ||
        $callback_remove_circus_shapito_lateral_first_sector_stock      === false ||
        $callback_remove_circus_shapito_central_sector_price            === false ||
        $callback_remove_circus_shapito_lateral_sector_price            === false ||
        $callback_remove_circus_shapito_vip_price                       === false ||
        $callback_remove_circus_shapito_event                           === false ||
        $callback_remove_circus_shapito_name_event                      === false
    ) {
        $errorMessage = "Произошла ошибка при удалении данных!";
    } 
    else if($callback_remove_circus_shapito_sector_vip_row_stock            === 1 || 
            $callback_remove_circus_shapito_lateral_fourth_sector_stock     === 1 ||
            $callback_remove_circus_shapito_central_tritium_sector_stock    === 1 ||
            $callback_remove_circus_shapito_central_second_sector_stock     === 1 ||
            $callback_remove_circus_shapito_lateral_first_sector_stock      === 1 ||
            $callback_remove_circus_shapito_central_sector_price            === 1 ||
            $callback_remove_circus_shapito_lateral_sector_price            === 1 ||
            $callback_remove_circus_shapito_vip_price                       === 1 ||
            $callback_remove_circus_shapito_event                           === 1 ||
        $callback_remove_circus_shapito_name_event                          === 1
    ) {
        $successMessage = "Запись успешно удалена";
    }
    }
}


if(!isset($_GET['id_name_event']) && !isset($_GET['name_event']) && !isset($_GET['sub_id_name_event'])) {
    $flag = false;
    if(isset($_GET['deactivate'])) {
        $flag = true;
        $callback_update_circus_shapito_name_event = $wpdb->update(
            $n_circus_shapito_name_event,
            array(
                'status_event' => $flag,
            ),
            array('id' => $_GET['deactivate']),
            array('%d'),
            array('%d')
        );
        if($callback_update_circus_shapito_name_event === false) {
            $errorMessage = "Произошла ошибка при публикации!";
        }else if($callback_update_circus_shapito_name_event === 1) {
            $successMessage = "Публикация мероприятия произошла успешно";
        }

    } else if(isset($_GET['activate'])) {
        $flag = false;
        $callback_update_circus_shapito_name_event = $wpdb->update(
            $n_circus_shapito_name_event,
            array(
                'status_event' => $flag,
            ),
            array('id' => $_GET['activate']),
            array('%d'),
            array('%d')
        );
        if($callback_update_circus_shapito_name_event === false) {
            $errorMessage = "Произошла ошибка при публикации!";
        }else if($callback_update_circus_shapito_name_event === 1) {
            $successMessage = "Мероприятие снято с публикации";

        }
    }

    
    

    $circus_shapito_event_status_text   = 'Не опубликовано';
    $circus_shapito_event_text_button   = 'Опубликовать';
    $circus_shapito_event_status_class  = 'message_status_not_published';
    $publish_button_uri;
    $button_published_class;

    $_query = "SELECT * FROM wp_circus_shapito_name_event";
    $wpdb->query( $_query );

    $circus_shapito_event_ids           = wp_list_pluck( $wpdb->last_result, 'id' );
    $circus_shapito_event_name_events   = wp_list_pluck( $wpdb->last_result, 'name_event' );
    $circus_shapito_event_status_events = wp_list_pluck( $wpdb->last_result, 'status_event' );

?>

<div class="circus_container">
    <div class="circus_header">
        <h2>Все записи</h2>
    </div>
    <div class="circus_body">
        <?php
            if(isset($_POST['buttonUpdate']) || isset($_POST['buttonAdd']) || isset($_GET['id_remove_event']) || isset($_GET['activate']) || isset($_GET['deactivate'])) {
                if(!empty($errorMessage)) {
                    echo '<div class="message_status_error success_message">'.$errorMessage.'</div>';
                } else if(!empty($successMessage)) {
                    echo '<div class="message_status_success success_message">'.$successMessage.'</div>';
                }
            }
        ?>
        <div class="success_message yellow_message">
            <h3>ПЕРЕД ПУБЛИКАЦИЕЙ ОБЯЗАТЕЛЬНО ОТРЕДАКТИРУЙТЕ КАЖДОЕ МЕРОПРИЯТИЕ</h3>
        </div>
        <div class="name_output_event">
            <div>Статус</div>
            <div>Номер мероприятия</div>
            <div>Название шоу</div>
            <div class="fake_name_output_event"></div>
            <div class="fake_name_output_event"></div>
            <div class="fake_name_output_event"></div>
        </div>
        <div class="output_event_wrapper">
            <?php 
                for($i = 0; $i < count($circus_shapito_event_ids); $i++) {
                    $event_status_bool = (bool)$circus_shapito_event_status_events[$i];
                    if($event_status_bool === true) {
                        $circus_shapito_event_status_text = 'Опубликовано';
                        $circus_shapito_event_status_class = 'message_status_published';
                        $circus_shapito_event_text_button = 'Снять с публикации';
                        $publish_button_uri = 'activate';
                        $button_published_class = 'button_remove_event';
                    } else if($event_status_bool === false) {
                        $circus_shapito_event_status_text = 'Не опубликовано';
                        $circus_shapito_event_status_class = 'message_status_not_published';
                        $circus_shapito_event_text_button = 'Опубликовать';
                        $publish_button_uri = 'deactivate';
                        $button_published_class = 'button_to_publish_event';
                    }
                    ?>
                    <div class="output_event">
                    <div class="<?=$circus_shapito_event_status_class?>"><?=$circus_shapito_event_status_text?></div>
                    <div class="output_event_id_events"><?=$circus_shapito_event_ids[$i]?></div>
                    <div class="output_event_name_events"><?=htmlspecialchars(htmlspecialchars_decode(removeBackSlash($circus_shapito_event_name_events[$i])))?></div>
                    <a href="?page=circus_shapito_admin_show_all_record&<?=$publish_button_uri .'='. $circus_shapito_event_ids[$i]?>"><div class="button_edit_event_group <?=$button_published_class?>"><?=$circus_shapito_event_text_button?></div></a>
                    <a href="?page=circus_shapito_admin_show_all_record&id_name_event=<?=$circus_shapito_event_ids[$i]?>" ><div class="button_edit_event_group button_edit_event" >Редактировать</div></a>
                    <a href="?page=circus_shapito_admin_show_all_record&id_remove_event=<?=$circus_shapito_event_ids[$i]?>" ><div class="button_edit_event_group button_remove_event" >Удалить</div></div></a>
                    <?php
                }
            ?>
        </div>
        
    </div>
</div>
<?php
} else if (isset($_GET['id_name_event'])) {
    include('circus_shapito_admin_edit_event.php');
} else if (isset($_GET['sub_id_name_event'])) {
    include('circus_shapito_admin_edit_sub_event.php');
}