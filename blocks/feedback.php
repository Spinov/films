<div id="feedback">
	<div id="w">
		<h1>Написать письмо </h1>
		<form id="contactform" name="contact" method="post" action="#">
			<p class="note"><span class="req">*</span> Поля со звездочкой обязательны для заполнения</p>
	<div class="row">
		<label for="name">Ваше Имя <span class="req">*</span></label>
		<input type="text" name="name" id="name" class="txt" tabindex="1" placeholder="Имя" required>
	</div>
	<div class="row">
		<label for="email">E-mail Адрес <span class="req">*</span></label>
		<input type="email" name="email" id="email" class="txt" tabindex="2" placeholder=" address@mail.ru" required>
	</div>
	<div class="row">
		<label for="subject">Тема <span class="req">*</span></label>
		<input type="text" name="subject" id="subject" class="txt" tabindex="3" placeholder="Тема письма" required>
	</div>
	<div class="row">
		<label for="message">Сообщение <span class="req">*</span></label>
		<textarea name="message" id="message" class="txtarea" tabindex="4" required></textarea>
	</div>
	<div class="center">
		<input type="submit" id="submitbtn" name="submitbtn" tabindex="5" value="Отправить Сообщение">
	</div>
		</form>
	</div>
</div>