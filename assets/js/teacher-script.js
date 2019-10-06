$(document).ready(function () {

    var wrapper = $('#wrapper');

    /*********************************************************************/
    //*********************SELECT CLASS MODAL******************************
    /*********************************************************************/

    var selectClassModal = $('#select-class');
    $('a#view-all-students').on('click', function () {
        selectClassModal.addClass("bounceIn");
        selectClassModal.modal({backdrop: true});
        wrapper.addClass("blur");

    });

    selectClassModal.on('show.bs.modal', function () {
        var closeModalBtns = selectClassModal.find('button[data-custom-dismiss="modal"]');
        closeModalBtns.on('click', function () {
            selectClassModal.on('webkitAnimationEnd oanimationend msAnimationEnd animationend', function (evt) {
                selectClassModal.modal('hide');
                wrapper.removeClass("blur");
            });
            selectClassModal.removeClass("bounceIn").addClass("bounceOut");
        })
    });

    selectClassModal.on('hidden.bs.modal', function (evt) {
        wrapper.removeClass("blur");
        var closeModalBtns = selectClassModal.find('button[data-custom-dismiss="modal"]');
        selectClassModal.removeClass("bounceOut");
        selectClassModal.off('webkitAnimationEnd oanimationend msAnimationEnd animationend')
        closeModalBtns.off('click');
    });

    /*********************************************************************/
    //*********************END OF SELECT CLASS MODAL******************************
    /*********************************************************************/

    /*********************************************************************/
    //*********************Add Attendance MODAL******************************
    /*********************************************************************/

    var addAttendanceModal = $('#add-attendance-modal');
    $('a#add-attendance').on('click', function () {
        addAttendanceModal.addClass("bounceIn");
        addAttendanceModal.modal({backdrop: true});
        wrapper.addClass("blur");

    });

    addAttendanceModal.on('show.bs.modal', function () {
        var closeModalBtns = addAttendanceModal.find('button[data-custom-dismiss="modal"]');
        closeModalBtns.on('click', function () {
            addAttendanceModal.on('webkitAnimationEnd oanimationend msAnimationEnd animationend', function (evt) {
                addAttendanceModal.modal('hide');
                wrapper.removeClass("blur");
            });
            addAttendanceModal.removeClass("bounceIn").addClass("bounceOut");
        })
    });

    addAttendanceModal.on('hidden.bs.modal', function (evt) {
        wrapper.removeClass("blur");
        var closeModalBtns = addAttendanceModal.find('button[data-custom-dismiss="modal"]');
        addAttendanceModal.removeClass("bounceOut");
        addAttendanceModal.off('webkitAnimationEnd oanimationend msAnimationEnd animationend')
        closeModalBtns.off('click');
    });

    /*********************************************************************/
    //*********************END OF ADD ATTENDANCE MODAL******************************
    /*********************************************************************/

    /*********************************************************************/
    //*********************DATETIME PICKER******************************
    /*********************************************************************/
    $('input.datetime').datetimepicker({
        widgetPositioning: {horizontal: "auto", vertical: "bottom"},
        format: 'YYYY-MM-DD HH:mm:ss',
    });
});