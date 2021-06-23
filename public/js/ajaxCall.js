var exportedParam;
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})


class exported {
    setup() {
        $.ajaxSetup({
            headers: {
                'X-CRSF-TOKEN': $('meta[name="csrf-token"]').prop('content')
            }
        })
    }
    data(url, data = {}, method = "get", before = null, success) {
        this.setup();
        $.ajax({
            url: url,
            data: data,
            method: method,
            beforeSend: before,
            success: async function (e) {
                exportedParam = e;
            }
        }).then((x) => {
            success(x)
        });
    }

}



$('.more').on('click', function () {
    let url = $(this).attr('data-dirct');
    let json = {};
    $('.more input').each(function () {
        json[$(this).attr('name')] = $(this).val();
    });
    console.log(json);
    if (!$(this).hasClass('active')) {
        $(this).addClass('active');
        let more = new exported;
        more.data($(this).attr('data-bind'), json, 'get', null, (x) => {
            x.forEach(element => {
                document.querySelector('.show-container .sec').innerHTML += element;
            });
            window.scrollTo({
                top: window.scrollY + (window.innerWidth*0.3),
                behavior: 'smooth'
            });
            let page = parseInt($('input[name="page"]').attr('value'))  + 1
            $('input[name="page"]').attr('value', page)
            $(this).removeClass('active');
            $(this).attr('data-page', page);
        });

    }

});
$('.action-container').on('click','.action',function () {
   let like = new exported;
   $(this).toggleClass('active');
   like.data(`/action/${$(this).attr('data-action')}/${$(this).attr('data-movie')}/${$(this).attr('data-type')}`,{},'post',null,(x)=>{
       console.log(x);
       if(x == 'false') {
        window.location.href = "/login";
       }
   })
})

console.log()
