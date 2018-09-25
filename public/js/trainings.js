

//Display Event Info
function displayEvent() {
  
}

//Edit Event Info
function editEvent(id) {
  $.confirm({
    theme: "bootstrap",
    title: "<h4 class='modal-title'>Edit Event</h4>",
    columnClass: "xlarge",
    content: "<div class='row'>"+
            "<div class='form-group col-md-12'>"+
            "<label for='eventName'>Event Name</label>"+
            "<input type='text' class='form-control' name='eventName' id='eventName' >"+
            "</div>"+
            "<div class='form-group col-md-12'>"+
            "<label for='eventLocation'>Event Location</label>"+
            "<input type='text' class='form-control' name='eventLocation' id='eventLocation'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventDateStart'>Event Date Start</label>"+
            "<input type='date' name='eventDateStart' id='eventDateStart' class='form-control'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventDateEnd'>Event Date End</label>"+
            "<input type='date' name='eventDateEnd' id='eventDateEnd' class='form-control'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventTimeStart'>Event Time Start</label>"+
            "<input type='time' name='eventTimeStart' id='eventTimeStart' class='form-control'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventTimeEnd'>Event Time Start</label>"+
            "<input type='time' name='eventTimeEnd' id='eventTimeEnd' class='form-control'>"+
            "</div>"+
            "</div>"+
            "</div>"+
            "<div class='col-md-6'>"+
            "<div class='form-group col-md-12'>"+
            "<label for='eventCapacity'>Capacity</label>"+
            "<input type='text' name='eventCapacity' id='eventCapacity' class='form-control col-md-6 ml-3'>"+
            "</div>"+
            "<div class='form-group col-md-12'>"+
            "<label for='eventPaymentDue'>Payment Due</label>"+
            "<input type='date' name='eventPaymentDue' id='eventPaymentDue' class='form-control col-md-6 ml-3'>"+
            "</div>"+
            "<div class='form-group col-md-12'>"+
            "<label for='eventDescription'>Description</label>"+
            "<textarea class='form-control' name='eventDescription' id='eventDescription' rows='5' ></textarea>"+
            "</div>"+
            "</div>"+
            "</div>",
    buttons: {
      save: {
        btnClass: "btn btn-primary",
      },
      close: {
        btnClass: "btn btn-secondary",
      }
    },
    onOpenBefore: function () {
      $.get( "/admin/getModalEditEvent/"+id+"'",function (data) {
        //CONVERT DATA TO 2D ARRAY
        var result = JSON.parse(JSON.stringify(data));
        alert(data);

      });
    }
  });
}