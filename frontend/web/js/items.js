var position;
function removePosition(positionId) {
    position = positionId;
    if (confirm("Are you really want to remove this position?")) {
        $.ajax({
            url: "rmpos/" + positionId,
            success: removeSuccess
        });
    }
}

function removeSuccess(response) {
    if (response == 1) {
        $("#position_" + position).remove();
    }
}