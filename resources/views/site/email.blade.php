<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Сообщение с сайта</title>
</head>
<body>
    @if ($data['prodid'])
	<h5>ID товара: {{$data['prodid']}} <br /></h5>
    @endif
    @if ($data['prodname'])
    <h5>Название: {{$data['prodname']}} <br/></h5>
    @endif
    @if ($data['prodserial'])
	<h5>Serial #: {{$data['prodserial']}}</h5>
    @endif
	

    <h5>Посетитель сайта с Email-адресом <br /> {{$data['email']}}  <br /> {{$data['place'] ? ' из '.$data['place'] : '' }} <br />  оставил Вам сообщение:</h5>

    <p>
        {{ $data['message'] }}
    </p>
</body>
</html>