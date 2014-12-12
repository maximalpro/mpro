if(!lang) var lang='ru';


function change_bb_bb()
{
    var max_i=3, i=parseInt($("a#bb_bb").attr('img'));
    var i=( i >= max_i ? 1 : i+1 ), next_i=( i >= max_i ? 1 : i+1 );
    console.log('i='+i+', next_i='+next_i)
    $("a#bb_bb img").fadeTo('fast', 0.01, function()
        {
            $("a#bb_bb img").attr('src', './img/bb'+i+'.jpg').fadeTo('fast', 1, function()
                {
                    $("a#bb_bb").attr('img', i).attr('style', "background-image: url('./img/bb"+next_i+".jpg');");
                }
            );
        }
    );
}

function authme()
{
    
    var data={};
    data['login']=$('#login').val();
    data['password']=$('#password').val();
    
    $.ajax({
            url: './../js/ajax/authme.php',
            dataType: "json",
            error: function (jso) {  console.warn('Ошибка загрузки ответа сервера!'); },
            success:function(jso){
                    if(jso.logged && jso.usertype)
                    {
                        console.info('Авторизация успешна, переходм в сеть, кабинет: '+jso.usertype);
                        location.href='http://maximal.pro/social2/'+jso.usertype+'/';
                    }
                    else 
                    {
                        console.log(jso);
                        console.warn('Ошибка авторизации логин/пароль не совпадают!');
                        $('.textloginarea_error').show();
                    }
                }
         });
}
