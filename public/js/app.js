// window.chart = require('chart.js');

$(document).ready(function () {
    // $('#sidebar').mCustomScrollBar({
    //     theme: "minimal"
    // });
    $(".container").attr("style", "");

    openCloseSideNavigation();
    setSideNavigation();
    // setSideNav();
    setNavigation();
    // chartHandle();
    tableSortOnClick();
    toTopButton();
    addContanerClass();
    checkIfBookNameExists();
    handleRender();
    console.log("app.js");
});
// login page
$(window).on("resize", function () {
    if ($(window).width() > 1024) {
        $("#rule").addClass("show");
    } else {
        $("#rule").removeClass("show");
    }
});

function handleRender() {
    let title;
    let mySubMenuOpened = document.querySelector(
        "#sidebar li.has-submenu #submenu.show"
    );
    console.log(mySubMenuOpened);
    if (mySubMenuOpened) {
        title = $("#sidebar li.has-submenu #submenu .onSelected").text();
    } else title = $("#sidebar .openSubNav a").text();

    console.log("render handler: \n" + title);
    $("#content .title h2").html(title);
}

function setNavigation() {
    var root = window.location;
    var path = root.search.substring(1).split("=")[1];
    if (path == undefined) var path = root.pathname.replace("//$/", "");
    path = decodeURIComponent(path);

    $("#navMain > li").each(function (idx, li) {
        var element = $(li);
        var href = element.find("a").attr("href");
        element.removeClass("active-main active-after active-before");
        element.find("ul").removeClass("show");

        if (
            (path.indexOf(href) >= 0 || href.indexOf(path) >= 0) &&
            path != "/"
        ) {
            element.addClass("active");
        }
    });
}

function setSideNav() {
    document.addEventListener("DOMContentLoaded", function () {
        document
            .querySelectorAll("#sidebar .navlink")
            .forEach(function (element) {
                element.addEventListener("click", function (e) {
                    console.log("click");
                    let nextEl = element.nextElementSibling;
                    let parentEl = element.parentElement;

                    if (nextEl) {
                        e.preventDefault();
                        let mycollapse = new bootstrap.Collapse(nextEl);

                        if (nextEl.classList.contains("show")) {
                            mycollapse.hide();
                        } else {
                            mycollapse.show();
                            // find other submenus with class=show
                            var opened_submenu =
                                parentEl.parentElement.querySelector(
                                    ".submenu.show"
                                );
                            // if it exists, then close all of them
                            if (opened_submenu) {
                                new bootstrap.Collapse(opened_submenu);
                            }
                        }
                    }
                }); // addEventListener
            }); // forEach
    });
    // DOMContentLoaded  end
}

function setSideNavigation() {
    var root = window.location;
    var path = root.search.substring(1).split("=")[1];
    if (path == undefined) var path = root.pathname.replace("//$/", "");
    path = decodeURIComponent(path);

    $(".sidebar-header").removeClass("active-before");
    console.log("\npath: " + path);

    //colllapse the submenu
    $("#sidebar").find(".show").removeClass("show");

    $("#sidebar ul.nav-list > li").each(function (idx, li) {
        var element = $(li).children();
        //get last element of an array when split /
        var href = element.find("a").attr("href").split("/").pop();
        element.removeClass("openSubNav");
        // find other submenus with class=show
        var opened_submenu = element.eq(1).hasClass(".show");
        // if it exists, then close all of them
        if (opened_submenu) {
            new bootstrap.Collapse(opened_submenu);
        }

        if (
            (path.indexOf(href) >= 0 || href.indexOf(path) >= 0) &&
            path != "/"
        ) {
            element.eq(0).addClass("openSubNav");
            element.eq(1).addClass("show");
            // element.eq(1).find("li").addClass("onSelected");
            var subitem = element.eq(1).find("li");
            subitem.each(function (idx, li) {
                var href = $(li).find("a").attr("href").split("/").pop();
                if (path.indexOf(href) > 0) {
                    // console.log(li);
                    $(this).addClass("onSelected");
                }
            });
            // console.log("\npath: " + path + " href: " + href);
            // console.log("\nsiblings:" + element.getElementsByClassName("submenu"));
            element.siblings(0).addClass("show");
        }
    });
}

function openCloseSideNavigation() {
    $("#sidebarCollapse").on("click", function () {
        // add, remove active class
        $("#sidebar").toggleClass("active");
        $("#content").toggleClass("active");

        // // dong mo sub menu neu co
        // $('.collapse.in').toggleClass('in');
        // // chinh arrows dung huong
        // $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        // $('a[aria-expanded=false]').attr('aria-expanded', 'true');
    });

    // $('#btn_navbarSupportedContent').on('click', function () {
    //     $('#navbarSupportedContent').toggleClass('show');
    // });
}

function tableSortOnClick() {
    $("th").click(function () {
        if ($(this).find("a").length) {
            var table = $(this).parents("table").eq(0);
            var rows = table
                .find("tr:gt(0)")
                .toArray()
                .sort(comparer($(this).index()));
            this.asc = !this.asc;
            if (!this.asc) {
                rows = rows.reverse();
            }
            for (var i = 0; i < rows.length; i++) {
                table.append(rows[i]);
            }
        }
    });

    function comparer(index) {
        return function (a, b) {
            var valA = getCellValue(a, index),
                valB = getCellValue(b, index);
            return $.isNumeric(valA) && $.isNumeric(valB)
                ? valA - valB
                : valA.toString().localeCompare(valB);
        };
    }
    function getCellValue(row, index) {
        return $(row).children("td").eq(index).text();
    }
}

function chartHandle() {
    const labels = ["January", "February", "March", "April", "May", "June"];

    // var users = JSON.parse("{{ json_encode($users) }}");
    // var data =

    const attachData = {
        labels: labels,
        datasets: [
            {
                label: "UserChart",
                backgroundColor: "rgb(255, 99, 132)",
                borderColor: "rgb(255, 99, 132)",
                data: [0, 10, 5, 2, 20, 30, 45],
            },
        ],
    };

    const config = {
        type: "line",
        data: attachData,
        options: {},
    };

    const myChart = new Chart(document.getElementById("userChart"), config);
}

// go to top button
function toTopButton() {
    const showOnPx = 100;
    const backToTopButton = document.querySelector(".back-to-top");

    const scrollContainer = () => {
        return document.documentElement || document.body;
    };

    const goToTop = () => {
        document.body.scrollIntoView({
            behavior: "smooth",
        });
    };

    document.addEventListener("scroll", () => {
        //   console.log("Scroll Height: ", scrollContainer().scrollHeight);
        //   console.log("Client Height: ", scrollContainer().clientHeight);

        //   const scrolledPercentage =
        //     (scrollContainer().scrollTop /
        //       (scrollContainer().scrollHeight - scrollContainer().clientHeight)) *
        //     100;

        if (scrollContainer().scrollTop > showOnPx) {
            backToTopButton.classList.remove("hidden");
        } else {
            backToTopButton.classList.add("hidden");
        }
    });

    backToTopButton.addEventListener("click", goToTop);
}

// add class
function addContanerClass() {
    $("#yield > div").each(function (idx, div) {
        var element = $(div);
        element.addClass("container");
    });
}

function checkIfBookNameExists() {
    if (typeof bookheads !== "undefined" && typeof booktitles !== "undefined") {
        $(".bookrow input").on("change", function () {
            var values = $("input[name='booknames[][BN]']")
                .map(function () {
                    return $(this).val();
                })
                .get();

            console.log(values);
        });
    }
}
