
$(function() {
	$('.sortableContainer').sortable({
        axis: 'y',
        opacity: 0.7,
        handle: 'span',
        update: function(event, ui) {
            var list_sortable = $(this).sortable('toArray').toString();
    		// change order in the database using Ajax
            $.ajax({
                url: 'set_order.php',
                type: 'POST',
                data: {list_order:list_sortable,
                tablevar:$('#tablevar').val(),
				tempvar:$('#tempvar').val(),
				rowsvar:$('#rowsvar').val(),
				idvar:$('#idvar').val()},
                success: function(data) {
                    // console.log(data);
                }
            });
			// add ts=true to URL and to avoid duplicated parameter
			var url=window.location.href,
			separator = (url.indexOf("?")===-1)?"?":"&",
			newParam=separator + "sort=true";
			newUrl=url.replace(newParam,"");
			newUrl+=newParam;
			window.location.href =newUrl;
        }
    }); // fin sortable


    $('.sortableContainerRows').sortable({
        axis: 'y',
        opacity: 0.7,
        handle: 'span',
        update: function(event, ui) {
            var list_sortable = $(this).sortable('toArray').toString();
    		// change order in the database using Ajax
            $.ajax({
                url: 'set_order_rows.php',
                type: 'POST',
                data: {list_order:list_sortable,
                tablevar:$('#tablevar').val(),
				tempvar:$('#tempvar').val(),
				rowsvar:$('#rowsvar').val(),
				cellvar:$('#cellvar').val(),
				numfieldsvar:$('#numfieldsvar').val(),
				idvar:$('#idvar').val()},
                success: function(data) {
                    // console.log(data);
                }
            });
			// add ts=true to URL and to avoid duplicated parameter
			var url=window.location.href,
			separator = (url.indexOf("?")===-1)?"?":"&",
			newParam=separator + "sort=true";
			newUrl=url.replace(newParam,"");
			newUrl+=newParam;
			window.location.href =newUrl;
        }
    }); // fin sortable

    $('.sortableContainerCols').sortable({
        axis: 'x',
        opacity: 0.7,
        handle: 'span',
        update: function(event, ui) {
            var list_sortable = $(this).sortable('toArray').toString();
            // change order in the database using Ajax
            $.ajax({
                url: 'set_order_cols.php',
                type: 'POST',
                data: {list_order:list_sortable,
                tablevarcols:$('#tablevarcols').val(),
                tempvarcols:$('#tempvarcols').val(),
                rowsvarcols:$('#rowsvarcols').val(),
                cellvarcols:$('#cellvarcols').val(),
                idvarcols:$('#idvarcols').val()},
                success: function(data) {
                    // console.log(data);
                }
            });
            // add ts=true to URL and to avoid duplicated parameter
            var url=window.location.href,
            separator = (url.indexOf("?")===-1)?"?":"&",
            newParam=separator + "sort=true";
            newUrl=url.replace(newParam,"");
            newUrl+=newParam;
            window.location.href =newUrl;
        }
    }); // fin sortable

     $('.sortableContainerImages').sortable({
        axis: 'xy',
        opacity: 0.7,
        handle: 'span',
        update: function(event, ui) {
            var list_sortable = $(this).sortable('toArray').toString();
            console.log($('#cellvarcols').val());
            console.log($('#idvarcols').val());
            // change order in the database using Ajax
            $.ajax({
                url: '../core/set_order_images.php',
                type: 'POST',
                data: {list_order:list_sortable,
                tablevarcols:$('#tablevarcols').val(),
                cellvarcols:$('#cellvarcols').val(),
                idvarcols:$('#idvarcols').val()},
                success: function(data) {
                    // console.log(data);
                    location.reload();
                }
            });
        }
    }); // fin sortable

    $('.sortableContainerPages, .sortableContainerSubPages').sortable({
        axis: 'y',
        opacity: 0.7,
        handle: '.sortable-handler',
        update: function(event, ui) {
            var list_sortable = $(this).sortable('toArray', {attribute:'data-pageid'}).toString();
            // console.log(list_sortable);
            // change order in the database using Ajax
            $.ajax({
                url: 'core/pages_order.php',
                type: 'POST',
                data: {pages_order:list_sortable},
                success: function(data) {
                    // location.reload();
                    $('.sortableContainerPages, .sortableContainerSubPages').fadeOut(50).fadeIn(50)
                }
            });
            // location.reload();
        }
    }); // fin sortable


    $('.sortableContainerRecords').sortable({
        axis: 'y',
        opacity: 0.7,
        handle: '.sortable-handler',
        update: function(event, ui) {
            var list_sortable = $(this).sortable('toArray', {attribute:'data-pageid'}).toString();
            // console.log(list_sortable);
            // change order in the database using Ajax
            $.ajax({
                url: 'core/records_order.php',
                type: 'POST',
                data: {records_order:list_sortable},
                success: function(data) {
                    // location.reload();
                    $('.sortableContainerRecords').fadeOut(50).fadeIn(50)
                }
            });
        }
    }); // fin sortable

    $('.sortableContainerSections').sortable({
        axis: 'y',
        opacity: 0.7,
        handle: '.sortable-handler',
        update: function(event, ui) {
            var list_sortable = $(this).sortable('toArray', {attribute:'data-pageid'}).toString();
            $.ajax({
                url: 'sections_order.php',
                type: 'POST',
                data: {sections_order:list_sortable},
                success: function(data) {
                    // location.reload();
                    $('.sortableContainerSections').fadeOut(50).fadeIn(50)
                }
            });
        }
    });


    $('.sortableContainerRecsAtt').sortable({
        axis: 'y',
        opacity: 0.7,
        handle: '.recordRowContainer',
        update: function(event, ui) {
            var list_sortable = $(this).sortable('toArray', {attribute:'data-pageid'}).toString();
            // console.log(list_sortable);
            // change order in the database using Ajax
            $.ajax({
                url: 'recs_att_order.php',
                type: 'POST',
                data: {records_order:list_sortable},
                success: function(data) {
                    location.reload();
                }
            });
        }
    }); // fin sortable


    $('.sortableContainerFieldLists').sortable({
        axis: 'y',
        opacity: 0.7,
        handle: '.fieldListRowContainer',
        update: function(event, ui) {
            var list_sortable = $(this).sortable('toArray', {attribute:'data-fieldName'}).toString();
            var listID = $('.sortableContainerFieldLists').attr("data-listID");
            // change order in the database using Ajax
            $.ajax({
                url: 'core/field_lists_order.php',
                type: 'POST',
                data: {records_order:list_sortable,List_ID:listID},
                success: function(data) {
                    // location.reload();
                    $('.sortableContainerFieldLists').fadeOut(50).fadeIn(50)
                }
            });
        }
    }); // fin sortable

        $('.sortableContainerRatRecords').sortable({
        axis: 'y',
        opacity: 0.7,
        handle: '.sortable-handler',
        update: function(event, ui) {
            var list_sortable = $(this).sortable('toArray', {attribute:'data-pageid'}).toString();
            // console.log(list_sortable);
            // change order in the database using Ajax
            $.ajax({
                url: '../core/rat_order.php',
                type: 'POST',
                data: {records_order:list_sortable},
                success: function(data) {
                    // location.reload();
                    $('.sortableContainerRatRecords').fadeOut(50).fadeIn(50)
                }
            });
        }
    }); // fin sortable

});