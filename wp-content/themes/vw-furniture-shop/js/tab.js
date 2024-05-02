function vw_furniture_shop_open_tab(evt, cityName) {
    var vw_furniture_shop_i, vw_furniture_shop_tabcontent, vw_furniture_shop_tablinks;
    vw_furniture_shop_tabcontent = document.getElementsByClassName("tabcontent");
    for (vw_furniture_shop_i = 0; vw_furniture_shop_i < vw_furniture_shop_tabcontent.length; vw_furniture_shop_i++) {
        vw_furniture_shop_tabcontent[vw_furniture_shop_i].style.display = "none";
    }
    vw_furniture_shop_tablinks = document.getElementsByClassName("tablinks");
    for (vw_furniture_shop_i = 0; vw_furniture_shop_i < vw_furniture_shop_tablinks.length; vw_furniture_shop_i++) {
        vw_furniture_shop_tablinks[vw_furniture_shop_i].className = vw_furniture_shop_tablinks[vw_furniture_shop_i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

jQuery(document).ready(function () {
    jQuery( ".tab-sec .tablinks" ).first().addClass( "active" );
});