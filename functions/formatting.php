<?php
/* ===========================================================
    trim string to a specific length
=========================================================== */
function trim_to_length($content, $length, $end = '&hellip;')
{
    if ( $length >= strlen( $content ) ) {
        return $content;
    } else {
        $trimmed = substr( $content, 0, $length );
        $spacepos = strrpos( $trimmed, ' ' );
        $content = substr( $trimmed, 0, $spacepos );
        $content .= $end;
        return $content;
    }
}

/* ===========================================================
    format phone numbers nicely
=========================================================== */
function format_phone_number($phone, $style = null)
{
    $phone = preg_replace('/[^0-9]/', '', $phone);
    $ac = substr($phone, 0, 3);
    $f3 = substr($phone, 3, 3);
    $l4 = substr($phone, 6, 4);
    switch ($style) {
        case '.':
            $phone = "$ac.$f3.$l4";
            break;
        case '-':
            $phone = "$ac-$f3-$l4";
            break;
        case 'link':
            $phone = "+1$ac$f3$l4";
            break;
        default:
            $phone = "($ac) $f3-$l4";
    }
    return $phone;
}

/* ===========================================================
    format street address nicely
    @param array $address Array containing address information
        - street_address
        - street_address_2
        - city
        - state
        - zip
        - country
    @param string $style Single or multi-line
        - multi: multi-line, default
        - single: single-line

=========================================================== */
function format_street_address($address, $style = null)
{
    if ($style == null) $style = 'multi';
    $address_line_1 = '';
    $address_line_2 = '';
    $address_line_3 = '';
    $address_line_4 = '';
    if (isset($address['street_address']) && trim($address['street_address']) != '') {
        $address_line_1 = trim($address['street_address']);
    }
    if (isset($address['street_address_2']) && trim($address['street_address_2']) != '') {
        $address_line_2 = trim($address['street_address_2']);
    }
    if (isset($address['city']) && trim($address['city']) != '') {
        $address_line_3 = trim($address['city']);
    }
    if (isset($address['state']) && trim($address['state']) != '') {
        if ($address_line_3) {
            $address_line_3 .= ', ';
        }
        $address_line_3 .= trim($address['state']);
    }
    if (isset($address['zip']) && trim($address['zip']) != '') {
        if ($address_line_3) {
            $address_line_3 .= ' ';
        }
        $address_line_3 .= trim($address['zip']);
    }
    if (isset($address['country']) && trim($address['country']) != '') {
        $address_line_4 = trim($address['country']);
    }
    $final_address = '';
    if ($style == 'multi') {
        $seperator = '<br />';
    } else {
        $seperator = ', ';
    }
    $final_address = $address_line_1;
    if ($address_line_2) {
        if ($final_address) {
            $final_address .= $seperator;
        }
        $final_address .= $address_line_2;
    }
    if ($address_line_3) {
        if ($final_address) {
            $final_address .= $seperator;
        }
        $final_address .= $address_line_3;
    }
    if ($address_line_4) {
        if ($final_address) {
            $final_address .= $seperator;
        }
        $final_address .= $address_line_4;
    }
    return $final_address;
}

/* ===========================================================
    get google maps url
    @param array $address Array containing address information
        - street_address
        - city
        - state
        - zip
        - country
=========================================================== */
function get_google_maps_link($address)
{
    $formatted_address = str_replace(' ', '+', format_street_address($address, 'single'));
    $link = 'https://maps.google.com/maps?t=m&amp;z=16&amp;daddr=' . $formatted_address;
    return $link;
}
?>