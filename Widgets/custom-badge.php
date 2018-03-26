# Code provided by ImSVTVN
# https://gist.github.com/ImSVTVN/5bd9afc4dee457554351c7d2a463ce42

<?php
$members = json_decode(file_get_contents('https://discordapp.com/api/guilds/GUILD_ID_HERE/widget.json'), true)['members'];
$membersCount = 1;
foreach ($members as $member) {
    if ($member['status'] == 'online') {
        $membersCount++;
    }
}
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<p><a href="https://discord.gg/INVITE_CODE"><button class="w3-btn w3-red">Online Members
<span class="w3-badge w3-margin-left"><?php echo $membersCount; ?></span>
</button></a></p>
</body>
</html>
