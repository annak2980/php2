//$(селектор).on(событие, function(){
//  $.ajax({
//      url: адрес серверного обработчика,
//      type: тип HTTP запроса,
//      data:пакет передаваемых данных (для POST)
//      error: обработчик серверных ошибок,
//      success: обработчик успешного (с точки зрения сервера) завершения,
//      dataType : тип данных в ответе
//  })
//});

$(document).ready(function(){
    //Занятие 4 - динамическое добавление данных на страницу
    var num = 3; //чтобы знать с номера какой записи  данные
    
    $('#more_good').on('click', function(){   
        $.ajax({
            url: "/catalogue/more_good/",
            type: "GET",
            data: {"num": num},
            error: function() {alert("Что-то пошло не так...");},
            success: function(answer){
                if(answer.result == 0){  
                    alert("Больше нет записей");
                    $("#more_good").hide();
                }
                else{
                    $(".gallery_content").append(answer.result); 
                    num = num + 3;
                }
            },
            dataType : "json"
        })
    });
    
    
    //регистрация пользователя по email
    $('.emailform').on('click', function(){
        var login    = $("#login").val()
        var email    = $("#email").val()
        var password = $("#password").val()
        
        $.ajax({
            url: "/login/send_email/",
            type: "POST",
            data:{
                login: login,
                email: email,
                password: password
            },
            error: function() {alert("Что-то пошло не так...");},
            success: function(answer){
                if(answer.result == 1)
                    alert("На е-mail отправлено письмо для подтверждения регистрации");
                else if(answer.result == 2)
                    alert("Неверно заполнен e-mail адрес");
                else if(answer.result == 3)
                    alert("Не заполнен e-mail, логин или пароль");
                else if(answer.result == 4)
                    alert("Пользователь с таким именем уже есть в базе");
                else
                    alert("Что-то пошло не так...");
            },
            dataType : "json"
        })
    });
    
    //Загрузка файла - картинки товара
    $('.upload_img').on('click', function() {
        var file_data = $('#catalogue_img').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        $.ajax({
            url: "/catalogue/upload_img/",
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,  
            error: function() {alert("Что-то пошло не так...");},
            success: function(answer){
                if(answer.result == 1)
                    alert("Изображение товара в каталоге загружено на сервер");
                else
                    alert(answer.result);
            },
            dataType : "json"
        });
    });
    
    //Загрузка файла - большой картинки для страницы товара
    $('.upload_big').on('click', function() {
        var file_data = $('#page_big_img').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        $.ajax({
            url: "/catalogue/upload_img/",
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,  
            error: function() {alert("Что-то пошло не так...");},
            success: function(answer){
                if(answer.result == 1)
                    alert("Изображение товара для странички загружено на сервер");
                else
                    alert(answer.result);
            },
            dataType : "json"
        });
    });

    //добавление товара в каталог
    $('.add_goods').on('click', function(){
        var name          = $("#namegood").val()
        var catalogue_img = $("#catalogue_img").val()
        var page_big_img  = $("#page_big_img").val()
        var price         = $("#price").val()
        var descript      = $("#descript").val()
        
        $.ajax({
            url: "/catalogue/add_goods/",
            type: "POST",
            data:{
                name: name,
                catalogue_img: catalogue_img,
                page_big_img: page_big_img,
                price: price,
                descript: descript
            },
            error: function() {alert("Что-то пошло не так...");},
            success: function(answer){
                if(answer.result == 1)
                    alert("Товар с описанием добавлен в каталог");
                else if(answer.result == 2)
                    alert("Не заполнены реквизиты формы");
                else
                    alert("Что-то пошло не так...");
            },
            dataType : "json"
        })
    });
    
    //удаление товара из каталога
    $('.remove_good').on('click', function(){
        var id_good = $(this).attr("id")

        $.ajax({
            url: "/catalogue/remove_good/",
            type: "POST",
            data:{
                id_good: id_good
            },
            error: function() {alert("1Что-то пошло не так...");},
            success: function(answer){
                if(answer.result == 1)
                    alert("Товар удалён из каталога!");
                else
                    alert("2Что-то пошло не так...");
            },
            dataType : "json"
        })
    });
    
    //добавление товара из каталога в корзину
    $('.add-to-basket').on('click', function(){
        var id_good = $(this).attr("id")

        $.ajax({
            url: "/catalogue/buy/",
            type: "POST",
            data:{
                id_good: id_good,
                quantity: 1
            },
            error: function() {alert("Что-то пошло не так...");},
            success: function(answer){
                if(answer.result == 1) 
                    alert("Товар добавлен в корзину!");
                else
                    alert("Что-то пошло не так...");
            },
            dataType : "json"
        })
    });
    
    //добавление товара в корзину
    $('.add-one-basket').on('click', function(){
        var id_good = $(this).attr("id")

        $.ajax({
            url: "/cataloguepage/buy/",
            type: "POST",
            data:{
                id_good: id_good,
                quantity: 1
            },
            error: function() {alert("Что-то пошло не так...");},
            success: function(answer){
                if(answer.result == 1) {
                    alert("Товар добавлен в корзину!");
                    window.location = "/cataloguepage/?id_page="+id_good; 
                }
                else
                    alert("Что-то пошло не так...");
            },
            dataType : "json"
        })
    });

    //удаление товара из корзины
    $('.remove').on('click', function(){
        var id_good = $(this).attr("id")

        $.ajax({
            url: "/basket/delete/",
            type: "POST",
            data:{
                id_good: id_good
            },
            error: function() {alert("Что-то пошло не так...");},
            success: function(answer){
                if(answer.result == 1)
                    alert("Товар удалён из корзины!");
                else
                    alert("Что-то пошло не так...");
            },
            dataType : "json"
        })
    });
    
    //удаление заказа
    $('.remove_order').on('click', function(){
        var id_order = $(this).attr("id")

        $.ajax({
            url: "/history/delete/",
            type: "POST",
            data:{
                id_order: id_order
            },
            error: function() {alert("Что-то пошло не так...");},
            success: function(answer){
                if(answer.result == 1)
                    alert("Заказ удален!");
                else
                    alert("Что-то пошло не так...");
            },
            dataType : "json"
        })
    });
    
    //подтверждение заказа
    $('.confirme_order').on('click', function(){
        var id_order = $(this).attr("id")

        $.ajax({
            url: "/history/confirme/",
            type: "POST",
            data:{
                id_order: id_order
            },
            error: function() {alert("Что-то пошло не так...");},
            success: function(answer){
                if(answer.result == 1)
                    alert("Заказ подтвержден!");
                else
                    alert("Что-то пошло не так...");
            },
            dataType : "json"
        })
    });
    
    //добавление записи в отзывы
    $('.addrec').on('click', function(){
        var name  = $("#namerec").val()
        var email = $("#emailrec").val()
        var text  = $("#textrec").val()
        
        $.ajax({
            url: "/guestbook/add_record/",
            type: "POST",
            data:{
                name: name,
                email: email,
                text: text
            },
            error: function() {alert("Что-то пошло не так...");},
            success: function(answer){
                if(answer.result == 1)
                    alert("Запись добавлена в чат");
                else if(answer.result == 2)
                    alert("Не заполнены обязательные поля");  
                else
                    alert("Что-то пошло не так...");
            },
            dataType : "json"
        })
    });
    
    //удаление записи из книги отзывов
    $('.remove_record').on('click', function(){
        var id_record = $(this).attr("id")

        $.ajax({
            url: "/guestbook/remove_record/",
            type: "POST",
            data:{
                id_record: id_record
            },
            error: function() {alert("Что-то пошло не так...");},
            success: function(answer){
                if(answer.result == 1)
                    alert("Отзыв удален из базы!");
                else
                    alert("Что-то пошло не так...");
            },
            dataType : "json"
        })
    });
    
     //добавление новости
    $('.add_news').on('click', function(){
        var name     = $("#namenews").val()
        var short    = $("#shortnews").val()
        var text     = $("#textnews").val()
        var datetime = $("#datenews").val()
        
        $.ajax({
            url: "/news/add_news/",
            type: "POST",
            data:{
                name: name,
                short: short,
                datetime: datetime,
                text: text
            },
            error: function() {alert("Что-то пошло не так...");},
            success: function(answer){
                if(answer.result == 1)
                    alert("Новость добавлена");
                else if(answer.result == 2)
                    alert("Не заполнены обязательные поля");  
                else
                    alert("Что-то пошло не так...");
            },
            dataType : "json"
        })
    });
    
     //удаление новости
    $('.remove_news').on('click', function(){
        var id_news = $(this).attr("id")

        $.ajax({
            url: "/news/remove_news/",
            type: "POST",
            data:{
                id_news: id_news
            },
            error: function() {alert("Что-то пошло не так...");},
            success: function(answer){
                if(answer.result == 1)
                    alert("Новость удалена из базы!");
                else
                    alert("Что-то пошло не так...");
            },
            dataType : "json"
        })
    });
    
    //оформление заказа с товарами из корзины
    $('.create_order').on('click', function(){
        var name  = $("#name").val()
        var phone = $("#phone").val()
        var adres = $("#adres").val()
        
        $.ajax({
            url: "/basket/order/",
            type: "POST",
            data:{
                name: name,
                phone: phone,
                adres: adres
            },
            error: function() {alert("Что-то пошло не так...");},
            success: function(answer){
                if(answer.result == 1) {
                    alert("Заказ оформлен");
                    window.location = "../"; //После оформления заказа, закрыв сессию, очищаем и закрываем корзину
                }
                else if(answer.result == 2)
                    alert("Не заполнены обязательные поля");  
                else if(answer.result == 3)
                    alert("В корзине нет товаров!");  
                else
                    alert("Что-то пошло не так...");
                
            },
            dataType : "json"
        })
    });
    
    //добавление скидки
    $('.add_discount').on('click', function(){
        var discname   = $("#discname").val()
        var percent    = $("#percent").val()
        var startdate  = $("#startdate").val()
        var finishdate = $("#finishdate").val()
        
        $.ajax({
            url: "/admin/add_discount/",
            type: "POST",
            data:{
                discname: discname,
                percent: percent,
                startdate: startdate,
                finishdate: finishdate
            },
            error: function() {alert("Что-то пошло не так...");},
            success: function(answer){
                if(answer.result == 1)
                    alert("Запись добавлена в базу");
                else if(answer.result == 2)
                    alert("Не заполнены обязательные поля"); 
                else if(answer.result == 3)
                    alert("Дата начала акции больше даты окончания!");  
                else if(answer.result == 4)
                    alert("Уже есть акция на этот период!Сначала удалите старую акцию");  
                else
                    alert("Что-то пошло не так...");
            },
            dataType : "json"
        })
    });
    
    //удаление скидки
    $('.remove_discount').on('click', function(){
        var id_discount = $(this).attr("id")

        $.ajax({
            url: "/admin/remove_discount/",
            type: "POST",
            data:{
                id_discount: id_discount
            },
            error: function() {alert("Что-то пошло не так...");},
            success: function(answer){
                if(answer.result == 1)
                    alert("Скидка удалена из базы!");
                else
                    alert("Что-то пошло не так...");
            },
            dataType : "json"
        })
    });
    
     //удаление зарегистрированного клиента из users
    $('.remove_user').on('click', function(){
        var id_user = $(this).attr("id")

        $.ajax({
            url: "/admin/remove_user/",
            type: "POST",
            data:{
                id_user: id_user
            },
            error: function() {alert("Что-то пошло не так...");},
            success: function(answer){
                if(answer.result == 1)
                    alert("Клиент удален из базы!");
                else
                    alert("Что-то пошло не так...");
            },
            dataType : "json"
        })
    });
});

