$(document).ready(()=>{
    $('#course-sub').hide()
    // $('#CategoryButton').hide();
    // $('#course-type').on('change',()=>{
    //    if($('#course-type').val() == 1){
    //     $('#youtube-url').show();
    //     $('#course-desc').show();
    //     $('#course-sub').hide()
    //     $('#CategoryButton').hide()
    //    }else if($('#course-type').val() == 2){
    //     $('#youtube-url').hide();
    //     $('#course-desc').hide();
    //     $('#CategoryButton').show()
    //     $('#course-sub').show()
    //    }
    // })
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

    // $('#form_main').on('submit',(event)=>{
    //     event.preventDefault();
    //     console.log($(this).serialize())
    //     $.ajax({
    //         url:'',
    //         method:'post',
    //         data:$(this).serialize(),
    //         dataType:'json',
    //         beforeSend: ()=>{
    //             $('#push_course').attr('disabled','disabled');
    //         },
    //         success: (data)=>{
    //             console.log(data);
    //             alert('walaaaa');
    //         }
    //     });
    //     // console.log($('#form_main').form())
    // });


})
