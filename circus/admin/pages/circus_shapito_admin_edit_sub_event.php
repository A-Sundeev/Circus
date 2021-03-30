<?php 

global $wpdb;
// префикс l_ - переменные из полей
// префикс n_ - имена таблиц из бд
// префикс d_ - переменные для купола


$sub_id_name_event = (int) $_GET['sub_id_name_event'];
    //префикс
    $pref = $wpdb -> prefix;
    //имена бд
    //главная
    $n_circus_shapito_event = $pref . 'circus_shapito_event';
    
    //цены центральных секторов
    $n_circus_shapito_central_sector_price = $pref . 'circus_shapito_central_sector_price';
    //цены боковых секторов
    $n_circus_shapito_lateral_sector_price = $pref . 'circus_shapito_lateral_sector_price';
    //цена вип зоны
    $n_circus_shapito_vip_price = $pref . 'circus_shapito_vip_price';

    //список всех акций
    $n_circus_shapito_stock = $pref . 'circus_shapito_stock';

    //акции бокового первого сектора
    $n_circus_shapito_lateral_first_sector_stock = $pref . 'circus_shapito_lateral_first_sector_stock';
    //акции центрального второго сектора
    $n_circus_shapito_central_second_sector_stock = $pref . 'circus_shapito_central_second_sector_stock';    
    //акции центрального третьего сектора
    $n_circus_shapito_central_tritium_sector_stock = $pref . 'circus_shapito_central_tritium_sector_stock';
    //акции бокового четвертого сектора
    $n_circus_shapito_lateral_fourth_sector_stock = $pref . 'circus_shapito_lateral_fourth_sector_stock';
    //акции вип зоны
    $n_circus_shapito_sector_vip_row_stock = $pref . 'circus_shapito_sector_vip_row_stock';


    // кол-во мест
    // вип зона
    $n_circus_shapito_vip_sector = $pref . 'circus_shapito_vip_sector';
    // боковой первый сектор
    $n_circus_shapito_lateral_first_sector = $pref .'circus_shapito_lateral_first_sector';
    // центральный второй сектор
    $n_circus_shapito_central_second_sector = $pref .'circus_shapito_central_second_sector';
    // центральный третий сектор
    $n_circus_shapito_central_tritium_sector = $pref .'circus_shapito_central_tritium_sector';
    // боковой четвертый сектор
    $n_circus_shapito_lateral_fourth_sector = $pref .'circus_shapito_lateral_fourth_sector';
    
    //проданные места
    $n_circus_shapito_sold_seats = $pref . 'circus_shapito_sold_seats';

        //обновление полей в бд
    
        if(isset($_POST['button'])) {
            if(!empty($_POST['date_1'])) {
                if(!empty($_POST['timeStart_1'])) {
                    if( !empty($_POST['central_first_row'])   && 
                        !empty($_POST['central_second_row'])  &&
                        !empty($_POST['central_terium_row'])  &&
                        !empty($_POST['central_fourth_row'])  &&
                        !empty($_POST['central_fifth_row'])   &&
                        !empty($_POST['central_sixth_row'])   &&
                        !empty($_POST['central_seventh_row']) &&
                        !empty($_POST['central_eighth_row'])  &&
                        !empty($_POST['lateral_first_row'])   &&
                        !empty($_POST['lateral_second_row'])  &&
                        !empty($_POST['lateral_terium_row'])  &&
                        !empty($_POST['lateral_fourth_row'])  &&
                        !empty($_POST['lateral_fifth_row'])   &&
                        !empty($_POST['lateral_sixth_row'])   &&
                        !empty($_POST['lateral_seventh_row']) &&
                        !empty($_POST['lateral_eighth_row'])) {
    

                        // дата и время начала
                            $l_date = htmlspecialchars(trim($_POST['date_1']));
                            $l_time = htmlspecialchars(trim($_POST['timeStart_1']));
    
                            // Цены центральные сектора
                            $l_central_first_row   = htmlspecialchars(trim($_POST['central_first_row']));
                            $l_central_second_row  = htmlspecialchars(trim($_POST['central_second_row']));
                            $l_central_terium_row  = htmlspecialchars(trim($_POST['central_terium_row']));
                            $l_central_fourth_row  = htmlspecialchars(trim($_POST['central_fourth_row']));
                            $l_central_fifth_row   = htmlspecialchars(trim($_POST['central_fifth_row']));
                            $l_central_sixth_row   = htmlspecialchars(trim($_POST['central_sixth_row']));
                            $l_central_seventh_row = htmlspecialchars(trim($_POST['central_seventh_row']));
                            $l_central_eighth_row  = htmlspecialchars(trim($_POST['central_eighth_row']));
    
                            // Цены боковые сектора
                            $l_lateral_first_row   = htmlspecialchars(trim($_POST['lateral_first_row']));
                            $l_lateral_second_row  = htmlspecialchars(trim($_POST['lateral_second_row']));
                            $l_lateral_terium_row  = htmlspecialchars(trim($_POST['lateral_terium_row']));
                            $l_lateral_fourth_row  = htmlspecialchars(trim($_POST['lateral_fourth_row']));
                            $l_lateral_fifth_row   = htmlspecialchars(trim($_POST['lateral_fifth_row']));
                            $l_lateral_sixth_row   = htmlspecialchars(trim($_POST['lateral_sixth_row']));
                            $l_lateral_seventh_row = htmlspecialchars(trim($_POST['lateral_seventh_row']));
                            $l_lateral_eighth_row  = htmlspecialchars(trim($_POST['lateral_eighth_row']));
    
                            // цены вип зона
                            $l_vip_price_row = htmlspecialchars(trim($_POST['vip_price_row']));
    
                            // акции боковой первый сектор
                            $l_lateral_first_stock_first_row      = htmlspecialchars(trim($_POST['lateral_first_stock_first_row']));
                            $l_lateral_first_stock_second_row     = htmlspecialchars(trim($_POST['lateral_first_stock_second_row']));
                            $l_lateral_first_stock_terium_row     = htmlspecialchars(trim($_POST['lateral_first_stock_terium_row']));
                            $l_lateral_first_stock_fourth_row     = htmlspecialchars(trim($_POST['lateral_first_stock_fourth_row']));
                            $l_lateral_first_stock_fifth_row      = htmlspecialchars(trim($_POST['lateral_first_stock_fifth_row']));
                            $l_lateral_first_stock_sixth_row      = htmlspecialchars(trim($_POST['lateral_first_stock_sixth_row']));
                            $l_lateral_first_stock_seventh_row    = htmlspecialchars(trim($_POST['lateral_first_stock_seventh_row']));
                            $l_lateral_first_stock_eighth_row     = htmlspecialchars(trim($_POST['lateral_first_stock_eighth_row']));
    
                            //акции центральный второй сектор
                            $l_central_second_stock_first_row     = htmlspecialchars(trim($_POST['central_second_stock_first_row']));
                            $l_central_second_stock_second_row    = htmlspecialchars(trim($_POST['central_second_stock_second_row']));
                            $l_central_second_stock_terium_row    = htmlspecialchars(trim($_POST['central_second_stock_terium_row']));
                            $l_central_second_stock_fourth_row    = htmlspecialchars(trim($_POST['central_second_stock_fourth_row']));
                            $l_central_second_stock_fifth_row     = htmlspecialchars(trim($_POST['central_second_stock_fifth_row']));
                            $l_central_second_stock_sixth_row     = htmlspecialchars(trim($_POST['central_second_stock_sixth_row']));
                            $l_central_second_stock_seventh_row   = htmlspecialchars(trim($_POST['central_second_stock_seventh_row']));
                            $l_central_second_stock_eighth_row    = htmlspecialchars(trim($_POST['central_second_stock_eighth_row']));
    
                            //акции центральный третий сектор
                            $l_central_tritium_stock_first_row    = htmlspecialchars(trim($_POST['central_tritium_stock_first_row']));
                            $l_central_tritium_stock_second_row   = htmlspecialchars(trim($_POST['central_tritium_stock_second_row']));
                            $l_central_tritium_stock_terium_row   = htmlspecialchars(trim($_POST['central_tritium_stock_terium_row']));
                            $l_central_tritium_stock_fourth_row   = htmlspecialchars(trim($_POST['central_tritium_stock_fourth_row']));
                            $l_central_tritium_stock_fifth_row    = htmlspecialchars(trim($_POST['central_tritium_stock_fifth_row']));
                            $l_central_tritium_stock_sixth_row    = htmlspecialchars(trim($_POST['central_tritium_stock_sixth_row']));
                            $l_central_tritium_stock_seventh_row  = htmlspecialchars(trim($_POST['central_tritium_stock_seventh_row']));
                            $l_central_tritium_stock_eighth_row   = htmlspecialchars(trim($_POST['central_tritium_stock_eighth_row']));
    
                            //акции боковой четвертый сектор
                            $l_lateral_fourth_stock_first_row     = htmlspecialchars(trim($_POST['lateral_fourth_stock_first_row']));
                            $l_lateral_fourth_stock_second_row    = htmlspecialchars(trim($_POST['lateral_fourth_stock_second_row']));
                            $l_lateral_fourth_stock_terium_row    = htmlspecialchars(trim($_POST['lateral_fourth_stock_terium_row']));
                            $l_lateral_fourth_stock_fourth_row    = htmlspecialchars(trim($_POST['lateral_fourth_stock_fourth_row']));
                            $l_lateral_fourth_stock_fifth_row     = htmlspecialchars(trim($_POST['lateral_fourth_stock_fifth_row']));
                            $l_lateral_fourth_stock_sixth_row     = htmlspecialchars(trim($_POST['lateral_fourth_stock_sixth_row']));
                            $l_lateral_fourth_stock_seventh_row   = htmlspecialchars(trim($_POST['lateral_fourth_stock_seventh_row']));
                            $l_lateral_fourth_stock_eighth_row    = htmlspecialchars(trim($_POST['lateral_fourth_stock_eighth_row']));

                            //акции вип зоны
                            $l_vip_row_stock = htmlspecialchars(trim($_POST['vip_row_stock']));
    
                        //обновление таблиц
                            //дата и время
                            $callback_circus_shapito_event = $wpdb->update(
                                $n_circus_shapito_event,
                                array(
                                    'date' => $l_date,
                                    'time_start' => $l_time,
                                ),
                                array('id' => $sub_id_name_event),
                                array('%s', '%s'),
                                array('%d')
                            );


                            // цены центральных секторов
                            $callback_central_sector_price = $wpdb->update(
                                $n_circus_shapito_central_sector_price,
                                array(
                                    'first_row'     => $l_central_first_row,
                                    'second_row'    => $l_central_second_row,
                                    'terium_row'    => $l_central_terium_row,
                                    'fourth_row'    => $l_central_fourth_row,
                                    'fifth_row'     => $l_central_fifth_row,
                                    'sixth_row'     => $l_central_sixth_row,
                                    'seventh_row'   => $l_central_seventh_row,
                                    'eighth_row'    => $l_central_eighth_row,
                                ),
                                array('id_event'    => $sub_id_name_event),
                                array('%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d',),
                                array('%d')
                            );

                            // цены боковых секторов
                            $callback_lateral_sector_price = $wpdb->update(
                                $n_circus_shapito_lateral_sector_price,
                                array(
                                    'first_row'     => $l_lateral_first_row,
                                    'second_row'    => $l_lateral_second_row,
                                    'terium_row'    => $l_lateral_terium_row,
                                    'fourth_row'    => $l_lateral_fourth_row,
                                    'fifth_row'     => $l_lateral_fifth_row,
                                    'sixth_row'     => $l_lateral_sixth_row,
                                    'seventh_row'   => $l_lateral_seventh_row,
                                    'eighth_row'    => $l_lateral_eighth_row,
                                ),
                                array('id_event'    => $sub_id_name_event),
                                array('%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d',),
                                array('%d')
                            );

                            // цены вип зоны
                            $callback_vip_price = $wpdb->update(
                                $n_circus_shapito_vip_price,
                                array(
                                    'vip_price'     => $l_vip_price_row,
                                    
                                ),
                                array('id_event'    => $sub_id_name_event),
                                array('%d'),
                                array('%d')
                            );


                            // акции боковой первыйсектор
                            $callback_lateral_first_sector_stock = $wpdb->update(
                                $n_circus_shapito_lateral_first_sector_stock,
                                array(
                                    'first_row'     => $l_lateral_first_stock_first_row,
                                    'second_row'    => $l_lateral_first_stock_second_row,
                                    'terium_row'    => $l_lateral_first_stock_terium_row,
                                    'fourth_row'    => $l_lateral_first_stock_fourth_row,
                                    'fifth_row'     => $l_lateral_first_stock_fifth_row,
                                    'sixth_row'     => $l_lateral_first_stock_sixth_row,
                                    'seventh_row'   => $l_lateral_first_stock_seventh_row,
                                    'eighth_row'    => $l_lateral_first_stock_eighth_row,
                                ),
                                array('id_event'    => $sub_id_name_event),
                                array('%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d',),
                                array('%d')
                            );

                            // акции центральный второй сектор
                            $callback_central_second_sector_stock = $wpdb->update(
                                $n_circus_shapito_central_second_sector_stock,
                                array(
                                    'first_row'     => $l_central_second_stock_first_row,
                                    'second_row'    => $l_central_second_stock_second_row,
                                    'terium_row'    => $l_central_second_stock_terium_row,
                                    'fourth_row'    => $l_central_second_stock_fourth_row,
                                    'fifth_row'     => $l_central_second_stock_fifth_row,
                                    'sixth_row'     => $l_central_second_stock_sixth_row,
                                    'seventh_row'   => $l_central_second_stock_seventh_row,
                                    'eighth_row'    => $l_central_second_stock_eighth_row,
                                ),
                                array('id_event'    => $sub_id_name_event),
                                array('%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d',),
                                array('%d')
                            );

                            // акции центральный третий сектор
                            $callback_central_tritium_sector_stock = $wpdb->update(
                                $n_circus_shapito_central_tritium_sector_stock,
                                array(
                                    'first_row'     => $l_central_tritium_stock_first_row,
                                    'second_row'    => $l_central_tritium_stock_second_row,
                                    'terium_row'    => $l_central_tritium_stock_terium_row,
                                    'fourth_row'    => $l_central_tritium_stock_fourth_row,
                                    'fifth_row'     => $l_central_tritium_stock_fifth_row,
                                    'sixth_row'     => $l_central_tritium_stock_sixth_row,
                                    'seventh_row'   => $l_central_tritium_stock_seventh_row,
                                    'eighth_row'    => $l_central_tritium_stock_eighth_row,
                                ),
                                array('id_event'    => $sub_id_name_event),
                                array('%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d',),
                                array('%d')
                            );

                            // акции боковой четвертый сектор
                            $callback_lateral_fourth_sector_stock = $wpdb->update(
                                $n_circus_shapito_lateral_fourth_sector_stock,
                                array(
                                    'first_row'     => $l_lateral_fourth_stock_first_row,
                                    'second_row'    => $l_lateral_fourth_stock_second_row,
                                    'terium_row'    => $l_lateral_fourth_stock_terium_row,
                                    'fourth_row'    => $l_lateral_fourth_stock_fourth_row,
                                    'fifth_row'     => $l_lateral_fourth_stock_fifth_row,
                                    'sixth_row'     => $l_lateral_fourth_stock_sixth_row,
                                    'seventh_row'   => $l_lateral_fourth_stock_seventh_row,
                                    'eighth_row'    => $l_lateral_fourth_stock_eighth_row,
                                ),
                                array('id_event'    => $sub_id_name_event),
                                array('%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d',),
                                array('%d')
                            );

                            // акции вип зона
                            $callback_sector_vip_row_stock = $wpdb->update(
                                $n_circus_shapito_sector_vip_row_stock,
                                array(
                                    'vip_row'     => $l_vip_row_stock,
                                    
                                ),
                                array('id_event'    => $sub_id_name_event),
                                array('%d'),
                                array('%d')
                            );

                            // переменная для ошибки либо успеха
                            $errorMessage;
                            $successMessage;

                            if( $callback_circus_shapito_event          === false ||
                                $callback_central_sector_price          === false ||
                                $callback_lateral_sector_price          === false ||
                                $callback_vip_price                     === false ||
                                $callback_lateral_first_sector_stock    === false ||
                                $callback_central_second_sector_stock   === false ||
                                $callback_central_tritium_sector_stock  === false ||
                                $callback_lateral_fourth_sector_stock   === false ||
                                $callback_sector_vip_row_stock          === false
                            ) {
                                $errorMessage = "Произошла ошибка при обновлении данных!";
                            } 
                            else if($callback_circus_shapito_event          >= 1 ||
                                    $callback_central_sector_price          >= 1 ||
                                    $callback_lateral_sector_price          >= 1 ||
                                    $callback_vip_price                     >= 1 ||
                                    $callback_lateral_first_sector_stock    >= 1 ||
                                    $callback_central_second_sector_stock   >= 1 ||
                                    $callback_central_tritium_sector_stock  >= 1 ||
                                    $callback_lateral_fourth_sector_stock   >= 1 ||
                                    $callback_sector_vip_row_stock          >= 1
                            ) {
                                $successMessage = "Данные успешно изменены";
                            }
                    }
                }
            }
        }

    // выборка из главной
    $_query = "SELECT * FROM $n_circus_shapito_event WHERE id = $sub_id_name_event";
    $wpdb->query( $_query );
    
    $circus_shapito_event_id            = wp_list_pluck( $wpdb->last_result, 'id' );
    if(!empty($circus_shapito_event_id)) {
    $circus_shapito_event_id_name_event = wp_list_pluck( $wpdb->last_result, 'id_name_event' );
    $circus_shapito_event_location      = wp_list_pluck( $wpdb->last_result, 'location' );
    $circus_shapito_event_date          = wp_list_pluck( $wpdb->last_result, 'date' );
    $circus_shapito_event_time_start    = wp_list_pluck( $wpdb->last_result, 'time_start' );

    //выборка центральных цен
    $central_sector_price = "SELECT * FROM $n_circus_shapito_central_sector_price WHERE id = $circus_shapito_event_id[0]";
    $wpdb->query( $central_sector_price );

    $central_first_row      = wp_list_pluck( $wpdb->last_result, 'first_row' );
    $central_second_row     = wp_list_pluck( $wpdb->last_result, 'second_row' );
    $central_terium_row     = wp_list_pluck( $wpdb->last_result, 'terium_row' );
    $central_fourth_row     = wp_list_pluck( $wpdb->last_result, 'fourth_row' );
    $central_fifth_row      = wp_list_pluck( $wpdb->last_result, 'fifth_row' );
    $central_sixth_row      = wp_list_pluck( $wpdb->last_result, 'sixth_row' );
    $central_seventh_row    = wp_list_pluck( $wpdb->last_result, 'seventh_row' );
    $central_eighth_row     = wp_list_pluck( $wpdb->last_result, 'eighth_row' );

    //выборка боковых цен
    $lateral_sector_price = "SELECT * FROM $n_circus_shapito_lateral_sector_price WHERE id = $circus_shapito_event_id[0]";
    $wpdb->query( $lateral_sector_price );

    $lateral_first_row      = wp_list_pluck( $wpdb->last_result, 'first_row' );
    $lateral_second_row     = wp_list_pluck( $wpdb->last_result, 'second_row' );
    $lateral_terium_row     = wp_list_pluck( $wpdb->last_result, 'terium_row' );
    $lateral_fourth_row     = wp_list_pluck( $wpdb->last_result, 'fourth_row' );
    $lateral_fifth_row      = wp_list_pluck( $wpdb->last_result, 'fifth_row' );
    $lateral_sixth_row      = wp_list_pluck( $wpdb->last_result, 'sixth_row' );
    $lateral_seventh_row    = wp_list_pluck( $wpdb->last_result, 'seventh_row' );
    $lateral_eighth_row     = wp_list_pluck( $wpdb->last_result, 'eighth_row' );

    //выборка вип цен
    $vip_sector_price = "SELECT * FROM $n_circus_shapito_vip_price WHERE id = $circus_shapito_event_id[0]";
    $wpdb->query( $vip_sector_price );

    $vip_row = wp_list_pluck( $wpdb->last_result, 'vip_price' );

    //выборка возможных акций
    $circus_shapito_stock = "SELECT * FROM $n_circus_shapito_stock";
    $wpdb->query( $circus_shapito_stock );

    $circus_shapito_stock_id = wp_list_pluck( $wpdb->last_result, 'id' );
    $circus_shapito_stock_value = wp_list_pluck( $wpdb->last_result, 'stock' );


    // акции бокового первого сектора
    $circus_shapito_lateral_first_sector_stock = "SELECT * FROM $n_circus_shapito_lateral_first_sector_stock WHERE id_event = $circus_shapito_event_id[0]";
    $wpdb->query( $circus_shapito_lateral_first_sector_stock );

    $lateral_first_sector_stock_first_row       = wp_list_pluck( $wpdb->last_result, 'first_row' );
    $lateral_first_sector_stock_second_row      = wp_list_pluck( $wpdb->last_result, 'second_row' );
    $lateral_first_sector_stock_terium_row      = wp_list_pluck( $wpdb->last_result, 'terium_row' );
    $lateral_first_sector_stock_fourth_row      = wp_list_pluck( $wpdb->last_result, 'fourth_row' );
    $lateral_first_sector_stock_fifth_row       = wp_list_pluck( $wpdb->last_result, 'fifth_row' );
    $lateral_first_sector_stock_sixth_row       = wp_list_pluck( $wpdb->last_result, 'sixth_row' );
    $lateral_first_sector_stock_seventh_row     = wp_list_pluck( $wpdb->last_result, 'seventh_row' );
    $lateral_first_sector_stock_eighth_row      = wp_list_pluck( $wpdb->last_result, 'eighth_row' );

    // акции центрального второго сектора
    $circus_shapito_central_second_sector_stock = "SELECT * FROM $n_circus_shapito_central_second_sector_stock WHERE id_event = $circus_shapito_event_id[0]";
    $wpdb->query( $circus_shapito_central_second_sector_stock );

    $central_second_sector_stock_first_row      = wp_list_pluck( $wpdb->last_result, 'first_row' );
    $central_second_sector_stock_second_row     = wp_list_pluck( $wpdb->last_result, 'second_row' );
    $central_second_sector_stock_terium_row     = wp_list_pluck( $wpdb->last_result, 'terium_row' );
    $central_second_sector_stock_fourth_row     = wp_list_pluck( $wpdb->last_result, 'fourth_row' );
    $central_second_sector_stock_fifth_row      = wp_list_pluck( $wpdb->last_result, 'fifth_row' );
    $central_second_sector_stock_sixth_row      = wp_list_pluck( $wpdb->last_result, 'sixth_row' );
    $central_second_sector_stock_seventh_row    = wp_list_pluck( $wpdb->last_result, 'seventh_row' );
    $central_second_sector_stock_eighth_row     = wp_list_pluck( $wpdb->last_result, 'eighth_row' );

    // акции центрального третьего сектора
    $circus_shapito_central_tritium_sector_stock = "SELECT * FROM $n_circus_shapito_central_tritium_sector_stock WHERE id_event = $circus_shapito_event_id[0]";
    $wpdb->query( $circus_shapito_central_tritium_sector_stock );

    $central_tritium_sector_stock_first_row     = wp_list_pluck( $wpdb->last_result, 'first_row' );
    $central_tritium_sector_stock_second_row    = wp_list_pluck( $wpdb->last_result, 'second_row' );
    $central_tritium_sector_stock_terium_row    = wp_list_pluck( $wpdb->last_result, 'terium_row' );
    $central_tritium_sector_stock_fourth_row    = wp_list_pluck( $wpdb->last_result, 'fourth_row' );
    $central_tritium_sector_stock_fifth_row     = wp_list_pluck( $wpdb->last_result, 'fifth_row' );
    $central_tritium_sector_stock_sixth_row     = wp_list_pluck( $wpdb->last_result, 'sixth_row' );
    $central_tritium_sector_stock_seventh_row   = wp_list_pluck( $wpdb->last_result, 'seventh_row' );
    $central_tritium_sector_stock_eighth_row    = wp_list_pluck( $wpdb->last_result, 'eighth_row' );

    // акции бокового четвертого сектора
    $circus_shapito_lateral_fourth_sector_stock = "SELECT * FROM $n_circus_shapito_lateral_fourth_sector_stock WHERE id_event = $circus_shapito_event_id[0]";
    $wpdb->query( $circus_shapito_lateral_fourth_sector_stock );

    $lateral_fourth_sector_stock_first_row      = wp_list_pluck( $wpdb->last_result, 'first_row' );
    $lateral_fourth_sector_stock_second_row     = wp_list_pluck( $wpdb->last_result, 'second_row' );
    $lateral_fourth_sector_stock_terium_row     = wp_list_pluck( $wpdb->last_result, 'terium_row' );
    $lateral_fourth_sector_stock_fourth_row     = wp_list_pluck( $wpdb->last_result, 'fourth_row' );
    $lateral_fourth_sector_stock_fifth_row      = wp_list_pluck( $wpdb->last_result, 'fifth_row' );
    $lateral_fourth_sector_stock_sixth_row      = wp_list_pluck( $wpdb->last_result, 'sixth_row' );
    $lateral_fourth_sector_stock_seventh_row    = wp_list_pluck( $wpdb->last_result, 'seventh_row' );
    $lateral_fourth_sector_stock_eighth_row     = wp_list_pluck( $wpdb->last_result, 'eighth_row' );

    // акции вип зоны
    $circus_shapito_sector_vip_row_stock = "SELECT * FROM $n_circus_shapito_sector_vip_row_stock WHERE id_event = $circus_shapito_event_id[0]";
    $wpdb->query( $circus_shapito_sector_vip_row_stock );

    $sector_vip_row_stock = wp_list_pluck( $wpdb->last_result, 'vip_row' );

    //переработанные переменные для вывода
    $circus_shapito_event_location      = removeBackSlash($circus_shapito_event_location[0]);
    $circus_shapito_event_date          = removeBackSlash($circus_shapito_event_date[0]);
    $circus_shapito_event_time_start    = removeBackSlash($circus_shapito_event_time_start[0]);

    $central_first_row                  = removeBackSlash($central_first_row[0]);
    $central_second_row                 = removeBackSlash($central_second_row[0]);
    $central_terium_row                 = removeBackSlash($central_terium_row[0]);
    $central_fourth_row                 = removeBackSlash($central_fourth_row[0]);
    $central_fifth_row                  = removeBackSlash($central_fifth_row[0]);
    $central_sixth_row                  = removeBackSlash($central_sixth_row[0]);
    $central_seventh_row                = removeBackSlash($central_seventh_row[0]);
    $central_eighth_row                 = removeBackSlash($central_eighth_row[0]);

    $lateral_first_row                  = removeBackSlash($lateral_first_row[0]);
    $lateral_second_row                 = removeBackSlash($lateral_second_row[0]);
    $lateral_terium_row                 = removeBackSlash($lateral_terium_row[0]);
    $lateral_fourth_row                 = removeBackSlash($lateral_fourth_row[0]);
    $lateral_fifth_row                  = removeBackSlash($lateral_fifth_row[0]);
    $lateral_sixth_row                  = removeBackSlash($lateral_sixth_row[0]);
    $lateral_seventh_row                = removeBackSlash($lateral_seventh_row[0]);
    $lateral_eighth_row                 = removeBackSlash($lateral_eighth_row[0]);
    
    $vip_row                            = removeBackSlash($vip_row[0]);

    function viewStock($idStock, $circus_shapito_stock_value) {
        if($idStock == 0) {
            echo '';
        } else if($idStock == 1) {
            echo $circus_shapito_stock_value[0];
        } else if($idStock == 2) {
            echo $circus_shapito_stock_value[1];
        } else if($idStock == 3) {
            echo $circus_shapito_stock_value[2];
        }
    }
    if(isset($_POST['editDome'])) {
        
        if(isset($_POST['sectorRowPlace']['lateral'])) {

            $d_lateral = $_POST['sectorRowPlace']['lateral'];

            if(isset($d_lateral['first'])) {
                $d_lateral_first = $d_lateral['first'];
                if(isset($d_lateral_first['first'])) {
                    
                    $circus_shapito_lateral_first_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_first_sector` WHERE id = 1";
                    $wpdb->query( $circus_shapito_lateral_first_sector );

                    $circus_shapito_lateral_first_sector_row_first_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_lateral_first['first'] as $elem) {
                        
                        if($elem > 0 && $elem <= $circus_shapito_lateral_first_sector_row_first_num_seats) {
                            $callback_circus_shapito_lateral_first_sector_row_first = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'lateral_first',
                                        'row' => 'first',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_lateral_first['second'])) {
                    $circus_shapito_lateral_first_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_first_sector` WHERE id = 2";
                    $wpdb->query( $circus_shapito_lateral_first_sector );

                    $circus_shapito_lateral_first_sector_row_second_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_lateral_first['second'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_lateral_first_sector_row_second_num_seats) {
                            $callback_circus_shapito_lateral_first_sector_row_second = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'lateral_first',
                                        'row' => 'second',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_lateral_first['terium'])) {
                    $circus_shapito_lateral_first_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_first_sector` WHERE id = 3";
                    $wpdb->query( $circus_shapito_lateral_first_sector );

                    $circus_shapito_lateral_first_sector_row_terium_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_lateral_first['terium'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_lateral_first_sector_row_terium_num_seats) {
                            $callback_circus_shapito_lateral_first_sector_row_terium = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'lateral_first',
                                        'row' => 'terium',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_lateral_first['fourth'])) {
                    $circus_shapito_lateral_first_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_first_sector` WHERE id = 4";
                    $wpdb->query( $circus_shapito_lateral_first_sector );

                    $circus_shapito_lateral_first_sector_row_fourth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_lateral_first['fourth'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_lateral_first_sector_row_fourth_num_seats) {
                            $callback_circus_shapito_lateral_first_sector_row_fourth = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'lateral_first',
                                        'row' => 'fourth',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_lateral_first['fifth'])) {
                    $circus_shapito_lateral_first_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_first_sector` WHERE id = 5";
                    $wpdb->query( $circus_shapito_lateral_first_sector );

                    $circus_shapito_lateral_first_sector_row_fifth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_lateral_first['fifth'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_lateral_first_sector_row_fifth_num_seats) {
                            $callback_circus_shapito_lateral_first_sector_row_fifth = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'lateral_first',
                                        'row' => 'fifth',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_lateral_first['sixth'])) {
                    $circus_shapito_lateral_first_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_first_sector` WHERE id = 6";
                    $wpdb->query( $circus_shapito_lateral_first_sector );

                    $circus_shapito_lateral_first_sector_row_sixth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_lateral_first['sixth'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_lateral_first_sector_row_sixth_num_seats) {
                            $callback_circus_shapito_lateral_first_sector_row_sixth = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'lateral_first',
                                        'row' => 'sixth',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_lateral_first['seventh'])) {
                    $circus_shapito_lateral_first_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_first_sector` WHERE id = 7";
                    $wpdb->query( $circus_shapito_lateral_first_sector );

                    $circus_shapito_lateral_first_sector_row_seventh_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_lateral_first['seventh'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_lateral_first_sector_row_seventh_num_seats) {
                            $callback_circus_shapito_lateral_first_sector_row_seventh = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'lateral_first',
                                        'row' => 'seventh',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_lateral_first['eighth'])) {
                    $circus_shapito_lateral_first_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_first_sector` WHERE id = 8";
                    $wpdb->query( $circus_shapito_lateral_first_sector );

                    $circus_shapito_lateral_first_sector_row_eighth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_lateral_first['eighth'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_lateral_first_sector_row_eighth_num_seats) {
                            $callback_circus_shapito_lateral_first_sector_row_eighth = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'lateral_first',
                                        'row' => 'eighth',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
            }
            if(isset($d_lateral['fourth'])) {
                $d_lateral_fourth = $d_lateral['fourth'];

                if(isset($d_lateral_fourth['first'])) {
                    $circus_shapito_lateral_fourth_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_fourth_sector` WHERE id = 1";
                    $wpdb->query( $circus_shapito_lateral_fourth_sector );

                    $circus_shapito_lateral_fourth_sector_row_first_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_lateral_fourth['first'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_lateral_fourth_sector_row_first_num_seats) {
                            $callback_circus_shapito_lateral_fourth_sector_row_first = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'lateral_fourth',
                                        'row' => 'first',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_lateral_fourth['second'])) {
                    $circus_shapito_lateral_fourth_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_fourth_sector` WHERE id = 2";
                    $wpdb->query( $circus_shapito_lateral_fourth_sector );

                    $circus_shapito_lateral_fourth_sector_row_second_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_lateral_fourth['second'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_lateral_fourth_sector_row_second_num_seats) {
                            $callback_circus_shapito_lateral_fourth_sector_row_second = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'lateral_fourth',
                                        'row' => 'second',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_lateral_fourth['terium'])) {
                    $circus_shapito_lateral_fourth_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_fourth_sector` WHERE id = 3";
                    $wpdb->query( $circus_shapito_lateral_fourth_sector );

                    $circus_shapito_lateral_fourth_sector_row_terium_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_lateral_fourth['terium'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_lateral_fourth_sector_row_terium_num_seats) {
                            $callback_circus_shapito_lateral_fourth_sector_row_terium = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'lateral_fourth',
                                        'row' => 'terium',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_lateral_fourth['fourth'])) {
                    $circus_shapito_lateral_fourth_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_fourth_sector` WHERE id = 4";
                    $wpdb->query( $circus_shapito_lateral_fourth_sector );

                    $circus_shapito_lateral_fourth_sector_row_fourth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_lateral_fourth['fourth'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_lateral_fourth_sector_row_fourth_num_seats) {
                            $callback_circus_shapito_lateral_fourth_sector_row_fourth = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'lateral_fourth',
                                        'row' => 'fourth',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_lateral_fourth['fifth'])) {
                    $circus_shapito_lateral_fourth_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_fourth_sector` WHERE id = 5";
                    $wpdb->query( $circus_shapito_lateral_fourth_sector );

                    $circus_shapito_lateral_fourth_sector_row_fifth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_lateral_fourth['fifth'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_lateral_fourth_sector_row_fifth_num_seats) {
                            $callback_circus_shapito_lateral_fourth_sector_row_fifth = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'lateral_fourth',
                                        'row' => 'fifth',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_lateral_fourth['sixth'])) {
                    $circus_shapito_lateral_fourth_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_fourth_sector` WHERE id = 6";
                    $wpdb->query( $circus_shapito_lateral_fourth_sector );

                    $circus_shapito_lateral_fourth_sector_row_sixth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_lateral_fourth['sixth'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_lateral_fourth_sector_row_sixth_num_seats) {
                            $callback_circus_shapito_lateral_fourth_sector_row_sixth = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'lateral_fourth',
                                        'row' => 'sixth',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_lateral_fourth['seventh'])) {
                    $circus_shapito_lateral_fourth_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_fourth_sector` WHERE id = 7";
                    $wpdb->query( $circus_shapito_lateral_fourth_sector );

                    $circus_shapito_lateral_fourth_sector_row_seventh_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_lateral_fourth['seventh'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_lateral_fourth_sector_row_seventh_num_seats) {
                            $callback_circus_shapito_lateral_fourth_sector_row_seventh = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'lateral_fourth',
                                        'row' => 'seventh',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_lateral_fourth['eighth'])) {
                    $circus_shapito_lateral_fourth_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_lateral_fourth_sector` WHERE id = 8";
                    $wpdb->query( $circus_shapito_lateral_fourth_sector );

                    $circus_shapito_lateral_fourth_sector_row_eighth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_lateral_fourth['eighth'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_lateral_fourth_sector_row_eighth_num_seats) {
                            $callback_circus_shapito_lateral_fourth_sector_row_eighth = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'lateral_fourth',
                                        'row' => 'eighth',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }  
            }
        }

        if(isset($_POST['sectorRowPlace']['central'])) {

            $d_central = $_POST['sectorRowPlace']['central'];

            if(isset($d_central['second'])) {
                $d_central_second = $d_central['second'];
                if(isset($d_central_second['first'])) {
                    $circus_shapito_central_second_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_second_sector` WHERE id = 1";
                    $wpdb->query( $circus_shapito_central_second_sector );

                    $circus_shapito_central_second_sector_row_first_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_central_second['first'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_central_second_sector_row_first_num_seats) {
                            $callback_circus_shapito_central_second_sector_row_first = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'central_second',
                                        'row' => 'first',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }

                }
                if(isset($d_central_second['second'])) {
                    $circus_shapito_central_second_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_second_sector` WHERE id = 2";
                    $wpdb->query( $circus_shapito_central_second_sector );

                    $circus_shapito_central_second_sector_row_second_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_central_second['second'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_central_second_sector_row_second_num_seats) {
                            $callback_circus_shapito_central_second_sector_row_second = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'central_second',
                                        'row' => 'second',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_central_second['terium'])) {
                    $circus_shapito_central_second_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_second_sector` WHERE id = 3";
                    $wpdb->query( $circus_shapito_central_second_sector );

                    $circus_shapito_central_second_sector_row_terium_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_central_second['terium'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_central_second_sector_row_terium_num_seats) {
                            $callback_circus_shapito_central_second_sector_row_terium = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'central_second',
                                        'row' => 'terium',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_central_second['fourth'])) {
                    $circus_shapito_central_second_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_second_sector` WHERE id = 4";
                    $wpdb->query( $circus_shapito_central_second_sector );

                    $circus_shapito_central_second_sector_row_fourth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_central_second['fourth'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_central_second_sector_row_fourth_num_seats) {
                            $callback_circus_shapito_central_second_sector_row_fourth = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'central_second',
                                        'row' => 'fourth',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_central_second['fifth'])) {
                    $circus_shapito_central_second_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_second_sector` WHERE id = 5";
                    $wpdb->query( $circus_shapito_central_second_sector );

                    $circus_shapito_central_second_sector_row_fifth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_central_second['fifth'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_central_second_sector_row_fifth_num_seats) {
                            $callback_circus_shapito_central_second_sector_row_fifth = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'central_second',
                                        'row' => 'fifth',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_central_second['sixth'])) {
                    $circus_shapito_central_second_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_second_sector` WHERE id = 6";
                    $wpdb->query( $circus_shapito_central_second_sector );

                    $circus_shapito_central_second_sector_row_sixth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_central_second['sixth'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_central_second_sector_row_sixth_num_seats) {
                            $callback_circus_shapito_central_second_sector_row_sixth = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'central_second',
                                        'row' => 'sixth',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_central_second['seventh'])) {
                    $circus_shapito_central_second_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_second_sector` WHERE id = 7";
                    $wpdb->query( $circus_shapito_central_second_sector );

                    $circus_shapito_central_second_sector_row_seventh_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_central_second['seventh'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_central_second_sector_row_seventh_num_seats) {
                            $callback_circus_shapito_central_second_sector_row_seventh = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'central_second',
                                        'row' => 'seventh',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_central_second['eighth'])) {
                    $circus_shapito_central_second_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_second_sector` WHERE id = ";
                    $wpdb->query( $circus_shapito_central_second_sector );

                    $circus_shapito_central_second_sector_row_eighth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_central_second['eighth'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_central_second_sector_row_eighth_num_seats) {
                            $callback_circus_shapito_central_second_sector_row_eighth = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'central_second',
                                        'row' => 'eighth',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
            }
            if(isset($d_central['tritium'])) {
                $d_central_tritium = $d_central['tritium'];
                if(isset($d_central_tritium['first'])) {
                    $circus_shapito_central_tritium_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_tritium_sector` WHERE id = 1";
                    $wpdb->query( $circus_shapito_central_tritium_sector );

                    $circus_shapito_central_tritium_sector_row_first_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_central_tritium['first'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_central_tritium_sector_row_first_num_seats) {
                            $callback_circus_shapito_central_tritium_sector_row_first_num_seats = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'central_tritium',
                                        'row' => 'first',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_central_tritium['second'])) {
                    $circus_shapito_central_tritium_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_tritium_sector` WHERE id = 2";
                    $wpdb->query( $circus_shapito_central_tritium_sector );

                    $circus_shapito_central_tritium_sector_row_second_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_central_tritium['second'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_central_tritium_sector_row_second_num_seats) {
                            $callback_circus_shapito_central_tritium_sector_row_second_num_seats = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'central_tritium',
                                        'row' => 'second',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_central_tritium['terium'])) {
                    $circus_shapito_central_tritium_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_tritium_sector` WHERE id = 3";
                    $wpdb->query( $circus_shapito_central_tritium_sector );

                    $circus_shapito_central_tritium_sector_row_terium_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_central_tritium['terium'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_central_tritium_sector_row_terium_num_seats) {
                            $callback_circus_shapito_central_tritium_sector_row_terium_num_seats = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'central_tritium',
                                        'row' => 'terium',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_central_tritium['fourth'])) {
                    $circus_shapito_central_tritium_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_tritium_sector` WHERE id = 4";
                    $wpdb->query( $circus_shapito_central_tritium_sector );

                    $circus_shapito_central_tritium_sector_row_fourth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_central_tritium['fourth'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_central_tritium_sector_row_fourth_num_seats) {
                            $callback_circus_shapito_central_tritium_sector_row_fourth_num_seats = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'central_tritium',
                                        'row' => 'fourth',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_central_tritium['fifth'])) {
                    $circus_shapito_central_tritium_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_tritium_sector` WHERE id = 5";
                    $wpdb->query( $circus_shapito_central_tritium_sector );

                    $circus_shapito_central_tritium_sector_row_fifth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_central_tritium['fifth'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_central_tritium_sector_row_fifth_num_seats) {
                            $callback_circus_shapito_central_tritium_sector_row_fifth_num_seats = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'central_tritium',
                                        'row' => 'fifth',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_central_tritium['sixth'])) {
                    $circus_shapito_central_tritium_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_tritium_sector` WHERE id = 6";
                    $wpdb->query( $circus_shapito_central_tritium_sector );

                    $circus_shapito_central_tritium_sector_row_sixth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_central_tritium['sixth'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_central_tritium_sector_row_sixth_num_seats) {
                            $callback_circus_shapito_central_tritium_sector_row_sixth_num_seats = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'central_tritium',
                                        'row' => 'sixth',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_central_tritium['seventh'])) {
                    $circus_shapito_central_tritium_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_tritium_sector` WHERE id = 7";
                    $wpdb->query( $circus_shapito_central_tritium_sector );

                    $circus_shapito_central_tritium_sector_row_seventh_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_central_tritium['seventh'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_central_tritium_sector_row_seventh_num_seats) {
                            $callback_circus_shapito_central_tritium_sector_row_seventh_num_seats = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'central_tritium',
                                        'row' => 'seventh',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
                if(isset($d_central_tritium['eighth'])) {
                    $circus_shapito_central_tritium_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_central_tritium_sector` WHERE id = 8";
                    $wpdb->query( $circus_shapito_central_tritium_sector );

                    $circus_shapito_central_tritium_sector_row_eighth_num_seats = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
                    foreach($d_central_tritium['eighth'] as $elem) {
                        if($elem > 0 && $elem <= $circus_shapito_central_tritium_sector_row_eighth_num_seats) {
                            $callback_circus_shapito_central_tritium_sector_row_eighth_num_seats = $wpdb->insert(
                                $n_circus_shapito_sold_seats,
                                array ( 'id_event' => $sub_id_name_event, 
                                        'section' => 'central_tritium',
                                        'row' => 'eighth',
                                        'place' => $elem,
                                        'admin' => true
                                    ),
                                array ( '%d', '%s', '%s', '%d', '%s',)
                            );
                        }
                    }
                }
            }
        }

        if(isset($_POST['sectorVipPlace'])) {
            $circus_shapito_vip_sector = "SELECT `number_of_seats` FROM `$n_circus_shapito_vip_sector` WHERE id = 1";
            $wpdb->query( $circus_shapito_vip_sector );

            $circus_shapito_vip_sector_row_num = wp_list_pluck( $wpdb->last_result, 'number_of_seats');
            foreach($_POST['sectorVipPlace'] as $key => $elem) {
                if($elem > 0 && $elem <= $circus_shapito_vip_sector_row_num) {
                    $callback_circus_shapito_vip_sector = $wpdb->insert(
                        $n_circus_shapito_sold_seats,
                        array ( 'id_event' => $sub_id_name_event, 
                                'section' => 'vip',
                                'row' => $key,
                                'place' => $elem,
                                'admin' => true
                            ),
                        array ( '%d', '%s', '%s', '%d', '%s',)
                    );
                }
            }
        }
        
        
       function sectorRowPlaceRemove($arr, $wpdb, $n_circus_shapito_sold_seats) {
            foreach($arr as $value) {
                if(is_array($value)) {
                    sectorRowPlaceRemove($value, $wpdb, $n_circus_shapito_sold_seats);
                }
                else {
                    $elem = explode('_', $value);

                    $section = $elem[0] . '_' .$elem[1];
                    $row = $elem[3];
                    $place = $elem[6];

                    $wpdb -> delete(
                        $n_circus_shapito_sold_seats,
                        array('section' => $section,
                              'row' => $row,
                              'place' => $place),
                        array('%s','%s','%d')
                    );
                }
            }
        }
        function sectorVipPlaceRemove($arr, $wpdb, $n_circus_shapito_sold_seats) {
            foreach($arr as $value) {
                if(is_array($value)) {
                    sectorVipPlaceRemove($value, $wpdb, $n_circus_shapito_sold_seats);
                }
                else {
                    $elem = explode('_', $value);
                    
                    $row = $elem[1];
                    $place = $elem[3];

                    $wpdb -> delete(
                        $n_circus_shapito_sold_seats,
                        array('section' => 'vip',
                              'row' => $row,
                              'place' => $place),
                        array('%s','%s','%d')
                    );
                }
            }
        }
        if(isset($_POST['sectorRowPlaceRemove'])) {
            sectorRowPlaceRemove($_POST['sectorRowPlaceRemove'], $wpdb, $n_circus_shapito_sold_seats);
        }
        if(isset($_POST['sectorVipPlaceRemove'])) {
            sectorVipPlaceRemove($_POST['sectorVipPlaceRemove'], $wpdb, $n_circus_shapito_sold_seats);
        }
    }

    $circus_shapito_sold_seats = "SELECT * FROM $n_circus_shapito_sold_seats WHERE id_event = $circus_shapito_event_id[0] AND admin = 1";
    $wpdb->query( $circus_shapito_sold_seats );

    $circus_shapito_sold_seats_sections = wp_list_pluck( $wpdb->last_result, 'section' );
    $circus_shapito_sold_seats_rows     = wp_list_pluck( $wpdb->last_result, 'row' );
    $circus_shapito_sold_seats_places   = wp_list_pluck( $wpdb->last_result, 'place' );
?>

<div class="circus_container">
    <div class="circus_header">
        <h2>Редактировать мероприятие № <?= $sub_id_name_event?></h2>
    </div>
    <div class="circus_body">
    <?php
            if(isset($_POST['button'])) {
                if(!empty($errorMessage)) {
                    echo '<div class="message_status_error success_message">'.$errorMessage.'</div>';
                } else if(!empty($successMessage)) {
                    echo '<div class="message_status_success success_message">'.$successMessage.'</div>';
                }
            }
        ?>
        <form action="#" method="POST">
            <div class="circus_body_edit_event_block">
                <h3>дата и время</h3>
                <div class="inputTime"> 
                    <div>Дата *<input type="date" required name="date_1" value="<?= $circus_shapito_event_date ?>"></div>
                    <div>Время начала *<input type="time" required name="timeStart_1" value="<?= $circus_shapito_event_time_start ?>"></div>
                </div>
            </div>

            <div class="circus_body_edit_event_block">
                <h3>Цены</h3>
                <div>
                    <h4>Центральные сектора</h4>
                    <div class="input_price">
                        <div>1</div>
                        <div>2</div>
                        <div>3</div>
                        <div>4</div>
                        <div>5</div>
                        <div>6</div>
                        <div>7</div>
                        <div>8</div>
                    </div>
                    <div class="input_price">
                        <input type="number" class="edit_price_row" name="central_first_row" value="<?= $central_first_row ?>" required>
                        <input type="number" class="edit_price_row" name="central_second_row" value="<?= $central_second_row ?>" required>
                        <input type="number" class="edit_price_row" name="central_terium_row" value="<?= $central_terium_row ?>" required>
                        <input type="number" class="edit_price_row" name="central_fourth_row" value="<?= $central_fourth_row ?>" required>
                        <input type="number" class="edit_price_row" name="central_fifth_row" value="<?= $central_fifth_row ?>" required>
                        <input type="number" class="edit_price_row" name="central_sixth_row" value="<?= $central_sixth_row ?>" required>
                        <input type="number" class="edit_price_row" name="central_seventh_row" value="<?= $central_seventh_row ?>" required>
                        <input type="number" class="edit_price_row" name="central_eighth_row" value="<?= $central_eighth_row ?>" required>
                    </div>
                    <h4>Боковые сектора</h4>
                    <div class="input_price">
                        <div>1</div>
                        <div>2</div>
                        <div>3</div>
                        <div>4</div>
                        <div>5</div>
                        <div>6</div>
                        <div>7</div>
                        <div>8</div>
                    </div>
                    <div class="input_price">
                        <input type="number" class="edit_price_row" name="lateral_first_row" value="<?= $lateral_first_row ?>" required>
                        <input type="number" class="edit_price_row" name="lateral_second_row" value="<?= $lateral_second_row ?>" required>
                        <input type="number" class="edit_price_row" name="lateral_terium_row" value="<?= $lateral_terium_row ?>" required>
                        <input type="number" class="edit_price_row" name="lateral_fourth_row" value="<?= $lateral_fourth_row ?>" required>
                        <input type="number" class="edit_price_row" name="lateral_fifth_row" value="<?= $lateral_fifth_row ?>" required>
                        <input type="number" class="edit_price_row" name="lateral_sixth_row" value="<?= $lateral_sixth_row ?>" required>
                        <input type="number" class="edit_price_row" name="lateral_seventh_row" value="<?= $lateral_seventh_row ?>" required>
                        <input type="number" class="edit_price_row" name="lateral_eighth_row" value="<?= $lateral_eighth_row ?>" required>
                    </div>
                    <h4>Вип зона</h4>
                    <input type="number" class="edit_price_row" name="vip_price_row" value="<?= $vip_row ?>">
                </div>
            </div>

            <div class="circus_body_edit_event_block">
                <h3>Акции</h3>
                <div>
                    <h4>Боковой первый сектор</h4>
                    <div class="select_stock">
                        <div>1</div>
                        <div>2</div>
                        <div>3</div>
                        <div>4</div>
                        <div>5</div>
                        <div>6</div>
                        <div>7</div>
                        <div>8</div>
                    </div>
                        <select name="lateral_first_stock_first_row" >
                            <option value="<?=$lateral_first_sector_stock_first_row[0]?>" hidden>
                                <?php echo viewStock($lateral_first_sector_stock_first_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="lateral_first_stock_second_row" >
                            <option value="<?=$lateral_first_sector_stock_second_row[0]?>" hidden>
                                <?php echo viewStock($lateral_first_sector_stock_second_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="lateral_first_stock_terium_row" >
                            <option value="<?=$lateral_first_sector_stock_terium_row[0]?>" hidden>
                                <?php echo viewStock($lateral_first_sector_stock_terium_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="lateral_first_stock_fourth_row" >
                            <option value="<?=$lateral_first_sector_stock_fourth_row[0]?>" hidden>
                                <?php echo viewStock($lateral_first_sector_stock_fourth_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="lateral_first_stock_fifth_row" >
                            <option value="<?=$lateral_first_sector_stock_fifth_row[0]?>" hidden>
                                <?php echo viewStock($lateral_first_sector_stock_fifth_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="lateral_first_stock_sixth_row" >
                            <option value="<?=$lateral_first_sector_stock_sixth_row[0]?>" hidden>
                                <?php echo viewStock($lateral_first_sector_stock_sixth_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="lateral_first_stock_seventh_row" >
                            <option value="<?=$lateral_first_sector_stock_seventh_row[0]?>" hidden>
                                <?php echo viewStock($lateral_first_sector_stock_seventh_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="lateral_first_stock_eighth_row" >
                            <option value="<?=$lateral_first_sector_stock_eighth_row[0]?>" hidden>
                                <?php echo viewStock($lateral_first_sector_stock_eighth_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                    <h4>Центральный второй сектор</h4>
                    <div class="select_stock">
                        <div>1</div>
                        <div>2</div>
                        <div>3</div>
                        <div>4</div>
                        <div>5</div>
                        <div>6</div>
                        <div>7</div>
                        <div>8</div>
                    </div>
                        <select name="central_second_stock_first_row" >
                            <option value="<?=$central_second_sector_stock_first_row[0]?>" hidden>
                                <?php echo viewStock($central_second_sector_stock_first_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="central_second_stock_second_row" >
                            <option value="<?=$central_second_sector_stock_second_row[0]?>" hidden>
                                <?php echo viewStock($central_second_sector_stock_second_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="central_second_stock_terium_row" >
                            <option value="<?=$central_second_sector_stock_terium_row[0]?>" hidden>
                                <?php echo viewStock($central_second_sector_stock_terium_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="central_second_stock_fourth_row" >
                            <option value="<?=$central_second_sector_stock_fourth_row[0]?>" hidden>
                                <?php echo viewStock($central_second_sector_stock_fourth_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="central_second_stock_fifth_row" >
                            <option value="<?=$central_second_sector_stock_fifth_row[0]?>" hidden>
                                <?php echo viewStock($central_second_sector_stock_fifth_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="central_second_stock_sixth_row" >
                            <option value="<?=$central_second_sector_stock_sixth_row[0]?>" hidden>
                                <?php echo viewStock($central_second_sector_stock_sixth_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="central_second_stock_seventh_row" >
                            <option value="<?=$central_second_sector_stock_seventh_row[0]?>" hidden>
                                <?php echo viewStock($central_second_sector_stock_seventh_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="central_second_stock_eighth_row" >
                            <option value="<?=$central_second_sector_stock_eighth_row[0]?>" hidden>
                                <?php echo viewStock($central_second_sector_stock_eighth_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                    <h4>Центральный третий сектор</h4>
                    <div class="select_stock">
                        <div>1</div>
                        <div>2</div>
                        <div>3</div>
                        <div>4</div>
                        <div>5</div>
                        <div>6</div>
                        <div>7</div>
                        <div>8</div>
                    </div>
                        <select name="central_tritium_stock_first_row" >
                            <option value="<?=$central_tritium_sector_stock_first_row[0]?>" hidden>
                                <?php echo viewStock($central_tritium_sector_stock_first_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="central_tritium_stock_second_row" >
                            <option value="<?=$central_tritium_sector_stock_second_row[0]?>" hidden>
                                <?php echo viewStock($central_tritium_sector_stock_second_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="central_tritium_stock_terium_row" >
                            <option value="<?=$central_tritium_sector_stock_terium_row[0]?>" hidden>
                                <?php echo viewStock($central_tritium_sector_stock_terium_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="central_tritium_stock_fourth_row" >
                            <option value="<?=$central_tritium_sector_stock_fourth_row[0]?>" hidden>
                                <?php echo viewStock($central_tritium_sector_stock_fourth_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="central_tritium_stock_fifth_row" >
                            <option value="<?=$central_tritium_sector_stock_fifth_row[0]?>" hidden>
                                <?php echo viewStock($central_tritium_sector_stock_fifth_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="central_tritium_stock_sixth_row" >
                            <option value="<?=$central_tritium_sector_stock_sixth_row[0]?>" hidden>
                                <?php echo viewStock($central_tritium_sector_stock_sixth_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="central_tritium_stock_seventh_row" >
                            <option value="<?=$central_tritium_sector_stock_seventh_row[0]?>" hidden>
                                <?php echo viewStock($central_tritium_sector_stock_seventh_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="central_tritium_stock_eighth_row" >
                            <option value="<?=$central_tritium_sector_stock_eighth_row[0]?>" hidden>
                                <?php echo viewStock($central_tritium_sector_stock_eighth_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                    <h4>Боковой четвертый сектор</h4>
                    <div class="select_stock">
                        <div>1</div>
                        <div>2</div>
                        <div>3</div>
                        <div>4</div>
                        <div>5</div>
                        <div>6</div>
                        <div>7</div>
                        <div>8</div>
                    </div>
                        <select name="lateral_fourth_stock_first_row" >
                            <option value="<?=$lateral_fourth_sector_stock_first_row[0]?>" hidden>
                                <?php echo viewStock($lateral_fourth_sector_stock_first_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="lateral_fourth_stock_second_row" >
                            <option value="<?=$lateral_fourth_sector_stock_second_row[0]?>" hidden>
                                <?php echo viewStock($lateral_fourth_sector_stock_second_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="lateral_fourth_stock_terium_row" >
                            <option value="<?=$lateral_fourth_sector_stock_terium_row[0]?>" hidden>
                                <?php echo viewStock($lateral_fourth_sector_stock_terium_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="lateral_fourth_stock_fourth_row" >
                            <option value="<?=$lateral_fourth_sector_stock_fourth_row[0]?>" hidden>
                                <?php echo viewStock($lateral_fourth_sector_stock_fourth_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="lateral_fourth_stock_fifth_row" >
                            <option value="<?=$lateral_fourth_sector_stock_fifth_row[0]?>" hidden>
                                <?php echo viewStock($lateral_fourth_sector_stock_fifth_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="lateral_fourth_stock_sixth_row" >
                            <option value="<?=$lateral_fourth_sector_stock_sixth_row[0]?>" hidden>
                                <?php echo viewStock($lateral_fourth_sector_stock_sixth_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="lateral_fourth_stock_seventh_row" >
                            <option value="<?=$lateral_fourth_sector_stock_seventh_row[0]?>" hidden>
                                <?php echo viewStock($lateral_fourth_sector_stock_seventh_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <select name="lateral_fourth_stock_eighth_row" >
                            <option value="<?=$lateral_fourth_sector_stock_eighth_row[0]?>" hidden>
                                <?php echo viewStock($lateral_fourth_sector_stock_eighth_row[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                        <h4>Вип зона</h4>
                        <select name="vip_row_stock" >
                            <option value="<?=$sector_vip_row_stock[0]?>" hidden>
                                <?php echo viewStock($sector_vip_row_stock[0], $circus_shapito_stock_value) ?>
                            </option>
                            <option></option>
                            <option value="<?= $circus_shapito_stock_id[0] ?>"><?= $circus_shapito_stock_value[0] ?></option>
                            <option value="<?= $circus_shapito_stock_id[1] ?>"><?= $circus_shapito_stock_value[1] ?></option>
                            <option value="<?= $circus_shapito_stock_id[2] ?>"><?= $circus_shapito_stock_value[2] ?></option>
                        </select>
                </div>
            </div>
            
            <input type="submit" name="button" value="Обновить данные" class="button">
        </form>
    </div>
</div>
<?php 
    } else {
        ?>
<div class="circus_container ">
    <div class="circus_header">
        <h3 style="color:red">Запись не обнаружена</h2>
    </div>
    <div class="return_to_home">
        <div class="return_to_home_header">
            <h3>Добавте новую запись или вернитесь к просмотру всех записей</h3>
        </div>
        <div>
        <a href="?page=circus_shapito_admin_add_new_record"><button class="button_edit_event_group">Добавить новую запись</button></a>
        <a href="?page=circus_shapito_admin_show_all_record"><button class="button_edit_event_group">Просмотреть все записи</button></a>
        </div>
    </div>
</div>
        <?php
    }
    echo '<div>';
    include('dome/dome.php');
    ?>
    </div>