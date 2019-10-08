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

    /*********************************************************************/
    //*********************END OF DATETIME PICKER******************************
    /*********************************************************************/


    /*********************************************************************/
    //*********************ADD ATTENDANCE******************************
    /*********************************************************************/

    var attendanceTable = $('table#add-attendance-table').DataTable({
        columnDefs: [
            {"orderable": false, "targets": 4}
        ],
    });


    $('table#add-attendance-table tbody').on('click', 'tr td div.toggle', function (event) {
        // alert($(this).hasClass("btn-success"));
        // alert($(this).find('input').val());
        if ($(this).hasClass("btn-success")) {
            setCheckbox($(this).find('input').val(), false);
        }else{
            setCheckbox($(this).find('input').val(), true);
        }

    });

    function setCheckbox(value, status) {
        // alert("value"+value);
        // alert($("input[name='studentIds[]'][value=" + value + "]").prop('checked'));
        $("input[name='studentIds[]'][value=" + value + "]").prop('checked', status);
    }


    $('input.select-all-students-ids').on('change', function () {
        // alert();
        if (this.checked) {
            attendanceTable.rows().every(function(rowIdx) {
                // var col = attendanceTable.cell( rowIdx, 4).data().slice(0,-1) + " checked>";
                // attendanceTable.cell( rowIdx, 4).data(col).draw();
                // var col = attendanceTable.cell( rowIdx, 4).data();
                // // alert(col);
                // col = col.replace("toggle btn btn-danger off", "toggle btn btn-success");
                // console.log("flkhsdfjgsdfjs");
                // console.log(col.indexOf("checked"));
                // attendanceTable.cell( rowIdx, 4).data(col);
                $('td div.toggle').removeClass("btn-danger");
                $('td div.toggle').removeClass("off");
                $('td div.toggle').addClass("btn-success");

            });
            $('input.student-id').prop("checked", true);

        } else {
            attendanceTable.rows().every(function(rowIdx) {
                // var col = attendanceTable.cell( rowIdx, 4).data();
                // // alert(col);
                // col = col.replace("toggle btn btn-success", "toggle btn btn-danger off");
                // console.log("flkhsdfjgsdfjs");
                // console.log(col.indexOf("checked"));
                // attendanceTable.cell( rowIdx, 4).data(col);
                $('td div.toggle').removeClass("btn-success");
                $('td div.toggle').addClass("btn-danger");
                $('td div.toggle').addClass("off");
            });
            $('input.student-id').prop("checked", false);
        }

    });
    /*********************************************************************/
    //*********************ADD ATTENDANCE******************************
    /*********************************************************************/
});