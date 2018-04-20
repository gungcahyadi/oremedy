<p>You have received a new message from Bali Tourism College website contact form.</p>
<p>Here are the details:</p>
<hr>
<p>
<ul>
    <li>Name : {{ $name }}</li>
    <li>Email : {{ $email }}</li>
    <li>Phone : {{ $phone }}</li>
</ul>
</p>
<hr>
<p>Subject : {{ $subject }}</p>
<hr>
<p>
    @foreach ($messageLines as $messageLine)
        {{ $messageLine }}<br>
    @endforeach
</p>
<hr>
<p>That is all.</p>
