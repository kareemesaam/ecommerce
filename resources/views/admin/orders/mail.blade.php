<!DOCTYPE html>
<html>
<head>
	<title>email</title>
</head>
<body>
 	<h1>hi {{$order->user->name}}</h1>
 	<h4>your order has been shipped</h4>
 	<h5>total price : {{$order->total}} </h5>
 	<p>thanks </p>
 
</html>