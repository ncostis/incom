<?php
    if($GetTitle["Page_GenVar"]=="pixel_script_product"){
        ?>
        <!-- Sojern Tag v6_js, Pixel Version: 1 -->
        <script>
        (function () {
        /* Please fill the following values. */
        var params = {
        hd1: "", /* Check In Date. Format yyyy-mm-dd. Ex: 2015-02-14 */
        hd2: "", /* Check Out Date. Format yyyy-mm-dd. Ex: 2015-02-14 */
        hc1: "", /* Destination City */
        hs1: "", /* Destination State or Region */
        hr: "", /* Number of Rooms */
        t: "" /* Number of Travelers */
        };
        
        /* Please do not modify the below code. */
        var cid = [];
        var paramsArr = [];
        var cidParams = [];
        var pl = document.createElement('script');
        var defaultParams = {"vid":"hot","et":"hpr"};
        for(key in defaultParams) { params[key] = defaultParams[key]; };
        for(key in cidParams) { cid.push(params[cidParams[key]]); };
        params.cid = cid.join('|');
        for(key in params) { paramsArr.push(key + '=' + encodeURIComponent(params[key])) };
        pl.type = 'text/javascript';
        pl.async = true;
        pl.src = 'https://beacon.sojern.com/pixel/p/295901?f_v=v6_js&p_v=1&' + paramsArr.join('&');
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(pl);
        })();
        </script>
        <!-- End Sojern Tag -->

    <?php }
?>