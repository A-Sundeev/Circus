<?php 
    wp_register_style( 'calendary_css', get_template_directory_uri() . '/includes/components/calendary/styles/style.css', array(), '1.2', 'screen');
    wp_enqueue_style( 'calendary_css');
    
?>    
    <div id="calendary_wrapper">
        <div id="section_year"></div>
        <div id="section_month">
            <div class="prev_month"><button></button></div>
            <div class="current_month"></div>
            <div class="next_month"><button></button></div>
        </div>
        <div id="section_calendary">
            <div id="days_of_week">
                <div class="days_of_week_item">Пн</div>
                <div class="days_of_week_item">Вт</div>
                <div class="days_of_week_item">Ср</div>
                <div class="days_of_week_item">Чт</div>
                <div class="days_of_week_item">Пт</div>
                <div class="days_of_week_item">Сб</div>
                <div class="days_of_week_item">Вс</div>
            </div>
            <div id="days_of_month"></div>
        </div>
    </div>
    <?php
    wp_register_script( 'calendary_js', get_template_directory_uri() . '/includes/components/calendary/scripts/calendary.js', array(), '1.0', true);
	wp_enqueue_script( 'calendary_js');
    date_default_timezone_set('Europe/Moscow');
