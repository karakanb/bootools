
function ajax(url, type, data) {
    $.ajax({
        type: type,
        url: url,
        data: {id: data},
        success: function (result) {
            console.log("success");
        }
    });
}

function elementOfId(id) {
    return document.getElementById(id);
}