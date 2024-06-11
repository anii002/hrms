//........................below code is updating code......................................
/**
 * 
 * @param {String} variable 
 * @returns {String} it will returns a parameter if present it value otherwise false 
 */
function getQueryVariable(variable) {
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if (pair[0] == variable) {
            return pair[1];
        }
    }
    return false;
    // alert('Query Variable ' + variable + ' not found');
}

function AlertBox(head, message) {
    $.jGrowl("Loading... Please Wait...", {
        sticky: false
    });
    $.jGrowl(message, {
        header: head
    });
};;