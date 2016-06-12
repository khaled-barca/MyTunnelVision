<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Congratulations, You are invited to be admin!</h2>

<div>
    <p>Dear {{$receiver}}, You've been invited by {{$sender}} to be an admin.</p>
    <p>Admins have the following privileges :</p>
    <ol>
        <li>Accept or Reject tag requests by other users.</li>
        <li>See private posts of users.</li>
        <li>invite other users to be admins.</li>
    </ol>
    <p>
        To accept this invitation, click on the link below.
    </p>
    <a href="{{$link}}">
        {{$link}}
    </a>
</div>

</body>
</html>