/**
 * Created by mudada on 14/03/2017.
 */


function checkAll(bool) {
    options = $("input[type='checkbox']");
    options.each(function (e) {
        $(this).prop('checked', bool);
    })
}
