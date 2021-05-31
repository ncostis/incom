<script type="text/javascript">
    /***********************************************
     * Drop Down Date select script- by JavaScriptKit.com
     * This notice MUST stay intact for use
     * Visit JavaScript Kit at http://www.javascriptkit.com/ for this script and more
     ***********************************************/
        <?php if ($Lang == 'el') {  ?>
    var monthtext = ['Ιανουάριος', 'Φεβρουάριος', 'Μάρτιος', 'Απρίλιος', 'Μάιος', 'Ιούνιος', 'Ιούλιος', 'Αύγουστος', 'Σεπτέμβριος', 'Οκτώβριος', 'Νοέμβριος', 'Δεκέμβριος'];
    <?php } else { ?>
    var monthtext = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    <?php } ?>

    function populatedropdown(dayfield, monthfield, yearfield) {
        var today = new Date()
        var dayfield = document.getElementById(dayfield)
        var monthfield = document.getElementById(monthfield)
        var yearfield = document.getElementById(yearfield)
        for (var i = 0; i < 32; i++)
            dayfield.options[i] = new Option(i)
        /* dayfield.options[i]=new Option(i, i+1) */
        dayfield.options[today.getDate()] = new Option(today.getDate(), today.getDate(), true, true) //select today's day
        for (var m = 0; m < 12; m++)
            monthfield.options[m] = new Option(monthtext[m], monthtext[m])
        monthfield.options[today.getMonth()] = new Option(monthtext[today.getMonth()], monthtext[today.getMonth()], true, true) //select today's month
        var thisyear = today.getFullYear()
        for (var y = 0; y < 2; y++) {
            yearfield.options[y] = new Option(thisyear, thisyear)
            thisyear += 1
        }
        yearfield.options[0] = new Option(today.getFullYear(), today.getFullYear(), true, true) //select today's year
    }
</script>