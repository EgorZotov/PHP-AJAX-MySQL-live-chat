//Этот скрипт отвечает за отправление запросов внешним скриптам,написанным на php.
	var last_message_id;
	var load_message = function (text,author)//функция отрисовки обычного сообщения.
	{
		return "<div class = 'cont-left'><div class = 'message'> <img src='images/UserIcon.png'> <span class = 'text'>"+text+"</span>  <span class = 'author'>"+author+"</span> </div> </div>" ;
	}
			
	var load_self_message = function (text,author)//функция отрисовки сообщения,написанного самим пользователем.
	{
		return "<div class = 'cont-right'> <div class = 'message self'> <img src='images/UserIcon.png'>  <span class = 'text'>"+text+"</span>   <span class = 'author'>"+author+"</span> </div> </div>";
	}
	$(document).ready(function() //функция подгружающая на странцу сообщеня из базы.
	{
		$.post("scripts/ajaxLoad.php",function(data)//загрузка данных с поиощью внешнего скрипта.
		{
			var json_array = JSON.parse(data);//конвертация полученной строки в js массив для последующей работы с ним.
			json_array.forEach(function(message)//перебор всех сообщений и их отрисовка.
			{
				if(session_user==message['username'])//если сообщение отправлено самим пользователем,то отрисовка справа.
				{
					$('#messages-wrapping').append(load_self_message(message['message'],message['username']));
				}
				else 
				{
				 	$('#messages-wrapping').append(load_message(message['message'],message['username']));//если это сообщение от других пользователей,то слева.
				}
				last_message_id = message['id'];//в конце работы этого цикла мы получим id последнего поста. 
			});
		});
	});
	function updatePosts()//функция загрузки и отрисовки новых сообщений
	{
		$.post("scripts/ajaxLoad.php",function(data)//похожа на получение данных при загрузке страницы.
		{
			var new_id;//перпеменная для хранения id последнего полученного из базы сообщения. 
			var json_array = JSON.parse(data);
			json_array.forEach(function(message)
			{
				if(Number(message['id'])>Number(last_message_id))//отрисовывать сообщения только в случае,если они новые.
				{
					if(session_user==message['username'])
					{
						$('#messages-wrapping').append(load_self_message(message['message'],message['username']));
					}
					else 
					{
					 	$('#messages-wrapping').append(load_message(message['message'],message['username']));
					}
				}
				new_id = message['id'];//в конце работы этого цикла мы получим id последнего поста после загрузки с базы.
			});
			last_message_id = new_id;//помещяем последнее значение Id с базы в наше глобальное значение последнего id.
		});
	}
	function sendPost()//функция отправки нового сообщения в базу и его отрисовки.
	{
	    if($('[name = "message"]').val().trim() != '')//проверка на то, было ли введено что либо в форму ввода данных.
		{
			var inputedText = $('[name = "message"]').val();//значение поля ввода данных.
			$.post('scripts/ajaxPost.php',{ "text" : inputedText , "author" : session_user });//отправка данных в внешний скрипт.
			$('#messages-wrapping').append(load_self_message($('[name = "message"]').val(),session_user));//добавление нового сообщения на страницу.
			$('[name = "message"]').val('');//опустошение поля ввода данных после отправки.
			last_message_id++;
		} 
		else 
		{
			$('[name = "message"]').val('');//опустощение поля данных в случае некорректного ввода.
		}
	}
	setInterval(updatePosts,5000);//выполнение проверки на новые сообщения каждые 5сек.
