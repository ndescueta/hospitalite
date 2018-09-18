$(document).ready(function(){
  fetchDescription();
  //Edit();
  function fetchDescription(){
      $('#editmodal').on('show.bs.modal', function(e) {
        var name = $(e.relatedTarget).data('name');
        var id = $(e.relatedTarget).data('id');
        //console.log(rowid);
        alert(id);
        //var name = $('#editmodal').data('name');
        $('#contentid').val(id);
        $('#description').val(name);
        console.log(name);
      });
    }

  /*  function Edit(){
        $("form[name ='editdescription']").on('submit', function(e) {
          e.preventDefault();
          var token = $("input[name='_token']").val();
          var contentid = $('#contentid').val();
          var description =$('#description').val();
          console.log(contentid+" "+description+" "+token);
          $.ajax({

            type: 'POST',
            url: '/update',
            data:{token:token,
              contentid:contentid,
            description:description},
            success:function(data){
              console.log("data");
            }
          });
        });
      }*/

});
