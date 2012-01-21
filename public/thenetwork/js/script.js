/**
 * ------------------------------------------------------
 * PAGE SCRIPT
 * -----------------------------------------------------
 */
$(function () {
    // Notification Close Button
    $('.close-notification').click(function () {
        $(this).parents('section[role=notifier]').fadeTo(350, 0, function () {
            $(this).slideUp(600).remove();
        });
        return false;
    });

    $('.wysiwyg').wysiwyg({
        brIE: false,
        controls: {
            subscript    : { visible : false },
      superscript  : { visible : false }
        }
    });

// jQuery Widgetize
$('.moduleHolder').widgetize();

    // jQuery Tipsy
    $('[rel=tooltip], #main-nav span, .loader').tipsy({
        gravity:'s',
        fade:true
    });

    // jQuery Facebox Modal
    $('[rel*=modal]').facebox();

    // jQuery dataTables
    $('.datatable').dataTable();

    // jQuery Custome File Input
    $('input[type=file]').customFileInput();

    // jQuery DateInput
    $('.datepicker').datepick({
        pickerClass: 'jq-datepicker'
    });

    // Check all checkboxes
    $('.check-all').click(function(){
        $(this).parents('form').find('input:checkbox').attr('checked', $(this).is(':checked'));
    })

    // IE7 doesn't support :disabled
    $('.ie7').find(':disabled').addClass('disabled');

    // Table actions
    $('.table-actions ul').hide(); // Hide all table action menu
    $('.table-actions > a').click(function () {

        $(this).parent().parent().parent().siblings().find('.table-actions > a').removeClass('active').next().slideUp(); // Hide all menus expect the one clicked
        $(this).toggleClass('active').next().slideToggle(); // Toggle clicked menu
        $(document).click(function() { // Hide menu when clicked outside of it
            $('.table-actions ul').slideUp();
            $('.table-actions > a').removeClass('active')
        });
        return false;
    });

    //Tabs
    $('.tab, .sidetab').hide(); // Hide the content divs
    $('.default-tab, .default-sidetab').show(); // Show the div with class 'default-tab'
    $('.tab-switch a.default-tab, .tabber a.default-tab, .sidetab-switch a.default-sidetab').addClass('current'); // Set the class of the default tab link to 'current'

    if (window.location.hash ) {
        var tabID = window.location.hash;

        $('.tab-switch a[href='+tabID+'],.tabber a[href='+tabID+']').addClass('current').parent().siblings().find('a').removeClass('current');
        $('.sidetab-switch a[href='+tabID+']').addClass('current').parent().siblings().find('a').removeClass('current');

        $('div'+tabID).parent().find('.tab').hide();
        $('div'+tabID).parent().find('.sidetab').hide();

        $('div'+tabID).show();
    }

    $('.tab-switch a,.tabber a').click(function() {
        var tab = $(this).attr('href'); // Set variable 'tab' to the value of href of clicked tab
        $(this).parent().siblings().find('a').removeClass('current'); // Remove 'current' class from all tabs
        $(this).addClass('current'); // Add class 'current' to clicked tab
        $(tab).siblings('.tab').hide(); // Hide all content divs
        $(tab).show(); // Show the content div with the id equal to the id of clicked tab
        $(tab).find('.data').trigger('visualizeRefresh');
        ; // Refresh jQuery Visualize
        $('.fullcalendar').fullCalendar('render'); // Refresh jQuery FullCalendar
        return false;
    });

    $('.sidetab-switch a').click(function() {
        var sidetab = $(this).attr('href'); // Set variable 'sidetab' to the value of href of clicked sidetab
        $(this).parent().siblings().find('a').removeClass('current'); // Remove 'current' class from all sidetabs
        $(this).addClass('current'); // Add class 'current' to clicked sidetab
        $(sidetab).siblings('.sidetab').hide(); // Hide all content divs
        $(sidetab).show(); // Show the content div with the id equal to the id of clicked tab
        $(sidetab).find('.data').trigger('visualizeRefresh');
        ; // Refresh jQuery Visualize
        $('.fullcalendar').fullCalendar('render'); // Refresh jQuery FullCalendar

        return false;
    });

    //Accordions
    $('.accordion li div').hide();
    $('.accordion li:first-child div').show();
    $('.accordion .accordion-switch').click(function() {
        $(this).parent().siblings().find('div').slideUp();
        $(this).next().slideToggle();
        return false;
    });
});























