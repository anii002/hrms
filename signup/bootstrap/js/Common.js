function setDateToInput(container, data) {
    // alert(data);
    // alert(typeof (data));
    // alert(container);
    var now = new Date(data);
    // alert(now);
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear() + "-" + (month) + "-" + (day);
    // alert(today);
    $(container).val(today);
};;