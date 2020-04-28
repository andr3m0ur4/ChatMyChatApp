$(document).ready(() => {

	$("#chat-text").keyup(e => {
		// Quando nós pressionamos Enter faz
		if (e.keyCode == 13) {
			let chat_text = $("#chat-text").val()

			$.ajax({
				type: 'POST',
				url: './insert_message.php',
				data: { chat_text: chat_text },

				success: () => {
					loadMessage()
					//$("#ChatMessages").load("DisplayMessages.php");
					$("#chat-text").val('')
				}
			})
		}
	})

	setInterval(function(){
		// Atualiza após 1500ms
		loadMessage()
	},1500);

	loadMessage()

	let textarea = document.getElementById('chat-text')
	textarea.scrollTop = textarea.scrollHeight

	
})

function loadMessage() {
	$("#chat-messages").empty()

	$.ajax({
		url: './display_messages.php',
		method: 'GET',

		success: data => {
			let chats = JSON.parse(data)
			//console.log(chats)
			
			chats.forEach(item => {
				let p = $('<p></p>')
				p.appendTo($('#chat-messages'))

				let span1 = $('<span></span>')
				span1.addClass('user-names')
				span1.html(item[1].user_name)
				span1.appendTo(p)

				let strong = $('<strong></strong>')
				strong.addClass('yellow')
				strong.html(' Diz...<br>')
				strong.appendTo(p)

				let span2 = $('<span></span>')
				span2.addClass('user-messages')
				span2.html(item[0].chat_text)
				span2.appendTo(p)
			})
		}
	})

	/*$('#chat-messages').animate({
		scrollTop: $('#chat-messages').get(0).scrollHeight
	}, 100)*/
}
