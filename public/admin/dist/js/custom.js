$(document).ready(()=>{
    $('#course-sub').hide()
    getDefault()

    // $('#CategoryButton').hide();
    $('#course-type').on('change',()=>{
        // console.log($('#course-type').val())
       if($('#course-type').val() == 1){
        $('#ytLinkInput').removeAttr('disabled')
        $('#youtube-url').show()
        $('#course_status').show()
        // $('#course-sub').hide()
        // $('#CategoryButton').hide()
       }else if($('#course-type').val() == 2){
        $('#ytLinkInput').attr('disabled','disabled')
        $('#youtube-url').hide()
        $('#course_status').hide()
        // $('#course-desc').hide();
        // $('#course-sub').show()
       }
    })
    let maxFields = 20,
    wrapper = $('.contentSubCategory'),
    button = $('#CategoryButton'),
    x = 1
    $(button).on('click', (e)=>{
        // alert('llalalal')
        e.preventDefault();
        if(x < maxFields){
            x++;
            $(wrapper).append("<tr><td>"+x+"</td><td><input type='text' class='form-control' name='course_name[]' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' ></td><td><input type='text' class='form-control' name='youtube_link[]'aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' ></td><td><input type='text' class='form-control' name='description[]' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' ></td><td><button type='button' class='btn btn-danger removeFields' value="+x+">Remove</button></td></tr>")
        }

    })
    $(wrapper).on("click",".removeFields", function(e){ //user click on remove text
        $(this).parent().parent().remove();
        x--;
    })

   function getDefault (){
        // alert($('#course-type').val())
        if($('#course-type').val() == 1){
            $('#ytLinkInput').removeAttr('disabled')
            $('#youtube-url').show()
            $('#course_status').show()
            // $('#course-sub').hide()
            // $('#CategoryButton').hide()
           }else if($('#course-type').val() == 2){
            $('#ytLinkInput').attr('disabled','disabled')
            $('#youtube-url').hide()
            $('#course_status').hide()
            // $('#course-desc').hide();
            // $('#course-sub').show()
           }
    }

})
