(function ($) {
    'use strict';

    $(document).ready(function () {
        $("#dataTable").dataTable();

        $("#active-mobilemenu").on("click", function () {
            $(".off-canvas-menu").addClass("active");
            return false;
        });

        $(".close-btn").on("click", function () {
            $(".off-canvas-menu").removeClass("active");
        });

        //datePicker
        $( "#datepicker" ).datepicker({
            inline: true
        });
        //selectmenu
        $("#selectmenu").selectmenu();

        var docH = $(document).height();
        var sidebarH = $(".sidebar-area");
        var mainContentH = $(".main-content").height();
        if (mainContentH > 570) {
            $(sidebarH).css("height", mainContentH);
            $(".sidebar ul#menu li ul").css("left", "210px");
        }

        /*$("body").niceScroll({
            cursorcolor: "#57BDDB",
            cursorborderradius: "0px",
            cursorwidth: "10px",
            cursorminheight: 100,
            cursorborder: "0px solid #fff",
            zindex: 9999,
            autohidemode: true,
            horizrailenabled:false
        });*/

    });

}(jQuery));
