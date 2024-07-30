$(document).ready(function () {
    var table = $("#example").DataTable({
        responsive: true,
        // fixedHeader: true,
        paging: true,
        lengthMenu: [10, 25, 50, 100],
        ordering: false,
        info: false,
        // filter: false,
        // responsive: false,
        // scrollX: false,
        // scrollY: false,
        fixedHeader: {
            header: true,
            headerOffset: $("#xmd-navbar").outerHeight(),
        },
        // autoWidth: false,
        // fixedColumns: false,
    });
    var rowCount = table.rows().count();
    console.log(rowCount);
    // Enable paging if row count is greater than 10
    if (rowCount <= 10) {
        $('#example_paginate').hide();
    }
    var table1 = $("#dashboardTable").DataTable({
        responsive: true,
        paging: false,
        ordering: false,
        info: false,
        filter: false,
        responsive: false,
        // scrollX: false,
        // scrollY: false,
    });

    var table2 = $("#dashboardTable2").DataTable({
        responsive: true,
        // fixedHeader: true,
        paging: false,
        lengthMenu: [10, 25, 50, 100],
        ordering: false,
        info: false,
        // filter: false,
        // responsive: false,
        // scrollX: false,
        // scrollY: false,
        fixedHeader: {
            header: true,
            headerOffset: $("#xmd-navbar").outerHeight(),
        },
        // autoWidth: false,
        // fixedColumns: false,
    });

    var rowCount_one = table1.rows().count();
    var rowCount_two = table2.rows().count();


    if (rowCount_one > 10) {
        $('#dashboardTable_paginate').hide();

    }
    if (rowCount_two > 10) {
        $('#dashboardTable2_paginate').hide();

    }
});

$(document).ready(function () {
    var table = $("#datatableModal").DataTable({
        responsive: true,
        fixedHeader: true,
        paging: false,
        ordering: false,
        info: false,
        filter: true,
        searching: true,
    });
});

// function enableDiv() {
//     if ($("#previousTemplate").is(":checked")) {
//         $(".modal-table").removeClass("disable-div");
//     }
//     var previousTemplate = document.getElementById('previousTemplate');

//     if (previousTemplate.checked) {
//         alert("previousTemplate.");
//     }
// }

// function disabledDiv() {
//     if ($("#newPost").is(":checked")) {
//         $(".modal-table").addClass("disable-div");
//     }
//     var newPost = document.getElementById('newPost');

//     if (newPost.checked) {
//         alert("newPost");
//     }
// }

$(".post-job-radio").change(function () {
    $(".post-job-radio").prop("checked", false);
    $(this).prop("checked", true);
});

$(".check-box-table").change(function () {
    $(".check-box-table").prop("checked", false);
    $(this).prop("checked", true);
});

$(function ($) {
    var path = window.location.href;
    $("#side_bar_dashboard a").each(function () {
        if (this.href === path) {
            $(this).parent().addClass("active");
        }
    });
});

$("#side_bar_view li a").click(function () {
    $("#side_bar_view li").removeClass("active");
    $(this).parent().addClass("active");
    $(".sidebar_container").removeClass("show_sidebar");
    $("body").removeClass("overlay overflow-hidden");
});

function close_offcanvas() {
    // darken_screen(false);
    document.querySelector(".mobile-offcanvas.show").classList.remove("show");
    document.body.classList.remove("offcanvas-active");
}

function show_offcanvas(offcanvas_id) {
    // darken_screen(true);
    document.getElementById(offcanvas_id).classList.add("show");
    document.body.classList.add("offcanvas-active");
}

document.addEventListener("DOMContentLoaded", function () {
    document
        .querySelectorAll("[data-trigger]")
        .forEach(function (everyelement) {
            let offcanvas_id = everyelement.getAttribute("data-trigger");

            everyelement.addEventListener("click", function (e) {
                e.preventDefault();
                show_offcanvas(offcanvas_id);
            });
        });

    document.querySelectorAll(".btn-close").forEach(function (everybutton) {
        everybutton.addEventListener("click", function (e) {
            e.preventDefault();
            close_offcanvas();
        });
    });

    // document.querySelector('.screen-darken').addEventListener('click', function(event){
    //     close_offcanvas();
    // });
});
// DOMContentLoaded  end

// end responsive header

// dashboard sidebar

$(".mobile_menu_trigger").click(function () {
    $(".sidebar_container").addClass("show_sidebar");
    $("body").addClass("overlay overflow-hidden");
});

$(".side_bar_close").click(function () {
    $(".sidebar_container").removeClass("show_sidebar");
    $("body").removeClass("overlay overflow-hidden");
});

$(document).ready(function () {
    $(window).scroll(function () {
        // Get the scroll position
        var scroll = $(window).scrollTop();

        // Define the threshold where you want to add/remove the class
        var threshold = 200; // Adjust this value as needed

        // Select your header element by ID
        var header = $("#headerDashboard");

        if (scroll >= threshold) {
            // Add a class when scrolling down
            header.addClass("add_fixed_header");
        } else {
            // Remove the class when scrolling up
            header.removeClass("add_fixed_header");
        }
    });
});
