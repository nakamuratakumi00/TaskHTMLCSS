
const datepickerValue = document.getElementById('datepickerValue');
$(document).ready(function () {

    $.expr[":"].containsExact = function (obj, index, meta, stack) {
        return (obj.textContent || obj.innerText || $(obj).text() || "") == meta[3];
    };

    var cal_click = 0;
    var startDate;
    var in_range_count = 0;
    var date_storage = [];
    var start = 0;
    var reset = 0;

    $('.year-calendar').datepicker({
        onSelect: function (dateText, inst) {
            var daysOfYear = [];

            var day = inst.selectedDay,
                mon = inst.selectedMonth,
                year = inst.selectedYear;

            if (cal_click == 2) {
                cal_click = 0;
                reset = 1;
                in_range_count = 0;
                daysOfYear = [];
                date_storage = [];
                startDate = "";
                StopDate = "";
                endDate = "";
                inst.dpDiv.find('.start-range').removeClass('start-range');
                inst.dpDiv.find('.in-range').removeClass("in-range");
                inst.dpDiv.find('.end-range').removeClass("end-range");
            }

            if (cal_click == 0) {
                startDate = dateText;
                daysOfYear = [];
                date_storage.push(day);
                date_storage.push(mon);
                date_storage.push(year);
                cal_click++;
            }
            else { // End Date selected
                var endDate = dateText;
                var dateCheck = startDate;
                var i = 0;

                var StopDate = new Date(endDate);
                var k = (in_range_count - 1);
                for (var d = new Date(startDate); d <= StopDate; d.setDate(d.getDate() + 1)) {
                    var date = new Date(d);
                    daysOfYear.push(date.getFullYear() + '/' + (date.getMonth() + 1) + '/' + date.getDate());
                    if (i > 0) {
                        inst.dpDiv.find('[data-year="' + date.getFullYear() + '"][data-month="' + (date.getMonth()) + '"] a:not(.ui-priority-secondary):containsExact(' + date.getDate() + ')').closest("td").addClass("in-range");
                    }
                    i++;
                    in_range_count++;
                }
                console.log(daysOfYear);
                datepickerValue.value = daysOfYear;
                cal_click++;
            }
            setTimeout(function () {
                var endDate = dateText;
                var dateCheck = startDate;
                var i = 0;

                var StopDate = new Date(endDate);
                var k = (in_range_count - 1);
                for (var d = new Date(startDate); d <= StopDate; d.setDate(d.getDate() + 1)) {
                    var date = new Date(d);
                    if (i > 0 && i < k) {
                        inst.dpDiv.find('[data-year="' + date.getFullYear() + '"][data-month="' + (date.getMonth()) + '"] a:not(.ui-priority-secondary):containsExact(' + date.getDate() + ')').closest("td").addClass("in-range");
                    }
                    i++;
                }

                if (daydiff(parseDate(startDate), parseDate(endDate)) < 0) {
                    cal_click = 0;
                    startDate = dateText;
                    daysOfYear = [];
                    date_storage = [];
                    date_storage.push(day);
                    date_storage.push(mon);
                    date_storage.push(year);
                    cal_click++;
                    reset = 0;
                    start = 0;
                } else {
                    if (reset == 1) {
                        inst.dpDiv.find('.start-range').removeClass('start-range');
                        reset = 0;
                    } else {

                        inst.dpDiv.find('[data-year="' + date_storage[2] + '"][data-month="' + date_storage[1] + '"] a:containsExact(' + date_storage[0] + ')').closest("td").addClass('start-range');
                        if (start > 0) {
                            inst.dpDiv.find('a.ui-state-active:not(.ui-priority-secondary)').closest("td").addClass('end-range');
                        }
                    }
                }

                start++;

            }, 80);
        },
        numberOfMonths: [3, 4],
        showCurrentAtPos: 0,
        changeMonth: false,
        changeYear: true,
        stepMonths: 0,
        defaultDate: new Date("2019/1/1"),
        maxDate: new Date("2020/12/31"),
        minDate: new Date("2018/1/1"),


    });

    $(document).on("mouseenter", ".ui-datepicker-calendar td", function () {
        if ($(".ui-datepicker-calendar td").hasClass("in-range")) {
            return false;
        }
        var day_h = $(this).text(),
            month_h = parseInt($(this).closest("td").data("month")) + 1;
        year_h = $(this).closest("td").data("year");
        endDate_h = month_h + "/" + day_h + "/" + year_h;
        if (typeof (startDate) != 'undefined') {
            var k = daydiff(parseDate(startDate), parseDate(endDate_h));
            var StopDate_h = new Date(endDate_h);
            var i_h = 0;
            for (var d = new Date(startDate); d <= StopDate_h; d.setDate(d.getDate() + 1)) {
                $('.end-range').removeClass("end-range");
                var date = new Date(d);
                if (i_h > 0) {
                    if (i_h === k) { $(".ui-datepicker-calendar").find('[data-year="' + date.getFullYear() + '"][data-month="' + (date.getMonth()) + '"] a:not(.ui-priority-secondary):containsExact(' + date.getDate() + ')').closest("td").addClass("end-range"); }
                    else {
                        $(".ui-datepicker-calendar").find('[data-year="' + date.getFullYear() + '"][data-month="' + (date.getMonth()) + '"] a:not(.ui-priority-secondary):containsExact(' + date.getDate() + ')').closest("td").addClass("hover-range");
                    }
                }
                i_h++;
            }
        }
    });

    $(document).on("mouseleave", ".ui-datepicker-calendar td", function () {
        $('.hover-range').removeClass("hover-range");
    });

});

/*-----------------------------------------
-------------------------------------------
-------- Function Date Difference ------------
-------------------------------------------*/
function parseDate(str) {
    var mdy = str.split('/');
    return new Date(mdy[2], mdy[0] - 1, mdy[1]);
}

function daydiff(first, second) {
    return Math.round((second - first) / (1000 * 60 * 60 * 24));
}

/*---------------- End --------------*/