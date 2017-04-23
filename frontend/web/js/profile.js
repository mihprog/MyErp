$().ready(function () {
    $("#profile_panel").delegate('.form-control', 'change', function () {
        var profile = new Profile(window.location.href, "#profile_panel");
        profile.changeField(this.id, this.value);
        //alert(this.id);
    });
});

var Profile = function (url, panelId) {
    this.changeField = function (id, value) {
        if (value == '') value = 'NULL';
        $.ajax({
            url: url + "/setfield/" + id + "/" + value,
            type: 'get',
            success: changeSuccess
        });
    };
    var changeSuccess = function (response) {
        if (response == 1) {
            $(panelId).append('<div class="alert alert-success alert-dismissable">' +
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                '<strong>Your profile was succrssfully changed.</strong>' +
                '</div>'
            );
        } else {

        }
    }
};