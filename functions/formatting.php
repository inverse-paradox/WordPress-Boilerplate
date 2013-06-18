<?php


/* ===============================================================
==================================================================

I.  formatting.php function list

    1.  trim_to_length($content, $length, $end = '&hellip;')
        - trim string to a specific length

    2.  format_phone_number($phone, $style = null)
        - format phone numbers nicely

    3.  format_street_address($address, $style = null)
        - format street address nicely

    4.  ip_is_subpage($id)
        - find out if a page is a child page

    5.  get_youtube_code($page_url, $width, $height)
        - get youtube video info based on the main URL, returns an array

    6.  pagination($pages = '', $range = 2, $sep_first = 'First', $sep_prev = '<', $sep_next = '>', $sep_last = 'Last')
        - custom pagination.

==================================================================
=============================================================== */



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

/* ===============================================================
    find out if a page is a child page
=============================================================== */

function ip_is_subpage($id) {
    global $post;
    $parentArray = get_post_ancestors($post->ID);
    $pageParent = $parentArray[0];
    if ($post->post_parent) :
        $parentArray = get_post_ancestors($post->ID);
        $pageParent = $parentArray[0];
    else :
        $pageParent = null;
    endif;
    if ($pageParent == $id) :
        return true;
    else :
        return false;
    endif;
}

/* ===============================================================
    get youtube video info based on the main URL, returns an array
=============================================================== */

function get_youtube_code($page_url, $width, $height) {
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, "http://www.youtube.com/oembed?url=".urlencode($page_url)."?wmode=opaque&format=json&maxwidth=" . $width . "&maxheight=" . $height);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch); 
    curl_close($ch);
    
    $embed_code = json_decode($response, true);
    
    return $embed_code;
}

/* ===============================================================
    custom pagination
=============================================================== */

function pagination($pages = '', $range = 2, $sep_first = 'First', $sep_prev = '<', $sep_next = '>', $sep_last = 'Last')
{  
     $showitems = ($range * 2)+1;
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '') :
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages) :
             $pages = 1;
         endif;
     endif;
 
     if(1 != $pages) :
         echo "<div class=\"pagination clearfix\"><span class=\"pages\">Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>".$sep_first."</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>".$sep_prev."</a>";
 
         for ($i=1; $i <= $pages; $i++) :
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) :
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             endif;
         endfor;
 
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">".$sep_next."</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>".$sep_last."</a>";
         echo "</div>\n";
     endif;
}

?>