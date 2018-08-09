<?php
/**
 * Gravity Forms plugin functions
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */

add_filter( 'gform_field_value_gender', 'clubsoda_populate_gffield_gender' );
function clubsoda_populate_gffield_gender( $value ) {
    $user_id = get_current_user_id();
    $value = get_user_meta($user_id, 'gender', true);
    return $value;
}

add_filter( 'gform_field_value__clubsoda_goal', 'clubsoda_populate_gffield_clubsoda_goal' );
function clubsoda_populate_gffield_clubsoda_goal( $value ) {
    $user_id = get_current_user_id();
    $value = get_user_meta($user_id, '_clubsoda_goal', true);
    return $value;
}

add_filter( 'gform_field_value_year_of_birth', 'clubsoda_populate_gffield_year_of_birth' );
function clubsoda_populate_gffield_birth_date( $value ) {
    $user_id = get_current_user_id();
    $value = get_user_meta($user_id, 'year_of_birth', true);
    return $value;
}

add_filter( 'gform_field_value_country', 'clubsoda_populate_gffield_country' );
function clubsoda_populate_gffield_country( $value ) {
    $user_id = get_current_user_id();
    $value = get_user_meta($user_id, 'country', true);
    return $value;
}

add_filter( 'gform_field_value_birth_date', 'clubsoda_populate_gffield_user_postcode' );
function clubsoda_populate_gffield_user_postcode( $value ) {
    $user_id = get_current_user_id();
    $value = get_user_meta($user_id, 'user_postcode', true);
    return $value;
}

add_filter( 'gform_field_value_description', 'clubsoda_populate_gffield_description' );
function clubsoda_populate_gffield_description( $value ) {
    $user_id = get_current_user_id();
    $value = get_user_meta($user_id, 'description', true);
    return $value;
}