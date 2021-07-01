const datepicker = document.getElementById('js-datepicker');
                   const datepickerValue = document.getElementById('datepickerValue');
                   let datepickerAry = new Array;
//jQieryオブジェクト
                   const $datepicker = $(datepicker);
$datepicker.multiDatesPicker({
                           todayBtn: true,
                           showButtonPanel:true,
                           defaultDate: new Date("2019/1/1"),
                           maxDate: new Date("2020/12/31"),
                           minDate: new Date("2018/1/1"),
                           changeYear: true,
                           changeMonth: true,
                           hideIfNoPrevNext: true,

                           onSelect: function (dateText, inst) {
                              const index = datepickerAry.indexOf(dateText);
                                    if(datepickerAry.indexOf(dateText) < 0) {
                                       datepickerAry.push(dateText);
                                       datepickerValue.value = datepickerAry;
                                 } else {
                                       datepickerAry.splice(index,1);
                                       datepickerValue.value = datepickerAry;
                                       }
                        }
});