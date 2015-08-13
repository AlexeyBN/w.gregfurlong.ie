/**
 * Created by KHANH on 4/23/2015.
 */

jQuery(document).ready(function($){
    if( $('.pricing_wrap .pricing_table').width() < 220 ){
        var pricing_ul_h = $('.pricing_wrap .pricing_table.price_platinum ul').height();
        var pricing_table_ul_h = pricing_ul_h+120 +23 ;
        var pricing_table_platinum_ul_h = pricing_ul_h+120 ;
        $('.pricing_wrap .pricing_table ul').css({height: pricing_table_ul_h+'px'});
        $('.pricing_wrap .price_platinum ul').css({height: pricing_table_platinum_ul_h+'px'});
    }
    var top_base_w = $('.pricing_wrap .pricing_table .top-base').width();
    var top_base_discount_l = (top_base_w - 90)/2;
    $('.pricing_wrap .pricing_table .top-base .discount').css({left: top_base_discount_l+'px'});
});
